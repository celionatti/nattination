<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============       ================
 * Contact Migration 
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
        Schema::create("contacts", function (Blueprint $table) {
            $table->id();
            $table->string('contact_id');
            $table->string('name');
            $table->string('email');
            $table->string('subject');
            $table->text('message');
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
        Schema::dropIfExists("contacts");
    }
};