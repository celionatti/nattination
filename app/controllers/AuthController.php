<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AuthController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Controller;

class AuthController extends Controller
{
    public function onConstruct(): void
    {
        $this->view->setLayout("auth");
    }

    public function login(Request $request, Response $reponse)
    {
        $view = [
            
        ];

        $this->view->render("auth/login", $view);
    }

    public function register($name, Request $request, Response $reponse)
    {
        $view = [
            
        ];

        $this->view->render("auth/register", $view);
    }
}
