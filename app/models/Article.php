<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============        ===============
 * ===== Article Model
 * ===============        ===============
 * ======================================
 */

namespace PhpStrike\app\models;

use celionatti\Bolt\Model\Model;

class Article extends Model
{
    protected $primaryKey = 'article_id';
    protected $fillable = ['article_id', 'title', 'content', 'tags', 'user_id', 'category_id', 'thumbnail', 'thumbnail_caption', 'meta_title', 'meta_description', 'meta_keywords', 'contributors', 'is_editor', 'views', 'status'];
}