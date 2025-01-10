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
<?php $this->end() ?>

<?php $this->start('content') ?>
<?= renderComponent(CrumbsComponent::class, ['name' => 'Edit Article']); ?>
<section class="section">

    <div class="row g-5 mb-3 py-2">
        <div class="col-md-5 col-lg-4 order-md-last">
            <img src="<?= get_image($article['thumbnail'], "default"); ?>" alt="" class="mx-auto d-block preview" style="height:250px;width:300px;object-fit:cover;border-radius: 10px;cursor: pointer;">
        </div>
        <div class="col-md-7 col-lg-8">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="d-flex align-items-center">
                        <small class="text-start px-1">Switch Upload: </small>
                        <?php if ($upload_type === "file") : ?>
                            <a href="<?= URL_ROOT . "/admin/articles/edit/{$article['article_id']}?ut=link" ?>" class="text-black my-2"> <i class="fa-solid fa-link"></i> Link Upload</a>
                        <?php else : ?>
                            <a href="<?= URL_ROOT . "/admin/articles/edit/{$article['article_id']}?ut=file" ?>" class="text-warning my-2"> <i class="fa-solid fa-file-import"></i> File Upload</a>
                        <?php endif; ?>
                    </div>

                    <div class="row">
                        <?php if ($upload_type === "file") : ?>
                            <?= BootstrapForm::fileField("Thumbnail", "thumbnail", ['class' => 'form-control', 'onchange' => "preview_thumbnail(this.files[0])", 'accept' => "image/*"], ['class' => 'col-6'], $errors) ?>
                        <?php else : ?>
                            <?= BootstrapForm::inputField("Thumbnail", "thumbnail", old_value("thumbnail", $article["thumbnail"] ?? ''), ['class' => 'form-control'], ['class' => 'col-6'], $errors) ?>
                        <?php endif; ?>

                        <?= BootstrapForm::inputField("Thumbnail Caption", "thumbnail_caption", old_value("thumbnail_caption", $article["thumbnail_caption"] ?? ''), ['class' => 'form-control'], ['class' => 'col-6'], $errors) ?>
                    </div>

                    <hr class="my-1">

                    <?= BootstrapForm::inputField("Title", "title", old_value("title", $article["title"] ?? ''), ['class' => 'form-control'], ['class' => 'col-sm-12'], $errors) ?>

                    <?= BootstrapForm::selectField("Category", "category_id", $article["category_id"] ?? '', $categoryOpts, ['class' => 'form-control'], ['class' => 'col-sm-12 mb-3'], $errors) ?>

                    <?= BootstrapForm::textareaField("Content", "content", old_value("content", $article["content"] ?? ''), ['class' => 'form-control summernote'], ['class' => 'col-sm-12'], $errors) ?>

                    <?= BootstrapForm::inputField("Tags (natti, news)", "tags", old_value("tags", $article["tags"] ?? ''), ['class' => 'form-control'], ['class' => 'col-6'], $errors) ?>

                    <?= BootstrapForm::inputField("Contributors", "contributors", old_value("contributors", $article["contributors"] ?? ''), ['class' => 'form-control'], ['class' => 'col-6'], $errors) ?>

                    <?php if($article['is_editor'] === 0): ?>

                    <hr class="my-3 border border-danger">

                    <?= BootstrapForm::selectField("Editor Pick", "is_editor", $article["is_editor"] ?? '', $editorOpts, ['class' => 'form-control'], ['class' => 'col-sm-12 mb-3'], $errors) ?>
                    <?php endif; ?>

                    <?= BootstrapForm::selectField("Status", "status", $article["status"] ?? '', $statusOpts, ['class' => 'form-control'], ['class' => 'col-sm-12 mb-3'], $errors) ?>

                </div>

                <hr class="my-4">

                <div class="row gap-3">
                    <a href="<?= URL_ROOT . "/admin/articles/manage" ?>" class="btn btn-danger btn-lg col-4">Cancel</a>
                    <button class="btn btn-warning btn-lg col" type="submit">Update Article</button>
                </div>
            </form>
        </div>
    </div>

</section>
<?php $this->end() ?>

<?php $this->start("script") ?>
<script src="<?= asset("packages/summernote/summernote-lite.min.js") ?>"></script>
<script>
    function preview_thumbnail(file) {
        document.querySelector(".preview").src = URL.createObjectURL(file);
    }

    $('.summernote').summernote({
        placeholder: 'Article Content',
        tabsize: 2,
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear', 'fontname', 'fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph', 'height']],
            ['view', ['fullscreen']],
        ],
        spellCheck: true,
    });
</script>
<?php $this->end() ?>