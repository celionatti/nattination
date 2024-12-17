<?php

declare(strict_types=1);

/**
 * ===================================
 * ==========
 * Component View
 * ==========       ==================
 * ===================================
 */

?>

<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Natti Nation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-black d-flex align-items-center gap-2 active" aria-current="page" href="<?= URL_ROOT . "/admin/dashboard" ?>">
                        <i class="bi fa-solid fa-house"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black d-flex align-items-center gap-2" href="<?= URL_ROOT . "/admin/articles/manage" ?>">
                        <i class="bi fa-regular fa-newspaper"></i>
                        Articles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black d-flex align-items-center gap-2" href="<?= URL_ROOT . "/admin/categories/manage" ?>">
                        <i class="bi fa-solid fa-list"></i>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black d-flex align-items-center gap-2" href="<?= URL_ROOT . "/admin/users/manage" ?>">
                        <i class="bi fa-solid fa-users"></i>
                        Users
                    </a>
                </li>
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link text-black d-flex align-items-center gap-2 disabled" href="<?= URL_ROOT . "/admin/settings" ?>">
                        <svg class="bi">
                            <use xlink:href="#gear-wide-connected" />
                        </svg>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black d-flex align-items-center gap-2" href="<?= URL_ROOT . "/logout" ?>">
                        <svg class="bi">
                            <use xlink:href="#door-closed" />
                        </svg>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>