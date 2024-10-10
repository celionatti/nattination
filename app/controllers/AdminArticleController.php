<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AdminArticleController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Controller;
use celionatti\Bolt\Http\Request;
use celionatti\Bolt\BoltException\BoltException;

use PhpStrike\app\models\Article;
use PhpStrike\app\models\Category;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Illuminate\Meta\Meta;
use celionatti\Bolt\Illuminate\Support\Upload;
use celionatti\Bolt\Illuminate\Support\Image;

class AdminArticleController extends Controller
{
    public function onConstruct(): void
    {
        $this->view->setLayout("admin");
    }

    public function manage()
    {
        $article = new Article();

        $view = [
            'articles' => $article::all()
        ];

        $this->view->render("admin/articles/manage", $view);
    }
    public function create(Request $request)
    {
        $categories = new Category();

        $fetchCategories = $categories->all();
        $categoryOptions = [];
        foreach ($fetchCategories as $category) {
            $categoryOptions[$category['category_id']] = ucfirst($category['name']);
        }

        $view = [
            'errors' => getFormMessage(),
            'article' => retrieveSessionData('article_data'),
            'categoryOpts' => $categoryOptions,
            'statusOpts' => [
                'draft' => 'Draft',
                'publish' => 'Publish',
            ],
            'upload_type' => $request->get('ut'),
        ];

        unsetSessionArrayData(['article_data']);

        $this->view->render("admin/articles/create", $view);
    }

    public function insert(Request $request)
    {
        if ("POST" === $request->getMethod()) {
            // Proceed to create article if validation passes
            $article = new Article();

            $rules = [
                'title' => 'required',
                'content' => 'required',
                'tags' => 'required',
                'thumbnail' => 'required',
                'thumbnail_caption' => 'required',
                'contributors' => 'required',
                'category_id' => 'required',
                'status' => 'required',
                // 'user_id' => 'required',
            ];

            // Load and validate data
            $attributes = $request->loadData();
            $attributes['article_id'] = bv_uuid();
            $attributes['user_id'] = null;
            $attributes['meta_title'] = Meta::MetaTitle($attributes['title'], $attributes['content']);
            $attributes['meta_description'] = Meta::MetaDescription($attributes['content']);
            $attributes['meta_keywords'] = Meta::MetaKeywords($attributes['title'], $attributes['content']);

            if($request->get("ut") === "file") {
                $upload = new Upload("uploads/articles");
                $thumbnail = $upload->uploadFile("thumbnail");
                $attributes['thumbnail'] = $thumbnail['file'];

                if($thumbnail['success']) {
                    $image = new Image();
                    $image->resize($attributes['thumbnail']);
                }
            }

            if (!$request->validate($rules, $attributes)) {
                storeSessionData('article_data', $attributes);
                setFormMessage($request->getErrors());
                redirect(URL_ROOT . "/admin/articles/create?ut={$request->get('ut')}");
                return; // Ensure the method exits after redirect
            }

            if ($article->create($attributes) && $thumbnail['success']) {
                // Success: Redirect to manage page
                // toast("success", "Article Created Successfully");
                redirect(URL_ROOT . "/admin/articles/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'Article creation failed!']);
                redirect(URL_ROOT . "/admin/articles/manage");
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $article = new Article();

        $fetchData = $article->find($id)->toArray();

        $categories = new Category();

        $fetchCategories = $categories->all();
        $categoryOptions = [];
        foreach ($fetchCategories as $category) {
            $categoryOptions[$category['category_id']] = ucfirst($category['name']);
        }

        $view = [
            'errors' => getFormMessage(),
            'article' => $fetchData ?? retrieveSessionData('article_data'),
            'categoryOpts' => $categoryOptions,
            'statusOpts' => [
                'draft' => 'Draft',
                'publish' => 'Publish',
            ],
            'upload_type' => $request->get('ut'),
        ];

        unsetSessionArrayData(['article_data']);

        $this->view->render("admin/articles/edit", $view);
    }

    // public function update(Request $request, $id)
    // {
    //     if("POST" === $request->getMethod()) {
    //         $article = new Article();

    //         $fetchData = $article->find($id);

    //         if (!$fetchData) {
    //             toast("info", "Article Not Found!");
    //             redirect(URL_ROOT . "/admin/articles/manage");
    //         }

    //         $rules = [
    //             'title' => 'required',
    //             'content' => 'required',
    //             'tags' => 'required',
    //             'thumbnail_caption' => 'required',
    //             'contributors' => 'required',
    //             'category_id' => 'required',
    //             'status' => 'required',
    //         ];

    //         // Load and validate data
    //         $attributes = $request->loadData();
    //         $attributes['meta_title'] = Meta::MetaTitle($attributes['title'], $attributes['content']);
    //         $attributes['meta_description'] = Meta::MetaDescription($attributes['content']);
    //         $attributes['meta_keywords'] = Meta::MetaKeywords($attributes['title'], $attributes['content']);

    //         if($request->get("ut") === "file") {
    //             $upload = new Upload("uploads/articles");
    //             $thumbnail = $upload->uploadFile("thumbnail");
    //             if($thumbnail['success'] && !is_null($fetchData->thumbnail)) {
    //                 $upload->delete($fetchData->thumbnail, true);
    //             }
    //             $attributes['thumbnail'] = $thumbnail['file'];

    //             if($thumbnail['success']) {
    //                 $image = new Image();
    //                 $image->resize($attributes['thumbnail']);
    //             }
    //         }

    //         if (!$request->validate($rules, $attributes)) {
    //             storeSessionData('article_data', $attributes);
    //             setFormMessage($request->getErrors());
    //             redirect(URL_ROOT . "/admin/articles/create?ut={$request->get('ut')}");
    //             return; // Ensure the method exits after redirect
    //         }

    //         if ($article->update($id, $attributes) && $thumbnail['success']) {
    //             // Success: Redirect to manage page
    //             // toast("success", "Article Updated Successfully");
    //             redirect(URL_ROOT . "/admin/articles/manage");
    //         } else {
    //             // Failed to create: Redirect to create page
    //             setFormMessage(['error' => 'Article update process failed!']);
    //             redirect(URL_ROOT . "/admin/articles/manage");
    //         }
    //     }
    // }

    public function update(Request $request, $id)
    {
        if("POST" !== $request->getMethod()) {
            return; // Early return for non-POST requests
        }

        $article = new Article();
        $fetchData = $article->find($id);

        // Article not found
        if (!$fetchData) {
            toast("info", "Article Not Found!");
            redirect(URL_ROOT . "/admin/articles/manage");
            return;
        }

        // Validation rules
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'tags' => 'required',
            'thumbnail_caption' => 'required',
            'contributors' => 'required',
            'category_id' => 'required',
            'status' => 'required',
        ];

        // Load and prepare data
        $attributes = $request->loadData();
        $attributes['meta_title'] = Meta::MetaTitle($attributes['title'], $attributes['content']);
        $attributes['meta_description'] = Meta::MetaDescription($attributes['content']);
        $attributes['meta_keywords'] = Meta::MetaKeywords($attributes['title'], $attributes['content']);

        // Handle file upload if ut=file
        if ($request->get("ut") === "file" && isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] !== UPLOAD_ERR_NO_FILE) {
            $upload = new Upload("uploads/articles");

            // Perform file upload and check success
            $thumbnail = $upload->uploadFile("thumbnail");

            if ($thumbnail['success']) {
                // Delete old thumbnail if it exists
                if (!is_null($fetchData->thumbnail)) {
                    $upload->delete($fetchData->thumbnail, true);
                }

                // Add new thumbnail to attributes
                $attributes['thumbnail'] = $thumbnail['file'];

                // Resize uploaded image
                $image = new Image();
                $image->resize($attributes['thumbnail']);
            } else {
                // Handle thumbnail upload failure
                setFormMessage(['error' => 'Thumbnail upload failed!']);
                storeSessionData('article_data', $attributes);
                redirect(URL_ROOT . "/admin/articles/create?ut={$request->get('ut')}");
                return; // Ensure exit after redirect
            }
        } else {
            // If no new thumbnail uploaded, retain existing thumbnail
            $attributes['thumbnail'] = $fetchData->thumbnail;
        }

        // Validate request data
        if (!$request->validate($rules, $attributes)) {
            storeSessionData('article_data', $attributes);
            setFormMessage($request->getErrors());
            redirect(URL_ROOT . "/admin/articles/create?ut={$request->get('ut')}");
            return; // Ensure exit after redirect
        }

        // Update the article
        if ($article->update($id, $attributes)) {
            toast("success", "Article Updated Successfully");
            redirect(URL_ROOT . "/admin/articles/manage");
        } else {
            setFormMessage(['error' => 'Article update process failed!']);
            redirect(URL_ROOT . "/admin/articles/manage");
        }
    }
}
