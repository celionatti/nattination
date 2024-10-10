<?php

declare(strict_types=1);

/**
 * ======================================
 * ===============       ================
 * User Migration 
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
        Schema::create("users", function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->index('user_id');
            $table->string('name')->index('name');
            $table->string('email')->unique('email');
            $table->string('phone')->nullable('phone');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->default("others");
            $table->enum('role', ['admin', 'user', 'editor'])->default("user");
            $table->boolean('is_blocked')->default(0);
            $table->timestamps();
        });

        Schema::create('rate_limits', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique('key');
            $table->integer('attempts')->default(0);
            $table->integer('expires_at');
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
        Schema::dropIfExists("users");
        Schema::dropIfExists("rate_limits");
    }
};