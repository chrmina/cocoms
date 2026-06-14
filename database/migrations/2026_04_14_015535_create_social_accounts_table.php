<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('user_id', 36)->not_null();
            $table->string('provider', 255)->not_null();
            $table->string('username', 255)->nullable();
            $table->string('reference', 255)->not_null();
            $table->string('avatar', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('link', 255)->not_null();
            $table->string('token', 500)->not_null();
            $table->string('token_secret', 500)->nullable();
            $table->dateTime('token_expires')->nullable();
            $table->boolean('active')->default(true);
            $table->text('data')->not_null();
            $table->dateTime('created_at')->not_null();
            $table->dateTime('updated_at')->not_null();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_accounts');
    }
};
