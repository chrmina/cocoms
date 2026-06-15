<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('letters', function (Blueprint $table) {
            // Add new columns for company references
            $table->char('sender_company_id', 36)->nullable()->after('id');
            $table->char('recipient_company_id', 36)->nullable()->after('sender_company_id');
        });
    }

    public function down(): void
    {
        Schema::table('letters', function (Blueprint $table) {
            if (Schema::hasColumn('letters', 'sender_company_id')) {
                $table->dropColumn('sender_company_id');
            }
            if (Schema::hasColumn('letters', 'recipient_company_id')) {
                $table->dropColumn('recipient_company_id');
            }
        });
    }
};
