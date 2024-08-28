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
        Schema::create('profile_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->string('luas_wisata');
            $table->string('tahun_peresmian');
            $table->string('pengelola');
            $table->string('lokasi');
            $table->text('deskripsi');
            $table->text('translate_deskripsi');
            $table->string('image');
            $table->string('qrcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_wisatas');
    }
};
