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

class SiteController extends Controller
{
    public function welcome()
    {
        $article = new Article();

        $view = [
            'editors' => $article->allBy("is_editor", 1),
            'featured' => $article->allBy("is_featured", 1)[0],
            'articles' => $article->article_lists(),
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

    public function category()
    {
        $view = [
            
        ];

        $this->view->render("pages/category", $view);
    }
}