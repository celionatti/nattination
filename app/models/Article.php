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
    protected $fillable = ['article_id', 'title', 'content', 'tags', 'user_id', 'category_id', 'thumbnail', 'thumbnail_caption', 'meta_title', 'meta_description', 'meta_keywords', 'contributors', 'is_editor', 'is_featured', 'views', 'status'];

    public function editor_count()
    {
        return $this->query("SELECT COUNT(*) as count FROM articles WHERE is_editor = 1;", [], "assoc")['result'][0];
    }

    public function remove_oldest_editor()
    {
        return $this->query("UPDATE articles SET is_editor = 0 WHERE article_id = (SELECT article_id FROM articles WHERE is_editor = 1 ORDER BY updated_at ASC LIMIT 1);", [], "assoc")['result'][0];
    }

    public function update_editor($id)
    {
        return $this->query("UPDATE articles SET is_editor = 1 WHERE article_id = :id;", ['id' => $id], "assoc")['result'];

        // return $this->query("SELECT * FROM events WHERE event_id != :id AND date_time > NOW() ORDER BY date_time ASC LIMIT 5;", ['id' => $id], "assoc")['result'];
    }
}