<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============        ===============
 * ===== Setting Model
 * ===============        ===============
 * ======================================
 */

namespace PhpStrike\app\models;

use celionatti\Bolt\Model\Model;

class Setting extends Model
{
    protected $fillable = ['name', 'value', 'status'];
}