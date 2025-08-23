<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ticket_id')->constrained()->cascadeOnDelete();
            $table->string('file_path'); // path to uploaded file
            $table->string('original_name')->nullable(); // optional: original file name
            $table->string('mime_type')->nullable();    // optional: file type
            $table->unsignedBigInteger('file_size')->nullable(); // optional: size in bytes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_attachments');
    }
};
