<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** CategoryController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Controller;

use PhpStrike\app\models\Article;
use PhpStrike\app\models\Category;

class CategoryController extends Controller
{
    public function onConstruct(): void
    {
        // $this->setCurrentUser(user());
    }

    public function category(Request $request, $id)
    {
        $article = new Article();
        $category = new Category();

        $view = [
            'name' => $category->find($id)->toArray(),
            'categories' => $article->allBy("category_id", $id),
            'populars' => $article->popular_articles($id),
        ];

        $this->view->render("pages/category", $view);
    }
}