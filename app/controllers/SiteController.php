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
            
        ];

        $this->view->render("contact", $view);
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
}