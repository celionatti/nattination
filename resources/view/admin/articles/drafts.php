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
use celionatti\Bolt\Illuminate\Utils\StringUtils;

// $stringUtils = new StringUtils();

?>


<?php $this->start('content') ?>
<?= renderComponent(CrumbsComponent::class, ['name' => 'Manage Articles']); ?>

<section class="section">
    <div class="d-flex justify-content-center align-items-center gap-3 border-bottom mb-2 pb-1">
        <a class="btn btn-outline-success px-4 py-1" href="<?= URL_ROOT . "/admin/articles/create?ut=file" ?>">Create</a>
        <a class="btn btn-outline-warning px-4 py-1" href="<?= URL_ROOT . "/admin/articles/manage" ?>">Manage</a>
        <a class="btn btn-outline-secondary px-4 py-1 disabled" aria-disabled="true">Menu</a>
    </div>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Title</th>
                    <th scope="col">Views</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Contributors</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($articles as $key => $article): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><img src="<?= get_image($article['thumbnail']) ?>" class="d-block" style="height:50px;width:50px;object-fit:cover;border-radius: 10px;cursor: pointer;"></td>
                    <td><a href="<?= URL_ROOT . "/admin/articles/view/{$article['article_id']}" ?>" class="text-black"><?= StringUtils::create($article['title'])->excerpt() ?></a></td>
                    <td class="fw-bold"><?= $article['views'] ?></td>
                    <td class="text-capitalize"><?= $article['tags'] ?></td>
                    <td class="text-capitalize"><?= $article['contributors'] ?></td>
                    <td class="text-capitalize"><?= $article['status'] ?></td>
                    <td class="text-end">
                        <a href="<?= URL_ROOT . "/admin/articles/edit/{$article['article_id']}?ut=file" ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>

                        <a href="<?= URL_ROOT . "/admin/articles/delete/{$article['article_id']}" ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-alt"></i> Trash</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php $this->end() ?>