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

use PhpStrike\app\models\Setting;
use celionatti\Bolt\Pagination\Pagination;

class AdminController extends Controller
{
    public function onConstruct(): void
    {
        $this->view->setLayout("admin");
        $this->setCurrentUser(user());

        if(!$this->currentUser) {
            redirect(URL_ROOT . "/login");
        }

        if($this->currentUser['role'] === "user") {
            redirect(URL_ROOT);
        }
    }

    public function dashboard()
    {
        $view = [];

        $this->view->render("admin/dashboard", $view);
    }
}
