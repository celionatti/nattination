<?php

use celionatti\Bolt\Authentication\Auth;

function user()
{
    $auth = new Auth();
    return $auth->user();
}