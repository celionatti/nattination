<?php

declare(strict_types=1);

/**
 * ===================================
 * ==========
 * Component View
 * ==========       ==================
 * ===================================
 */

use PhpStrike\app\models\Category;

$category = new Category();

$categories = $category->allBy("status", "active");

$user = user();

?>

<div class="container">
  <header class="border-bottom lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="<?= URL_ROOT ?>"><span class="text-danger">Natti</span>Nation<span class="text-danger">.</span></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <?php if($user): ?>
        <a class="text-body-emphasis text-decoration-none" href="<?= URL_ROOT . "/profile/account/{$user['user_id']}" ?>" aria-label="Search">
          <i class="fa-solid fa-user"></i> Amisu Usman
        </a>
        <a class="text-danger text-decoration-none ms-3" href="<?= URL_ROOT . "/logout" ?>" aria-label="Search">
          <i class="fa-solid fa-power-off"></i>
        </a>
        <?php else: ?>
        <a class="btn btn-sm btn-outline-secondary" href="<?= URL_ROOT . "/auth/register" ?>">Sign up</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-3 border-bottom">
    <nav class="nav nav-underline justify-content-between">
      <a class="nav-item nav-link link-body-emphasis <?= (active_nav(1, "articles")) ? "active" : "" ?>" href="<?= URL_ROOT . "/articles" ?>">Articles</a>
      <?php foreach ($categories as $key => $cat ): ?>
      <a class="nav-item nav-link link-body-emphasis <?= (active_nav(3, $cat['category_id'])) ? "active" : "" ?>" href="<?= URL_ROOT . "/categories/view/{$cat['category_id']}" ?>"><?= $cat['name'] ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</div>