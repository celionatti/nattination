<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============        ===============
 * ===== Category Model
 * ===============        ===============
 * ======================================
 */

namespace PhpStrike\app\models;

use celionatti\Bolt\Model\Model;

class Category extends Model
{
    /** By default the table name is the the classname with s added. But if different you can define it. */
    protected $table = "categories";
    protected $primaryKey = "category_id";
    protected $fillable = ['category_id', 'name', 'status'];
}