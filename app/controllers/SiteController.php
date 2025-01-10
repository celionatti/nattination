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
use PhpStrike\app\models\User;
use PhpStrike\app\models\Contact;

use celionatti\Bolt\Authentication\Auth;
use celionatti\Bolt\Pagination\Pagination;

class SiteController extends Controller
{
    public function onConstruct(): void
    {
        $this->setCurrentUser(user());
    }

    public function welcome()
    {
        $article = new Article();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $articles = $article->paginate($page, 10, ['status' => 'publish', 'is_featured' => 0, 'is_editor' => 0], ['created_at' => "DESC"]);

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
        if("POST" !== $request->getMethod()) {
            return;
        }
        $contact = new Contact();

        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ];

        // Load and validate data
        $attributes = $request->loadData();

        if (!$request->validate($rules, $attributes)) {
            storeSessionData('contact_data', $attributes);
            setFormMessage($request->getErrors());
            redirect(URL_ROOT . "/contact-us");
            return; // Ensure the method exits after redirect
        }

        $attributes['contact_id'] = bv_uuid();

        if ($contact->create($attributes)) {
            // Success: Redirect to manage page
            toast("success", "Message Sent Successfully");
            redirect(URL_ROOT);
        } else {
            // Failed to create: Redirect to create page
            toast("error", "Message process Failed!");
            redirect(URL_ROOT);
        }
    }

    public function subscribe(Request $request)
    {
        $view = [
            'errors' => getFormMessage(),
        ];

        $this->view->render("subscribe", $view);
    }

    public function subscribe_newsletter(Request $request, $id)
    {
        if(!$this->currentUser) {
            toast("info", "You need to Register, to subscribe.");
            redirect(URL_ROOT);
        }
        $user = new User();

        if($user->update(['subscriber' => 1], $id)) {
            toast("success", "Now Added to Newsletter.");
            redirect(URL_ROOT);
        } else {
            // Failed to create: Redirect to create page
            toast("error", "Newsletter Process failed!");
            redirect(URL_ROOT);
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