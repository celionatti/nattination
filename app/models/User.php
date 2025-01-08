<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============        ===============
 * ===== User Model
 * ===============        ===============
 * ======================================
 */

namespace PhpStrike\app\models;

use celionatti\Bolt\Model\Model;

class User extends Model
{
    /** By default the table name is the the classname with s added. But if different you can define it. */
    protected $primaryKey = "user_id";
    protected $fillable = ['user_id', 'name', 'email', 'phone', 'password', 'email_verified_at', 'gender', 'role', 'is_blocked', 'subscriber', 'remember_token', 'avatar', 'bio', 'social_links'];

    public function update_remember_token($token, $id)
    {
        return $this->query("UPDATE users SET remember_token = $token WHERE user_id = :id;", ['id' => $id], "assoc")['result'];
    }
}