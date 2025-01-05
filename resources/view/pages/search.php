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

<div class="hero overlay inner-page bg-info py-3">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <h4><span class="text-secondary-emphasis"><i class="fa-solid fa-search"></i> Searching For:</span></h4>
                <h1 class="heading text-white mb-3 text-uppercase" data-aos="fade-up"><?= $search ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row posts-entry">
            <div class="col-lg-8">
                <?php if($articles): ?>
                <?php foreach($articles as $article): ?>
                <div class="blog-entry d-flex blog-entry-search-item shadow mt-3 mb-4 p-2">
                    <a href="<?= URL_ROOT . "/articles/{$article['article_id']}" ?>" class="img-link me-4">
                        <img src="<?= get_image($article['thumbnail']) ?>" alt="Image" class="" height="300" width="250">
                    </a>
                    <div>
                        <span class="date"><?= TimeDateUtils::create($article['created_at'])->toCustomFormat("F jS, Y") ?> &bullet; <a class="text-danger"><?= $article['tags'] ?></a></span>
                        <h2><a href="<?= URL_ROOT . "/articles/{$article['article_id']}" ?>" class="text-black"><?= $article['title'] ?></a></h2>
                        <p><?= StringUtils::create(htmlspecialchars_decode(nl2br($article['content'])))->excerpt(230) ?></p>
                        <p><a href="<?= URL_ROOT . "/articles/{$article['article_id']}" ?>" class="btn btn-sm btn-outline-dark">Read More</a></p>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <h4 class="text-secondary-emphasis text-center my-4">No Searched Article Found!</h4>
                <?php endif; ?>

                <div class="d-flex justify-content-center align-items-center text-start pt-5 border-top">
                    <nav class="">

                    </nav>
                </div>

            </div>

            <div class="col-lg-4 sidebar">

                <div class="sidebar-box search-form-wrap mb-4 mt-3">
                    <form action="<?= URL_ROOT . "/search" ?>" class="sidebar-search-form">
                        <span class="bi-search"></span>
                        <input type="text" class="form-control" name="query" placeholder="Type a keyword and hit enter">
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Recent Articles</h3>
                    <div class="post-entry-sidebar">
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
                </div>
                <!-- END sidebar-box -->

            </div>
        </div>
    </div>
</div>

<?php $this->end() ?>