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

use celionatti\Bolt\Forms\BootstrapForm;

?>


<?php $this->start('content') ?>

<section class="container bg-white my-5 shadow rounded-2 p-5">
    <div class="row">
        <div class="col-8 py-5 px-4">
            <div class="d-flex justify-content-end align-items-end gap-3">
                <a href="<?= URL_ROOT ?>" class="h4 font-monospace fw-bold text-uppercase text-decoration-underline text-end text-primary-emphasis pb-2 mx-3"><i class="fa-solid fa-home"></i></a>
                <h4 class="font-monospace fw-bold text-uppercase text-decoration-underline text-end text-primary-emphasis pb-2">Login Account</h4>
            </div>

            <form action="" method="post">
                <div class="row g-3">
                    <?= BootstrapForm::inputField("Email", "email", old_value("email", $user["email"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-12'], $errors) ?>

                    <?= BootstrapForm::inputField("Password", "password", old_value("password", $user["password"] ?? ''), ['class' => 'form-control', 'type' => 'password'], ['class' => 'col-sm-12'], $errors) ?>
                </div>
                <?= BootstrapForm::checkField("Remember Me", "remember", "", ['class' => 'form-check-input'], ['class' => 'form-check text-start my-1'], $errors) ?>

                <hr class="my-2">

                <p class="text-center text-dark-emphasis">Not a Registered User, You can join us here. <a href="<?= URL_ROOT . "/auth/register" ?>">Register</a></p>

                <button class="w-100 btn btn-dark btn-sm py-2" type="submit">Access Account</button>
            </form>
        </div>
        <div class="col-4 my-auto">
            <div class="border-start border-primary-subtle">
                <img src="<?= get_image("assets/img/login.png") ?>" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<?php $this->end() ?>