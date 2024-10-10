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
<section class="section">
    <div class="py-5 text-center">
        <h2>Update User</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <div class="row g-5 mb-3">
        <div class="col-md-5 col-lg-4 order-md-last">
            <img src="<?= get_image(); ?>" alt="" class="mx-auto d-block preview" style="height:250px;width:300px;object-fit:cover;border-radius: 10px;cursor: pointer;">
        </div>
        <div class="col-md-7 col-lg-8">
            <form action="" method="post">
                <div class="row g-3">

                    <?= BootstrapForm::inputField("Name", "name", old_value("name", $user["name"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-5'], $errors) ?>

                    <?= BootstrapForm::inputField("E-Mail", "email", old_value("email", $user["email"] ?? ''), ['class' => 'form-control', 'type' => 'email'], ['class' => 'col-sm-7'], $errors) ?>

                    <?= BootstrapForm::inputField("Phone Number", "phone", old_value("phone", $user["phone"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-4'], $errors) ?>

                    <?= BootstrapForm::selectField("Gender", "gender", $user["gender"] ?? '', $genderOpts, ['class' => 'form-control'], ['class' => 'col-sm-4 mb-3'], $errors) ?>

                    <?= BootstrapForm::selectField("Role", "role", $user["role"] ?? '', $roleOpts, ['class' => 'form-control'], ['class' => 'col-sm-4 mb-3'], $errors) ?>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-dark btn-lg" type="submit">Update</button>
            </form>
        </div>
    </div>

</section>
<?php $this->end() ?>