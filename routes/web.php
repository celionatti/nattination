<?php

declare(strict_types=1);

use celionatti\Bolt\Bolt;
use PhpStrike\app\controllers\AuthController;
use PhpStrike\app\controllers\SiteController;
use PhpStrike\app\controllers\AdminController;
use PhpStrike\app\controllers\ArticleController;
use PhpStrike\app\controllers\CategoryController;
use PhpStrike\app\controllers\AdminArticleController;
use PhpStrike\app\controllers\AdminCategoryController;
use PhpStrike\app\controllers\AdminUserController;
use PhpStrike\app\controllers\AdminAccountController;

/** @var Bolt $bolt */

/**
 * ========================================
 * Bolt - Router Usage ====================
 * ========================================
 */

// $bolt->router->get("/user", function() {
//     echo "User function routing...";
// });

$bolt->router->group(['prefix' => '/', []], function($router) {
    $router->get('/', [SiteController::class, 'welcome']);
    $router->get('/about', [SiteController::class, 'about']);
    $router->get('/contact-us', [SiteController::class, 'contact']);
    $router->get('/search', [SiteController::class, 'search']);

    $router->get('/auth/register', [AuthController::class, 'register_view']);
    $router->post('/auth/register', [AuthController::class, 'register']);

    $router->get('/login', [AuthController::class, 'login']);
    $router->post('/login', [AuthController::class, 'login_access']);

    $router->get('/logout', [AuthController::class, 'logout']);
});

$bolt->router->get("/articles", [ArticleController::class, "articles"]);
$bolt->router->get("/articles/{:id}", [ArticleController::class, "article"]);
$bolt->router->get("/categories/view/{:id}", [CategoryController::class, "category"]);

/** Admin Routes */
$bolt->router->get("/admin", [AdminController::class, "dashboard"]);
$bolt->router->group(['prefix' => '/admin', []], function($router) {
    $router->get('/dashboard', [AdminController::class, 'dashboard']);
});

/** Admin Account Routes */
$bolt->router->group(['prefix' => '/admin/account', []], function($router) {
    $router->get('/{:id}', [AdminAccountController::class, 'account']);
    $router->post('/{:id}', [AdminAccountController::class, 'account']);
    $router->get('/{:id}/delete', [AdminAccountController::class, 'delete_account']);
    $router->post('/{:id}/delete', [AdminAccountController::class, 'delete']);
});

/** Admin Users Routes */
$bolt->router->group(['prefix' => '/admin/users', []], function($router) {
    $router->get('/manage', [AdminUserController::class, 'manage']);
    $router->get('/create', [AdminUserController::class, 'create']);
    $router->post('/create', [AdminUserController::class, 'insert']);
    $router->get('/edit/{:id}', [AdminUserController::class, 'edit']);
    $router->post('/edit/{:id}', [AdminUserController::class, 'update']);
    $router->get('/delete/{:id}', [AdminUserController::class, 'delete']);
});

/** Admin Articles Routes */
$bolt->router->group(['prefix' => '/admin/articles', []], function($router) {
    $router->get('/manage', [AdminArticleController::class, 'manage']);
    $router->get('/drafts', [AdminArticleController::class, 'drafts']);
    $router->get('/create', [AdminArticleController::class, 'create']);
    $router->post('/create', [AdminArticleController::class, 'insert']);
    $router->get('/edit/{:id}', [AdminArticleController::class, 'edit']);
    $router->post('/edit/{:id}', [AdminArticleController::class, 'update']);
    $router->get('/delete/{:id}', [AdminArticleController::class, 'delete']);
    $router->get('/editor/{:id}', [AdminArticleController::class, 'editor']);
    $router->get('/featured/{:id}', [AdminArticleController::class, 'featured']);
});

/** Admin Categories Routes */
$bolt->router->group(['prefix' => '/admin/categories', []], function($router) {
    $router->get('/manage', [AdminCategoryController::class, 'manage']);
    $router->get('/create', [AdminCategoryController::class, 'create']);
    $router->post('/create', [AdminCategoryController::class, 'insert']);
    $router->get('/edit/{:id}', [AdminCategoryController::class, 'edit']);
    $router->post('/edit/{:id}', [AdminCategoryController::class, 'update']);
    $router->get('/delete/{:id}', [AdminCategoryController::class, 'delete']);
});
