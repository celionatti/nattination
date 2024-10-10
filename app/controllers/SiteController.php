<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** SiteController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;

use celionatti\Bolt\Controller;

class SiteController extends Controller
{
    public function welcome()
    {
        $view = [
            'name' => 'Lugard Fredrick',
            'country' => 'UK'
        ];

        $this->view->render("welcome", $view);
    }

    public function about()
    {
        $view = [
            
        ];

        $this->view->render("about", $view);
    }

    public function contact()
    {
        $view = [
            
        ];

        $this->view->render("contact", $view);
    }

    public function category()
    {
        $view = [
            
        ];

        $this->view->render("pages/category", $view);
    }
}