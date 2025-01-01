<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============        ===============
 * ===== FailedLogin Model
 * ===============        ===============
 * ======================================
 */

namespace PhpStrike\app\models;

use celionatti\Bolt\Model\Model;

class FailedLogin extends Model
{
    /** By default the table name is the the classname with s added. But if different you can define it. */
    protected $table = "failed_logins";
    protected $primaryKey = "id";
    protected $fillable = ['email', 'attempts', 'blocked_until'];
}