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
        Schema::create('course_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            $table->foreignId('course_category_id')->constrained()->cascadeOnDelete(); 
            $table->foreignId('study_program_id')->constrained()->cascadeOnDelete(); 
            $table->string('status')->nullable();  // Status pendaftaran
            $table->string('payment_proof')->nullable();  // Bukti bayar
            $table->softDeletes();  // Menambahkan soft delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_registrations');
    }
};
