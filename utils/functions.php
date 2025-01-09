<?php

use celionatti\Bolt\Authentication\Auth;
use PhpStrike\app\models\Setting;

function user()
{
    $auth = new Auth();
    return $auth->user();
}

function setting($key, $default = "")
{
    $setting = new Setting();
    return $setting->get_value($key)['value'] ?? $default;
}