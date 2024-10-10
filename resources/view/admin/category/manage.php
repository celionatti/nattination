<?php

use PhpStrike\app\components\CrumbsComponent;

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

?>


<?php $this->start('content') ?>
<?= renderComponent(CrumbsComponent::class, ['name' => 'Manage Categories']); ?>

<section class="section">
    <div class="d-flex justify-content-center align-items-center gap-3 border-bottom mb-2 pb-1">
        <a class="btn btn-outline-success px-4 py-1" href="<?= URL_ROOT . "/admin/categories/create" ?>">Create</a>
        <a class="btn btn-outline-secondary px-4 py-1 disabled" aria-disabled="true">Menu</a>
    </div>

    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $key => $category): ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $category['name'] ?></td>
                        <td><?= $category['status'] ?></td>
                        <td class="text-end">
                            <a href="<?= URL_ROOT . "/admin/categories/edit/{$category['category_id']}" ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>

                            <a href="<?= URL_ROOT . "/admin/categories/delete/{$category['category_id']}" ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-alt"></i> Trash</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<?php $this->end() ?>