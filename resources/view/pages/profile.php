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

use PhpStrike\app\components\LogoComponent;
use celionatti\Bolt\Illuminate\Utils\StringUtils;

$user = user();

?>

<?php $this->start('content') ?>

<div class="hero overlay inner-page bg-primary py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <?= renderComponent(LogoComponent::class) ?>
                <h3 class="heading text-white mb-3" data-aos="fade-up">Account Profile</h3>
                <h5 class="text-white">E-Mail: <span><?= $user['email'] ?></span></h5>
            </div>
        </div>
    </div>
</div>

<div class="section mt-3">
    <div class="container lh-lg">
        <p class="text-center fs-5">
            Dear <?= $user['name'] ?>, <strong><span class="text-danger"> Natti</span>Nation<span class="text-danger">.</span></strong> is still working on your profile page, Please bear with us for a while. Thank You.
        </p>
    </div>
</div>

<?php $this->end() ?>