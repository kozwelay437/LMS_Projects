<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            // Foreign key to users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Teacher-specific info
            $table->string('department')->nullable();      // e.g. IT, Civil, etc.
            $table->string('designation')->nullable();     // e.g. Lecturer, Professor, etc.
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            // Status
            $table->enum('status', ['Pending', 'Approved'])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
