<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============        ===============
 * ===== Contact Model
 * ===============        ===============
 * ======================================
 */

namespace PhpStrike\app\models;

use celionatti\Bolt\Model\Model;

class Contact extends Model
{
    protected $fillable = ['contact_id', 'name', 'email', 'subject', 'message'];
}