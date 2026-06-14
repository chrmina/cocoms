<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('letters', function (Blueprint $table) {
            $table->char('id', 36)->primary();
            $table->char('sender_id', 36)->not_null();
            $table->char('recipient_id', 36)->not_null();
            $table->char('work_package_id', 36)->not_null();
            $table->string('filelink', 255)->nullable();
            $table->string('file_dir', 255)->nullable();
            $table->string('docref', 255)->nullable();
            $table->text('subject')->not_null();
            $table->mediumText('contents')->nullable();
            $table->date('docdate')->nullable();
            $table->boolean('confidential')->default(false);
            $table->boolean('replyreq')->default(false);
            $table->integer('tag_count')->default(0);
            $table->timestamps();
            
            $table->foreign('sender_id')->references('id')->on('senders')->onDelete('cascade');
            $table->foreign('recipient_id')->references('id')->on('recipients')->onDelete('cascade');
            $table->foreign('work_package_id')->references('id')->on('work_packages')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};
