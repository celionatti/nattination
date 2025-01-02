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
use celionatti\Bolt\Sessions\Handlers\DefaultSessionHandler as Session;

use PhpStrike\app\models\Article;

class ArticleController extends Controller
{
    protected $session;

    public function onConstruct(): void
    {
        $this->session = new Session();
    }

    public function articles()
    {
        $view = [
            
        ];

        $this->view->render("pages/articles", $view);
    }

    public function article(Request $request, $id)
    {
        $article = new Article();

        if($this->session->get("article_view") !== $id) {
            $this->session->remove("article_view");
        }

        if($id && !$this->session->has("article_view") && $id !== $this->session->get("article_view")) {
            $article->increase_view($id);

            // Article has not been viewed before.
            $this->session->set("article_view", $id);
        }

        $view = [
            'article' => $article->findBy(['article_id' => $id])->toArray(),
            'populars' => $article->popular_articles($id),
            'mores' => $article->more_articles($id),
            'author' => $article->article_author($id),
        ];

        $this->view->render("pages/article", $view);
    }
}