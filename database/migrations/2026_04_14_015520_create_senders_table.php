<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('senders', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->string('name', 255)->not_null();
            $table->text('address')->nullable();
            $table->string('representative', 255)->nullable();
            $table->string('contact', 255)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('mobile', 20)->nullable();
            $table->string('fax', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('senders');
    }
};
