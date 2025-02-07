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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');  // Judul Berita
            $table->string('slug');  // Slug untuk SEO-friendly URL
            $table->text('content');  // Isi Berita
            $table->string('category');  // Kategori Berita
            $table->string('author');  // Penulis
            $table->string('thumbnail')->nullable();  // Thumbnail
            $table->string('status');  // Status Berita
            $table->date('publish_date');  // Tanggal Publikasi
            $table->softDeletes();  // Soft Deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
