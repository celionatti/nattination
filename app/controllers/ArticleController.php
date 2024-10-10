<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** ArticleController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Controller;

class ArticleController extends Controller
{
    public function articles()
    {
        $view = [
            
        ];

        $this->view->render("pages/articles", $view);
    }

    public function article()
    {
        $view = [
            
        ];

        $this->view->render("pages/article", $view);
    }
}