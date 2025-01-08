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

use PhpStrike\app\components\InfoComponent;


$user = user();

?>

<?php $this->start('content') ?>

<div class="hero overlay inner-page bg-primary py-3">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <h1 class="heading monospace text-uppercase text-white mb-3" data-aos="fade-up">Subscribe To our newsletter.</h1>
            </div>
        </div>
    </div>
</div>

<div class="section mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <?= renderComponent(InfoComponent::class) ?>
            </div>
            <div class="col-lg-8 lh-lg" data-aos="fade-up" data-aos-delay="200">
                <h4>Stay Connected and Informed!</h4>
                <p>Never miss an update! Subscribe to our exclusive newsletter and receive the latest articles, insights, and updates directly in your inbox. Choose what works best for you:</p>
                <ul class="lh-lg">
                    <li><strong>Daily Updates:</strong> Stay on top of the latest news every day.</li>
                    <li><strong>Weekly Highlights:</strong> Get a curated list of top stories every week.</li>
                    <li><strong>Monthly Recap:</strong> Catch up on all the important updates at the end of the month.</li>
                </ul>
                <p><strong>Note:</strong> You need to be a registered member to subscribe to our newsletter. If you’re not registered yet, <a href="<?= URL_ROOT . "/auth/register" ?>">sign up here.</a></p>
                <p>Already registered? <a href="<?= URL_ROOT . "/login" ?>">Log in and subscribe now!</a></p>
                <p>Join our community and stay informed on what matters most to you.</p>

                <?php if($user): ?>
                <a href="<?= URL_ROOT . "/subscribe/{$user['user_id']}" ?>" class="btn btn-dark w-100 py-3">Subscribe Now</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->end() ?>