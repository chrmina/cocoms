<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Migrate data from senders and recipients to companies
        // First, we need to copy senders to companies
        DB::statement('
            INSERT INTO companies (id, name, address, representative, contact, telephone, mobile, fax, email, remarks, created_at, updated_at)
            SELECT id, name, address, representative, contact, telephone, mobile, fax, email, remarks, created_at, updated_at
            FROM senders
        ');

        // Then copy recipients to companies
        DB::statement('
            INSERT INTO companies (id, name, address, representative, contact, telephone, mobile, fax, email, remarks, created_at, updated_at)
            SELECT id, name, address, representative, contact, telephone, mobile, fax, email, remarks, created_at, updated_at
            FROM recipients
        ');

        // Update letters to use the new company columns
        DB::statement('UPDATE letters SET sender_company_id = sender_id');
        DB::statement('UPDATE letters SET recipient_company_id = recipient_id');

        // Add foreign key constraints
        Schema::table('letters', function (Blueprint $table) {
            $table->foreign('sender_company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('recipient_company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('letters', function (Blueprint $table) {
            $table->dropForeign(['sender_company_id', 'recipient_company_id']);
        });

        // Delete from companies table (reverse of migration)
        // This is kept simple - in a real scenario you might want more careful handling
    }
};
