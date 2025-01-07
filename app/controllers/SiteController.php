<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** SiteController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;

use celionatti\Bolt\Controller;

use PhpStrike\app\models\Article;
use PhpStrike\app\models\Category;
use PhpStrike\app\models\Subscriber;

use celionatti\Bolt\Authentication\Auth;
use celionatti\Bolt\Pagination\Pagination;

class SiteController extends Controller
{
    public function onConstruct(): void
    {
        // $this->setCurrentUser(user());
    }

    public function welcome()
    {
        $article = new Article();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $articles = $article->paginate($page, 10, ['status' => 'publish'], ['created_at' => "DESC"]);

        $pagination = new Pagination($articles['pagination'], URL_ROOT, ['ul' => 'pagination','li' => 'page-item','a' => 'page-link']);

        $view = [
            'editors' => $article->allBy("is_editor", 1),
            'featured' => $article->allBy("is_featured", 1)[0],
            'articles' => $articles['data'],
            'pagination' => $pagination->render("ellipses"),
            // 'articles' => $article->article_lists(),
            'recents' => $article->recent_articles(),
        ];

        $this->view->render("welcome", $view);
    }

    public function about()
    {
        $view = [
            
        ];

        $this->view->render("about", $view);
    }

    public function contact()
    {
        $view = [
            'errors' => getFormMessage(),
            'contact' => retrieveSessionData('contact_data'),
        ];

        unsetSessionArrayData(['contact_data']);

        $this->view->render("contact", $view);
    }

    public function insert_contact(Request $request)
    {

    }

    public function search(Request $request)
    {
        $article = new Article();

        $search = $request->get("query");

        $view = [
            'articles' => $article->search($search),
            'search' => $search,
            'recents' => $article->recent_articles(),
        ];

        $this->view->render("pages/search", $view);
    }

    public function subscribe()
    {
        $view = [
            'errors' => getFormMessage(),
            'subscriber' => retrieveSessionData('subscribe_data'),
        ];

        unsetSessionArrayData(['subscribe_data']);

        $this->view->render("subscribe", $view);
    }

    public function insert_subscriber(Request $request)
    {
        if ($request->getMethod() === "POST") {
            // Proceed to create category if validation passes
            $subscribe = new Subscriber();

            $rules = [
                'name' => 'required|string',
                'email' => 'required|email|unique:subscribers.email',
                'status' => 'required',
            ];

            // Load and validate data
            $attributes = $request->loadData();
            $attributes['status'] = "disable";

            if (!$request->validate($rules, $attributes)) {
                storeSessionData('subscribe_data', $attributes);
                setFormMessage($request->getErrors());
                redirect(URL_ROOT . "/subscribe");
                return; // Ensure the method exits after redirect
            }

            $attributes['subscriber_id'] = bv_uuid();

            if ($subscribe->create($attributes)) {
                // Success: Redirect to manage page
                toast("success", "{$attributes['email']} Added Lists!");
                redirect(URL_ROOT);
            } else {
                // Failed to create: Redirect to create page
                setFormMessage(['error' => 'Subscription Creatin failed!']);
                redirect(URL_ROOT);
            }
        }
    }

    public function terms()
    {
        $view = [

        ];

        $this->view->render("pages/terms", $view);
    }

    public function policy()
    {
        $view = [

        ];

        $this->view->render("pages/policy", $view);
    }
}