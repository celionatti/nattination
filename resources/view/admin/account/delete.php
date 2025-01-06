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

use PhpStrike\app\components\CrumbsComponent;
use celionatti\Bolt\Forms\BootstrapForm;

?>


<?php $this->start('header') ?>

<style>
    .avatar {
        height: 3rem;
        width: 3rem;
        position: relative;
        display: inline-block !important;
    }

    .avatar-img {
        width: 100%;
        height: 100%;
        -o-object-fit: cover;
        object-fit: cover;
    }

    .avatar-xl {
        height: 8.125rem;
        width: 8.125rem;
    }
</style>
<?php $this->end() ?>

<?php $this->start('content') ?>
<?= renderComponent(CrumbsComponent::class, ['name' => 'Delete Account']); ?>

<section class="section">
    <form action="" method="post">
        <div class="card bg-transparent p-0 px-3 py-1">
            <div class="card-header bg-transparent border-bottom p-0 pb-1">
                <h6 class="mb-0">Account Information</h6>
            </div>

            <div class="card-body px-0">
                <div class="row g-4">
                    <!-- Profile photo -->
                    <div class="px-5 col-12">
                        <div class="d-flex justify-content-center align-items-center">
                            <label class="position-relative me-2" title="Replace this pic">
                                <!-- Avatar place holder -->
                                <span class="avatar avatar-xl">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow preview" src="<?= get_image($user['avatar'], "avatar") ?>" alt="">
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="px-5">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <td class="text-capitalize"><?= $user['name'] ?></td>
                                <th>Email</th>
                                <td><?= $user['email'] ?></td>
                            </tr>
                             <tr>
                                <th>Phone</th>
                                <td><?= $user['phone'] ?></td>
                                <th>Role</th>
                                <td class="text-capitalize fw-medium"><?= $user['role'] ?></td>
                            </tr>
                        </table>

                        <h5 class="text-center text-danger text-body-danger border-bottom border-2 border-danger pb-2">Are you sure you want to delete your account.</h5>

                        <?= BootstrapForm::inputField("Password", "password", old_value("password", ''), ['class' => 'form-control', 'type' => 'password'], ['class' => 'col-sm-12'], $errors) ?>

                    </div>

                </div>

                <hr class="my-4">

                <div class="row gap-3">
                    <button class="btn btn-danger col" type="submit">Delete</button>
                </div>
            </div>
        </div>
    </form>
</section>
<?php $this->end() ?>
