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

<section class="container bg-white my-5 shadow rounded-2 p-1">
    <div class="row">
        <div class="col-8 py-2 px-4">
            <h4 class="font-monospace fw-bold text-uppercase text-decoration-underline text-end text-primary-emphasis pb-2">Create an Account</h4>

            <form action="" method="post">
                <div class="row g-3">
                    <?= BootstrapForm::inputField("Full Name", "name", old_value("name", $user["name"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-5'], $errors) ?>

                    <?= BootstrapForm::inputField("Email", "email", old_value("email", $user["email"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-7'], $errors) ?>

                    <?= BootstrapForm::inputField("Phone Number", "phone", old_value("phone", $user["phone"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-6'], $errors) ?>

                    <?= BootstrapForm::selectField("Gender", "gender", $user["gender"] ?? '', $genderOpts, ['class' => 'form-control'], ['class' => 'col-sm-6'], $errors) ?>

                    <?= BootstrapForm::inputField("Password", "password", old_value("password", $user["password"] ?? ''), ['class' => 'form-control', 'type' => 'password'], ['class' => 'col-sm-12'], $errors) ?>

                    <?= BootstrapForm::inputField("Confirm Password", "password_confirm", old_value("password_confirm", $user["password_confirm"] ?? ''), ['class' => 'form-control', 'type' => 'password'], ['class' => 'col-sm-12'], $errors) ?>
                </div>
                <?= BootstrapForm::checkField("Terms and Conditions", "terms", "", ['class' => 'form-check-input'], ['class' => 'form-check text-start mt-3 mb-2'], $errors) ?>

                <hr class="my-2">

                <p class="text-center text-dark-emphasis">Already a User, You can login here. <a href="<?= URL_ROOT . "/login" ?>">Login</a></p>

                <button class="w-100 btn btn-dark btn-sm py-2" type="submit">Create Account</button>
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