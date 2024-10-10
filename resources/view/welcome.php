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

<main>
    <?= renderComponent(BannerComponent::class); ?>

    <!-- Start posts-entry -->
    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Business</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>
            <div class="row g-3">
                <div class="col-md-9">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="single.html" class="img-link">
                                    <img src="http://nattinationnews.test//uploads/articles/GIVEAWAY_662d52b70035d.png" alt="Image" class="img-fluid">
                                </a>
                                <span class="date">Apr. 14th, 2022</span>
                                <h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                                <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="single.html" class="img-link">
                                    <img src="http://nattinationnews.test//uploads/articles/GIVEAWAY_662d52b70035d.png" alt="Image" class="img-fluid">
                                </a>
                                <span class="date">Apr. 14th, 2022</span>
                                <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                                <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>

                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">Meta unveils fees on metaverse sales</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>

                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">UK sees highest inflation in 30 years</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End posts-entry -->

    <section class="section posts-entry">
        <div class="container">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Culture</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>
            <div class="row g-3">
                <div class="col-md-9 order-md-2">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="single.html" class="img-link">
                                    <img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid">
                                </a>
                                <span class="date">Apr. 14th, 2022</span>
                                <h2><a href="single.html">Thought you loved Python? Wait until you meet Rust</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                                <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="blog-entry">
                                <a href="single.html" class="img-link">
                                    <img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid">
                                </a>
                                <span class="date">Apr. 14th, 2022</span>
                                <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                                <p><a href="single.html" class="btn btn-sm btn-outline-primary">Read More</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="list-unstyled blog-entry-sm">
                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">Don’t assume your user data in the cloud is safe</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>

                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">Meta unveils fees on metaverse sales</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>

                        <li>
                            <span class="date">Apr. 14th, 2022</span>
                            <h3><a href="single.html">UK sees highest inflation in 30 years</a></h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nobis ea quis inventore vel voluptas.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Politics</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_4.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_4.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">


                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_3.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">



                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_2.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="post-entry-alt">
                        <a href="single.html" class="img-link"><img src="http://nattinationnews.test//uploads/articles/_250946fd-6568-_663238d659353.jpg" alt="Image" class="img-fluid"></a>
                        <div class="excerpt">



                            <h2><a href="single.html">Startup vs corporate: What job suits you best?</a></h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 me-3 float-start"><img src="images/person_5.jpg" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">David Anderson</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                            <p><a href="#" class="read-more">Continue Reading</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="section bg-light">
        <div class="container">

            <div class="row mb-4">
                <div class="col-sm-6">
                    <h2 class="posts-entry-title">Travel</h2>
                </div>
                <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
            </div>

            <div class="row align-items-stretch retro-layout-alt">

                <div class="col-md-5 order-md-2">
                    <a href="single.html" class="hentry img-1 h-100 gradient">
                        <div class="featured-img" style="background-image: url('http://nattinationnews.test//uploads/articles/viva-luna-studi_662e398c7e410.jpg');"></div>
                        <div class="text">
                            <span>February 12, 2019</span>
                            <h2>Meta unveils fees on metaverse sales</h2>
                        </div>
                    </a>
                </div>

                <div class="col-md-7">

                    <a href="single.html" class="hentry img-2 v-height mb30 gradient">
                        <div class="featured-img" style="background-image: url('http://nattinationnews.test//uploads/articles/viva-luna-studi_662e398c7e410.jpg');"></div>
                        <div class="text text-sm">
                            <span>February 12, 2019</span>
                            <h2>AI can now kill those annoying cookie pop-ups</h2>
                        </div>
                    </a>

                    <div class="two-col d-block d-md-flex justify-content-between">
                        <a href="single.html" class="hentry v-height img-2 gradient">
                            <div class="featured-img" style="background-image: url('http://nattinationnews.test//uploads/articles/viva-luna-studi_662e398c7e410.jpg');"></div>
                            <div class="text text-sm">
                                <span>February 12, 2019</span>
                                <h2>Don’t assume your user data in the cloud is safe</h2>
                            </div>
                        </a>
                        <a href="single.html" class="hentry v-height img-2 ms-auto float-end gradient">
                            <div class="featured-img" style="background-image: url('http://nattinationnews.test//uploads/articles/viva-luna-studi_662e398c7e410.jpg');"></div>
                            <div class="text text-sm">
                                <span>February 12, 2019</span>
                                <h2>Startup vs corporate: What job suits you best?</h2>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</main>
<?php $this->end() ?>