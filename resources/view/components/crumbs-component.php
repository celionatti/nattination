<?php

declare(strict_types=1);

/**
 * ===================================
 * ==========
 * Component View
 * ==========       ==================
 * ===================================
 */

$user = user();

?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?= $name ?? 'Dashboard' ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="<?= URL_ROOT ?>" type="button" class="btn btn-sm btn-outline-info">
                <i class="fa-solid fa-globe mt-1"></i>
            </a>
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <a href="<?= URL_ROOT . "/admin/settings" ?>" type="button" class="btn btn-sm btn-outline-danger">
                <svg class="bi mt-1">
                    <use xlink:href="#gear-wide-connected" />
                </svg>
            </a>
        </div>
        <a href="<?= URL_ROOT . "/admin/account/{$user['user_id']}" ?>" type="button" class="btn btn-sm btn-primary d-flex align-items-center gap-1">
            <i class="fa-solid fa-user-secret"></i>
            <span class="fw-bold text-uppercase"><?= $user['name'] ?></span>
        </a>
    </div>
</div>