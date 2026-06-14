<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('work_packages', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('number', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->string('wp_coordinator', 255)->nullable();
            $table->string('wp_qs', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_packages');
    }
};
