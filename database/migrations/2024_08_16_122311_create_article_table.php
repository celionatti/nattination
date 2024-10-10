<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============       ================
 * Article Migration 
 * ===============       ================
 * ======================================
 */

 use celionatti\Bolt\Migration\Migration;
 use celionatti\Bolt\illuminate\Schema\Schema;
 use celionatti\Bolt\illuminate\Schema\Blueprint;

return new class extends Migration
{
    /**
     * The Up method is to create table.
     *
     * @return void
     */
    public function up():void
    {
        Schema::create("articles", function (Blueprint $table) {
            $table->id();
            $table->string('article_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('category_id')->nullable();
            $table->bigInteger('views')->default(0);
            $table->string('title', 500);
            $table->text("content");
            $table->string("tags");
            $table->string("thumbnail");
            $table->string("thumbnail_caption");
            $table->string("contributors");
            $table->boolean("is_editor")->default(0);
            $table->string("meta_title");
            $table->string("meta_description");
            $table->string("meta_keywords");
            $table->enum('status', ['draft', 'publish'])->default("draft");
            $table->timestamps();
        });
    }

    /**
     * The Down method is to drop table
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists("articles");
    }
};