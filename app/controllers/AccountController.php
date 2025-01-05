<?php

declare(strict_types=1);

/**
 * ===============================================
 * ==================           ==================
 * ****** AccountController
 * ==================           ==================
 * ===============================================
 */

namespace PhpStrike\app\controllers;

use celionatti\Bolt\Http\Request;
use celionatti\Bolt\Http\Response;

use celionatti\Bolt\Controller;

class AccountController extends Controller
{
    public $currentUser = null;

    public function onConstruct(): void
    {

    }
}