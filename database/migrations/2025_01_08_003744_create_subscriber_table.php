<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============       ================
 * Subscriber Migration 
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
        Schema::create("subscribers", function (Blueprint $table) {
            $table->id();
            $table->string('subscriber_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique('email');
            $table->enum('status', ['active', 'disable'])->default("disable");
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
        Schema::dropIfExists("subscribers");
    }
};