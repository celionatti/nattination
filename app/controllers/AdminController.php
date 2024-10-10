<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AdminController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Controller;

class AdminController extends Controller
{
    public function onConstruct(): void
    {
        $this->view->setLayout("admin");
    }

    public function dashboard()
    {
        $view = [];

        $this->view->render("admin/dashboard", $view);
    }
}
