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

use celionatti\Bolt\Pagination\Pagination;

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

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $categories = $article->paginate($page, 10, ['category_id' => $id,'status' => 'publish'], ['created_at' => "DESC"]);

        $pagination = new Pagination($categories['pagination'], URL_ROOT, ['ul' => 'pagination','li' => 'page-item','a' => 'page-link']);

        $view = [
            'name' => $category->find($id)->toArray(),
            'categories' => $categories['data'],
            'pagination' => $pagination->render("ellipses"),
            // 'categories' => $article->allBy("category_id", $id),
            'populars' => $article->popular_articles($id),
        ];

        $this->view->render("pages/category", $view);
    }
}