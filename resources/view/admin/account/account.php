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
<!-- Include SummerNote Editor stylesheet -->
<link href="<?= asset("packages/summernote/summernote-lite.min.css") ?>" rel="stylesheet">

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

    .avatar .avatar-name {
        margin-left: 7px;
    }

    .avatar-xl {
        height: 6.125rem;
        width: 6.125rem;
    }
</style>
<?php $this->end() ?>

<?php $this->start('content') ?>
<?= renderComponent(CrumbsComponent::class, ['name' => 'Account Info']); ?>
<section class="section">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card bg-transparent p-0 px-3 py-1">
            <div class="card-header bg-transparent border-bottom p-0 pb-1 d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Personal Information</h6>
                <a href="<?= URL_ROOT . "/admin/account/{$user['user_id']}/delete" ?>" class="btn btn-danger btn-sm px-4">Delete Account</a>
            </div>

            <div class="card-body px-0">
                <div class="row g-4">
                    <!-- Profile photo -->
                    <div class="px-5 col-12">
                        <label class="form-label">Profile picture</label>
                        <div class="d-flex align-items-center">
                            <label class="position-relative me-2" title="Replace this pic">
                                <!-- Avatar place holder -->
                                <span class="avatar avatar-xl">
                                    <img class="avatar-img rounded-circle border border-white border-3 shadow preview" src="<?= get_image($user['avatar'], "avatar") ?>" alt="">
                                </span>
                            </label>
                            <!-- Upload button -->
                            <label class="btn btn-sm btn-dark mb-0" for="profile-btn">Change</label>
                            <input class="form-control d-none" accept="image/*" name="avatar" id="profile-btn" type="file" onchange="preview_avatar(this.files[0])">
                        </div>
                    </div>

                    <?= BootstrapForm::inputField("Name", "name", old_value("name", $user["name"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-5'], $errors) ?>

                    <?= BootstrapForm::inputField("E-Mail", "email", old_value("email", $user["email"] ?? ''), ['class' => 'form-control', 'type' => 'email'], ['class' => 'col-sm-7'], $errors) ?>

                    <?= BootstrapForm::inputField("Phone Number", "phone", old_value("phone", $user["phone"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-7'], $errors) ?>

                    <?= BootstrapForm::selectField("Gender", "gender", $user["gender"] ?? '', $genderOpts, ['class' => 'form-control'], ['class' => 'col-sm-5'], $errors) ?>

                    <?= BootstrapForm::inputField("Twitter X", "social_links[]", old_value("social_links[]", $links["twitter"] ?? ''), ['class' => 'form-control', 'type' => 'url'], ['class' => 'col-sm-6'], $errors) ?>

                    <?= BootstrapForm::inputField("Facebook", "social_links[]", old_value("social_links[]", $links["facebook"] ?? ''), ['class' => 'form-control', 'type' => 'url'], ['class' => 'col-sm-6'], $errors) ?>

                    <?= BootstrapForm::inputField("Instagram", "social_links[]", old_value("social_links[]", $links["instagram"] ?? ''), ['class' => 'form-control', 'type' => 'url'], ['class' => 'col-sm-6'], $errors) ?>

                    <?= BootstrapForm::inputField("YouTube", "social_links[]", old_value("social_links[]", $links["youtube"] ?? ''), ['class' => 'form-control', 'type' => 'url'], ['class' => 'col-sm-6'], $errors) ?>

                    <?= BootstrapForm::textareaField("Bio", "bio", old_value("bio", $user["bio"] ?? ''), ['class' => 'form-control summernote'], ['class' => 'col-sm-12'], $errors) ?>
                </div>

                <hr class="my-4">

                <div class="row gap-3">
                    <button class="btn btn-dark col" type="submit">Save Changes</button>
                </div>
            </div>
        </div>
    </form>
</section>
<?php $this->end() ?>

<?php $this->start("script") ?>
<script src="<?= asset("packages/summernote/summernote-lite.min.js") ?>"></script>
<script>
    function preview_avatar(file) {
        document.querySelector(".preview").src = URL.createObjectURL(file);
    }

    $('.summernote').summernote({
        placeholder: 'User Bio (Talk about you.) Max: 225 words',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear', 'fontname', 'fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'height']],
        ],
        spellCheck: true,
    });
</script>
<?php $this->end() ?>
