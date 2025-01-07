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
use celionatti\Bolt\Forms\BootstrapForm;

?>

<?php $this->start('content') ?>

<div class="hero overlay inner-page bg-primary py-3">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center pt-5">
            <div class="col-lg-6">
                <h1 class="heading monospace text-uppercase text-white mb-3" data-aos="fade-up">Subscribe for our newsletter.</h1>
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
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                <form action="" method="post">
                    <div class="row">
                        <?= BootstrapForm::inputField("Name", "name", old_value("name", $user["name"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-12 mb-3'], $errors) ?>

                        <?= BootstrapForm::inputField("E-Mail", "email", old_value("email", $user["email"] ?? ''), ['class' => 'form-control', 'type' => 'email'], ['class' => 'col-sm-12 mb-3'], $errors) ?>

                        <hr class="my-2">

                        <button class="w-100 btn btn-dark" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->end() ?>