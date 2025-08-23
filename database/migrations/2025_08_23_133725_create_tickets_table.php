<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');

            $table->enum('status', ['open', 'in_progress', 'closed', 'escalated'])->default('open');
            $table->enum('priority', ['low', 'medium', 'high', 'critical'])->default('low');

            $table->foreignId('employee_id')->constrained('users');
            $table->foreignId('assigned_to')->nullable()->constrained('users');
            $table->foreignId('escalated_to')->nullable()->constrained('users');
            $table->foreignId('product_id')->constrained('products');

            $table->string('file_path')->nullable();

            // Problem details
            $table->text('problem_details')->nullable();
            $table->string('problem_start')->nullable();

            // Error details
            $table->boolean('error_message_exists')->nullable();
            $table->text('error_message_text')->nullable();

            // Steps
            $table->text('tried_steps')->nullable();

            // Scope
            $table->enum('affect_scope', ['only_me', 'multiple_users'])->nullable();
            $table->text('affected_users')->nullable();

            // Frequency
            $table->enum('frequency', ['always', 'sometimes'])->nullable();
            $table->string('frequency_details')->nullable();

            // Extra
            $table->string('page_url')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
