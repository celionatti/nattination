<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============        ===============
 * ===== Subscriber Model
 * ===============        ===============
 * ======================================
 */

namespace PhpStrike\app\models;

use celionatti\Bolt\Model\Model;

class Subscriber extends Model
{
    protected $fillable = ['subscriber_id', 'name', 'email', 'status'];
}