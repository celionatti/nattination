<?php

/**
 * Framework Title: PhpStrike Framework
 * Creator: Celio natti
 * version: 1.0.0
 * Year: 2023
 * 
 * 
 * This view page start name{style,script,content} 
 * can be edited, base on what they are called in the layout view
 */

use PhpStrike\app\components\BannerComponent;

use celionatti\Bolt\Illuminate\Utils\TimeDateUtils;
use celionatti\Bolt\Illuminate\Utils\StringUtils;

?>

<?php $this->start('content') ?>
<main class="container">
  <?php if($featured): ?>
    <?= renderComponent(BannerComponent::class, $featured); ?>
  <?php endif; ?>

    <div class="row mb-2">
      <?php if($editors): ?>
      <?php foreach($editors as $editor): ?>
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary-emphasis"><?= $editor['tags'] ?></strong>
              <h4 class="mb-0"><?= $editor['title'] ?></h4>
              <div class="mb-1 text-body-secondary">Nov 12</div>
              <p class="card-text mb-auto"><?= StringUtils::create(htmlspecialchars_decode(nl2br($editor['content'])))->excerpt(100) ?></p>
              <a href="<?= URL_ROOT . "/articles/{$editor['article_id']}" ?>" class="icon-link gap-1 icon-link-hover stretched-link">
                Continue reading
                <svg class="bi"><use xlink:href="#chevron-right"/></svg>
              </a>
            </div>
            <div class="col-auto d-none d-lg-block">
              <img src="<?= get_image($editor['thumbnail']) ?>" class="" height="300">
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  <!-- Card End -->

<div class="row g-5">
    <div class="col-md-8">
      <h3 class="pb-4 mb-4 fst-italic border-bottom border-info">
        <span class="h5"><i class='fa-solid fa-blog text-info'></i></span>
        <?= setting("quote", "Just do you, That's all you've gat.") ?>
      </h3>

      <?php if($articles): ?>
      <?php foreach($articles as $article): ?>
      <article class="blog-post border-bottom border-2 border-info shadow p-2">
        <h2 class="display-6 link-body-emphasis mb-1"><a href="<?= URL_ROOT . "/articles/{$article['article_id']}" ?>" class="link-body-emphasis text-decoration-none"><?= $article['title'] ?></a></h2>

        <div class="d-flex justify-content-between align-items-center px-2">
          <small class="my-1 px-1 text-danger-emphasis fw-medium"><?= TimeDateUtils::create($article['created_at'])->toCustomFormat("l, F jS, Y") ?> <span class="ps-2 fa-solid fa-user border-start border-danger border-3 ms-1"></span> <a class="fw-medium text-primary-emphasis text-decoration-none text-capitalize"><?= $article['contributors'] ?></a></small>

          <small class="d-inline-block mb-2 text-success-emphasis pe-2 fw-medium"><span class="">Tags: </span> <?= $article['tags'] ?></small>
        </div>

        <div class="d-flex justify-content-center align-items-center my-1">
          <a href="<?= URL_ROOT . "/articles/{$article['article_id']}" ?>">
            <img src="<?= get_image($article['thumbnail']) ?>" class="" height="300" loading="lazy">
          </a>
        </div>

        <p class="px-2 border-start border-2 border-info rounded-1"><?= StringUtils::create(htmlspecialchars_decode(nl2br($article['content'])))->excerpt(200) ?></p>
      </article>
      <?php endforeach; ?>

      <div class="d-flex justify-content-center align-items-center text-start">
        <?= $pagination ?>
      </div>

      <?php else: ?>
        <h4 class="text-secondary-emphasis text-center my-4">No Articles Found!</h4>
      <?php endif; ?>

    </div>

    <div class="col-md-4">
      <div class="position-sticky" style="top: 2rem;">
        <div class="p-2 mb-3 bg-body-tertiary rounded shadow">
          <h4 class="fst-italic border-bottom border-info border-2 pb-1">About</h4>
          <p class="mb-0"><?= setting("about", "Loading...") ?></p>
        </div>

        <div>
          <h4 class="fst-italic">Recent posts</h4>
          <ul class="list-unstyled">
            <?php foreach($recents as $recent): ?>
            <li>
              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="<?= URL_ROOT . "/articles/{$recent['article_id']}" ?>">
                <img src="<?= get_image($recent['thumbnail']) ?>" class="" width="100">
                <div class="col-lg-8">
                  <h6 class="mb-0"><?= $recent['title'] ?></h6>
                  <small class="text-body-secondary"><?= TimeDateUtils::create($recent['created_at'])->toCustomFormat("F jS, Y") ?></small>
                </div>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="p-4">
          <h4 class="fst-italic">Socials</h4>
          <p class="social">
              <a href="<?= setting("facebook_link", "#") ?>" class="p-2 text-primary-emphasis"><span class="fa-brands fa-facebook"></span></a>
              <a href="<?= setting("x_link", "#") ?>" class="p-2"><span class="fa-brands fa-square-x-twitter"></span></a>
              <a href="<?= setting("instagram_link", "#") ?>" class="p-2 text-primary-emphasis"><span class="fa-brands fa-instagram"></span></a>
              <a href="<?= setting("youtube_link", "#") ?>" class="p-2 text-danger"><span class="fa-brands fa-youtube"></span></a>
          </p>
        </div>
      </div>
    </div>
  </div>

</main>
<?php $this->end() ?>