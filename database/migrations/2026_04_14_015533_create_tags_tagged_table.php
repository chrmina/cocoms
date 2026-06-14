<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags_tagged', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('tag_id', 36)->nullable();
            $table->char('fk_id', 36)->nullable();
            $table->string('fk_table', 255)->not_null();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            
            $table->unique(['tag_id', 'fk_id', 'fk_table']);
            $table->foreign('tag_id')->references('id')->on('tags_tags')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags_tagged');
    }
};
