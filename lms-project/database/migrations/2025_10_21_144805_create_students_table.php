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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // Foreign key to users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Student-specific info
            $table->string('roll_no')->nullable();
            $table->string('year')->nullable();            // e.g. 1st Year, 2nd Year, etc.
            $table->string('major')->nullable();           // e.g. IT, Electrical, etc.
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
        Schema::dropIfExists('students');
    }
};
