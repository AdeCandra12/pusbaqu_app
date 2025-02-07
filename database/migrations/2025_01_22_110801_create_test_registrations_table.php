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
        Schema::create('test_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();  // Relasi ke tabel registrants
            $table->foreignId('test_category_id')->constrained()->cascadeOnDelete();  // Relasi ke tabel service_categories
            $table->foreignId('study_program_id')->constrained()->cascadeOnDelete();  // Relasi ke tabel study_programs
            $table->foreignId('schedule_id')->constrained()->cascadeOnDelete();  // Relasi ke tabel schedules
            $table->string('purpose');  // Kepentingan tes
            $table->string('payment_proof')->nullable();  // Bukti bayar
            $table->string('status')->nullable();  // Status pendaftaran
            $table->softDeletes();  // Menambahkan soft delete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_registrations');
    }
};
