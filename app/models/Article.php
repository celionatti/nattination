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

    public function search($search)
    {
        return $this->query("SELECT * FROM articles WHERE title LIKE '%$search%' OR content LIKE '%$search%' OR tags LIKE '%$search%' AND status = :status;", ['status' => 'publish'], "assoc")['result'];
    }

    public function article_author($id)
    {
        return $this->query("SELECT name FROM users WHERE user_id = (SELECT user_id FROM articles WHERE article_id = :id);", ['id' => $id], "assoc")['result'][0];
    }

    public function recent_articles()
    {
        return $this->query("SELECT * FROM articles WHERE status = 'publish' ORDER BY created_at DESC LIMIT 5;", [], "assoc")['result'];
    }

    public function popular_articles($id)
    {
        return $this->query("SELECT * FROM articles WHERE article_id != :id AND status = 'publish' ORDER BY views DESC LIMIT 10;", ['id' => $id], "assoc")['result'];
    }

    public function more_articles($id)
    {
        return $this->query("SELECT * FROM articles WHERE article_id != :id AND status = 'publish' ORDER BY RAND();", ['id' => $id], "assoc")['result'];
    }

    public function article_lists()
    {
        return $this->query("SELECT * FROM articles WHERE is_editor = 0 AND is_featured = 0;", [], "assoc")['result'];
    }

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
        return $this->query("UPDATE articles SET is_editor = 1 WHERE article_id = :id AND is_featured != 1;", ['id' => $id], "assoc")['result'];

        // return $this->query("SELECT * FROM events WHERE event_id != :id AND date_time > NOW() ORDER BY date_time ASC LIMIT 5;", ['id' => $id], "assoc")['result'];
    }

    public function featured_count()
    {
        return $this->query("SELECT COUNT(*) as count FROM articles WHERE is_featured = 1;", [], "assoc")['result'][0];
    }

    public function remove_oldest_featured()
    {
        return $this->query("UPDATE articles SET is_featured = 0 WHERE article_id = (SELECT article_id FROM articles WHERE is_featured = 1 ORDER BY updated_at ASC LIMIT 1);", [], "assoc")['result'][0];
    }

    public function update_featured($id)
    {
        return $this->query("UPDATE articles SET is_featured = 1 WHERE article_id = :id;", ['id' => $id], "assoc")['result'];
    }

    public function increase_view($id)
    {
        return $this->query("UPDATE articles SET views = views + 1 WHERE article_id = :id;", ['id' => $id], "assoc");
    }
}