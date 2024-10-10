<?php

declare(strict_types=1);

/**
 * ===================================
 * ==========
 * Component View
 * ==========       ==================
 * ===================================
 */

?>

<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="index.html" class="logo m-0 float-start">Natti<span class="text-primary">.</span></a>
                    </div>
                    <div class="col-8 text-center">
                        <form action="#" class="search-form d-inline-block d-lg-none">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li class="active"><a href="<?= URL_ROOT ?>">Home</a></li>
                            <li class="active"><a href="<?= URL_ROOT . "/articles" ?>">Articles</a></li>
                            <li class="has-children">
                                <a href="category.html">Category</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html">Music</a></li>
                                    <li><a href="single.html">Videos</a></li>
                                    <li class="has-children">
                                        <a href="#">Dropdown</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Sub Menu One</a></li>
                                            <li><a href="#">Sub Menu Two</a></li>
                                            <li><a href="#">Sub Menu Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="category.html">Politics</a></li>
                            <li><a href="<?= URL_ROOT . "/about" ?>">About Us</a></li>
                            <li><a href="<?= URL_ROOT . "/contact-us" ?>">Contact Us</a></li>
                            <li class="has-children">
                                <a href="category.html">More</a>
                                <ul class="dropdown">
                                    <li><a href="blog.html">Account</a></li>
                                    <li class="has-children">
                                        <a href="<?= URL_ROOT . "/admin" ?>">Admin</a>
                                        <ul class="dropdown">
                                            <li><a href="<?= URL_ROOT . "/admin/dashboard" ?>">Dashboard</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <form action="#" class="search-form d-none d-lg-inline-block">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>