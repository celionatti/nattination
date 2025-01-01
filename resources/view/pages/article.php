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

use celionatti\Bolt\Illuminate\Utils\TimeDateUtils;
use celionatti\Bolt\Illuminate\Utils\StringUtils;


?>

<?php $this->start('content') ?>

<div class="overlay" style="background-image: url('http://nattinationnews.test//assets/img/news-bg.jpg');">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-6">
                <div class="text-center text-white">
                    <h1 class="mb-4"><?= $article['title'] ?></h1>
                    <div class="align-items-center text-center">
                        <figure class="mb-2 me-3 d-inline-block"><img src="<?= get_image("", "avatar") ?>" alt="Image" class="rounded-circle" width="40" height="40"></figure>
                        <span class="d-inline-block mt-1 text-capitalize">Authors: <?= $article['contributors'] ?></span>
                        <span>&nbsp;-&nbsp; <?= TimeDateUtils::create($article['created_at'])->toCustomFormat("F jS, Y") ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section mt-3">
    <div class="container">

    <div class="d-flex justify-content-center align-items-center mb-4 shadow px-3 rounded-3">
        <img src="<?= get_image($article['thumbnail']) ?>" alt="Image placeholder" class="img-fluid p-2">
    </div>

        <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">

                <div class="post-content-body shadow p-3 lh-base link-body-emphasis text-black">
                    <?= StringUtils::create(htmlspecialchars_decode(nl2br($article['content']))) ?>
                </div>


                <div class="pt-3">
                    <p class="text-danger border-bottom border-danger pb-2 fw-medium">Tags: <a>#<?= $article['tags'] ?></a></p>
                </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">

                <div class="sidebar-box">
                    <div class="bio text-center">
                        <img src="<?= get_image("", "avatar") ?>" alt="Image Placeholder" class="img-fluid mb-3">
                        <div class="bio-body">
                            <h2>Hannah Anderson</h2>
                            <p class="social">
                                <a href="#" class="p-2"><span class="fa-brands fa-facebook"></span></a>
                                <a href="#" class="p-2"><span class="fa-brands fa-twitter"></span></a>
                                <a href="#" class="p-2"><span class="fa-brands fa-instagram"></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul class="list-unstyled">
                            <?php foreach($populars as $popular): ?>
                            <li>
                              <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="<?= URL_ROOT . "/articles/{$popular['article_id']}" ?>">
                                <img src="<?= get_image($popular['thumbnail']) ?>" class="" width="100">
                                <div class="col-lg-8">
                                  <h6 class="mb-0"><?= $popular['title'] ?></h6>
                                  <small class="text-body-secondary"><?= TimeDateUtils::create($popular['created_at'])->toCustomFormat("F jS, Y") ?></small>
                                </div>
                              </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

            </div>
            <!-- END sidebar -->

        </div>
    </div>
</section>


<!-- Start posts-entry -->
<section class="section posts-entry posts-entry-sm bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-uppercase text-black">More Blog Posts</div>
        </div>
        <div class="row">
            <?php foreach($mores as $more): ?>
            <div class="col-md-6 col-lg-3">
                <div class="d-flex flex-column">
                    <a href="<?= URL_ROOT . "/articles/{$more['article_id']}" ?>" class="img-link">
                        <div>
                            <img src="<?= get_image($more['thumbnail']) ?>" alt="Image" class="img-fluid">
                        </div>
                    </a>
                    <h3><a href="<?= URL_ROOT . "/articles/{$more['article_id']}" ?>" class="link-body-emphasis"><?= $more['title'] ?></a></h3>
                    <p><?= StringUtils::create(htmlspecialchars_decode(nl2br($more['content'])))->excerpt(150) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End posts-entry -->

<?php $this->end() ?>