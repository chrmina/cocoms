<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tags_tags', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('namespace', 255)->nullable();
            $table->string('slug', 255)->not_null();
            $table->string('label', 255)->not_null();
            $table->unsignedInteger('counter')->default(0);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->string('tag_key', 255)->not_null();
            
            $table->unique(['tag_key', 'label', 'namespace']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tags_tags');
    }
};
