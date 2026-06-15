<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('letter_references', function (Blueprint $table) {
            $table->id();
            $table->char('letter_id', 36)->not_null();
            $table->char('referenced_letter_id', 36)->not_null();
            $table->timestamps();

            $table->foreign('letter_id')->references('id')->on('letters')->onDelete('cascade');
            $table->foreign('referenced_letter_id')->references('id')->on('letters')->onDelete('cascade');
            $table->unique(['letter_id', 'referenced_letter_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('letter_references');
    }
};
