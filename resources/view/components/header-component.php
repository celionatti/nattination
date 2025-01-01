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
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="<?= URL_ROOT . "/auth/register" ?>">Sign up</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-3 border-bottom">
    <nav class="nav nav-underline justify-content-between">
      <?php foreach ($categories as $key => $cat ): ?>
      <a class="nav-item nav-link link-body-emphasis <?= (active_nav(3, $cat['category_id'])) ? "active" : "" ?>" href="<?= URL_ROOT . "/categories/view/{$cat['category_id']}" ?>"><?= $cat['name'] ?></a>
      <?php endforeach; ?>
    </nav>
  </div>
</div>