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

use PhpStrike\app\models\Category;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Pagination\Pagination;

class AdminCategoryController extends Controller
{
    public function onConstruct(): void
    {
        $this->view->setLayout("admin");
        $this->setCurrentUser(user());

        if(!$this->currentUser) {
            redirect(URL_ROOT . "/login");
        }

        if($this->currentUser['role'] === "user") {
            redirect(URL_ROOT);
        }
    }

    public function manage()
    {
        $category = new Category();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $categories = $category->paginate($page, 6);

        $pagination = new Pagination($categories['pagination'], URL_ROOT, ['ul' => 'pagination','li' => 'page-item','a' => 'page-link']);

        $view = [
            // 'categories' => $category::all(),
            'categories' => $categories['data'],
            'pagination' => $pagination->render("ellipses"),
        ];

        $this->view->render("admin/category/manage", $view);
    }
    public function create(Request $request)
    {
        $view = [
            'errors' => getFormMessage(),
            'category' => retrieveSessionData('category_data'),
            'statusOpts' => [
                'active' => 'Active',
                'inactive' => 'Inactive',
            ],
        ];

        unsetSessionArrayData(['category_data']);

        $this->view->render("admin/category/create", $view);
    }

    public function insert(Request $request)
    {
        if ($request->getMethod() === "POST") {
            // Proceed to create category if validation passes
            $category = new Category();

            $rules = [
                'name' => 'required|string',
                'status' => 'required',
            ];

            // Load and validate data
            $attributes = $request->loadData();

            if (!$request->validate($rules, $attributes)) {
                storeSessionData('category_data', $attributes);
                setFormMessage($request->getErrors());
                redirect(URL_ROOT . "/admin/categories/create");
                return; // Ensure the method exits after redirect
            }

            $attributes['category_id'] = bv_uuid();

            if ($category->create($attributes)) {
                // Success: Redirect to manage page
                // toast("success", "Category Created Successfully");
                redirect(URL_ROOT . "/admin/categories/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'Category creation failed!']);
                redirect(URL_ROOT . "/admin/categories/manage");
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $category = new Category();

        $fetchData = $category->find($id)->toArray();

        $view = [
            'errors' => getFormMessage(),
            'category' => $fetchData ?? retrieveSessionData('category_data'),
            'statusOpts' => [
                'active' => 'Active',
                'inactive' => 'Inactive',
            ],
        ];

        unsetSessionArrayData(['category_data']);

        $this->view->render("admin/category/edit", $view);
    }

    public function update(Request $request, $id)
    {
        if("POST" === $request->getMethod()) {
            // Proceed to create category if validation passes
            $category = new Category();

            $fetchData = $category->find($id);

            if (!$fetchData) {
                toast("info", "Category Not Found!");
                redirect(URL_ROOT . "/admin/categories/manage");
            }

            $rules = [
                'name' => 'required|string',
                'status' => 'required',
            ];

            // Load and validate data
            $attributes = $request->loadData();

            if (!$request->validate($rules, $attributes)) {
                storeSessionData('category_data', $attributes);
                setFormMessage($request->getErrors());
                redirect(URL_ROOT . "/admin/categories/edit/{$fetchData->category_id}");
                return; // Ensure the method exits after redirect
            }

            if ($category->update($attributes, $id)) {
                // Success: Redirect to manage page
                // toast("success", "Category Updated Successfully");
                redirect(URL_ROOT . "/admin/categories/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'Category Update Process failed!']);
                redirect(URL_ROOT . "/admin/categories/manage");
            }
        }
    }

    public function delete(Request $request, $id)
    {
        if("GET" === $request->getMethod()) {
            // Proceed to create category if validation passes
            $category = new Category();

            $fetchData = $category->find($id);

            if (!$fetchData) {
                toast("info", "Category Not Found!");
                redirect(URL_ROOT . "admin/categories/manage");
            }
            if($category->delete($id)) {
                // toast("success", "Category Deleted Successfully");
                redirect(URL_ROOT . "/admin/categories/manage");
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'Category delete process failed!']);
                redirect(URL_ROOT . "/admin/categories/manage");
            }
        }
    }
}
