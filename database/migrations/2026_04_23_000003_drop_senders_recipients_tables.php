<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop old foreign keys and columns
        Schema::table('letters', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['recipient_id']);
            $table->dropColumn(['sender_id', 'recipient_id']);
        });

        // Rename columns to cleaner names
        Schema::table('letters', function (Blueprint $table) {
            $table->renameColumn('sender_company_id', 'sender_id');
            $table->renameColumn('recipient_company_id', 'recipient_id');

            // Add foreign keys for the renamed columns
            $table->foreign('sender_id')->references('id')->on('companies')->cascadeOnDelete();
            $table->foreign('recipient_id')->references('id')->on('companies')->cascadeOnDelete();
        });

        // Drop old tables
        Schema::dropIfExists('senders');
        Schema::dropIfExists('recipients');
    }

    public function down(): void
    {
        // Reverse the rename
        Schema::table('letters', function (Blueprint $table) {
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['recipient_id']);
            $table->renameColumn('sender_id', 'sender_company_id');
            $table->renameColumn('recipient_id', 'recipient_company_id');
        });

        // Recreate the old tables
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

        Schema::create('recipients', function (Blueprint $table) {
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

        // Add back the foreign keys
        Schema::table('letters', function (Blueprint $table) {
            $table->foreign('sender_company_id')->references('id')->on('senders')->cascadeOnDelete();
            $table->foreign('recipient_company_id')->references('id')->on('recipients')->cascadeOnDelete();
        });
    }
};
