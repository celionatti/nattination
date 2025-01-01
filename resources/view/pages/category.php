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

?>

<?php $this->start('content') ?>

<div class="section search-result-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading">Category: Business</div>
            </div>
        </div>
        <div class="row posts-entry">
            <div class="col-lg-8">
                <div class="blog-entry d-flex blog-entry-search-item shadow mt-3 mb-4 p-2">
                    <a href="single.html" class="img-link me-4">
                        <img src="<?= get_image() ?>" alt="Image" class="img-fluid">
                    </a>
                    <div>
                        <span class="date">Apr. 14th, 2022 &bullet; <a href="#" class="text-danger">Business</a></span>
                        <h2><a href="single.html" class="text-black">Thought you loved Python? Wait until you meet Rust</a></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                        <p><a href="single.html" class="btn btn-sm btn-outline-dark">Read More</a></p>
                    </div>
                </div>

                <div class="d-flex justify-content-center align-items-center text-start pt-5 border-top">
                    <nav class="">
                        <ul class="pagination">
                            <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">...</a></li>
                            <li class="page-item"><a href="#" class="page-link">15</a></li>
                            <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                        </ul>
                    </nav>
                </div>

            </div>

            <div class="col-lg-4 sidebar">

                <div class="sidebar-box search-form-wrap mb-4">
                    <form action="#" class="sidebar-search-form">
                        <span class="bi-search"></span>
                        <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                    </form>
                </div>
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                    <h3 class="heading">Popular Posts</h3>
                    <div class="post-entry-sidebar">
                        <ul class="list-unstyled">
                            <li class="my-2">
                                <a href="" class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                                    <img src="<?= get_image() ?>" class="me-2 rounded" width="100">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="my-2">
                                <a href="" class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top">
                                    <img src="<?= get_image() ?>" class="me-2 rounded" width="100">
                                    <div class="text">
                                        <h4>There’s a Cool New Way for Men to Wear Socks and Sandals</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">March 15, 2018 </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END sidebar-box -->

            </div>
        </div>
    </div>
</div>

<?php $this->end() ?>