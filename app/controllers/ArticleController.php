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
use celionatti\Bolt\Pagination\Pagination;

class ArticleController extends Controller
{
    protected $session;

    public function onConstruct(): void
    {
        $this->session = new Session();
    }

    public function articles()
    {
        $article = new Article();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $articles = $article->paginate($page, 10, ['status' => 'publish'], ['created_at' => "DESC"]);

        $pagination = new Pagination($articles['pagination'], URL_ROOT, ['ul' => 'pagination','li' => 'page-item','a' => 'page-link']);

        $view = [
            'articles' => $articles['data'],
            'pagination' => $pagination->render("ellipses"),
            'recents' => $article->recent_articles(),
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

        $author = $article->article_author($id);

         // $socialLinks = isset($author['social_links']) ? explode(',', $author['social_links']) : [];

        //  $defaultLinks = [
        //     'twitter' => $socialLinks[0] ?? '#',
        //     'facebook' => $socialLinks[1] ?? '#',
        //     'instagram'  => $socialLinks[2] ?? '#',
        //     'youtube' => $socialLinks[3] ?? '#',
        // ];

        $view = [
            'article' => $article->findBy(['article_id' => $id])->toArray(),
            'populars' => $article->popular_articles($id),
            'mores' => $article->more_articles($id),
            'author' => $author['name'],
            'author_links' => isset($author['social_links']) ? explode(',', $author['social_links']) : [],
        ];

        $this->view->render("pages/article", $view);
    }
}