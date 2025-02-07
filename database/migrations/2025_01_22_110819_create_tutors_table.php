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
        Schema::create('tutors', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Nama Tutor
            $table->string('email');  // Email Tutor
            $table->string('phone_number');  // Nomor HP Tutor
            $table->string('position'); // Posisi Tutor
            $table->string('photo')->nullable();  // Foto Tutor
            $table->string('sosial_media')->nullable();
            $table->softDeletes();  // Soft Deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutors');
    }
};
