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
        Schema::create('data_personalias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pengalaman_kerja')->nullable();
            $table->string('profesi_keahlian')->nullable();
            $table->string('tahun_sertifikat_ijazah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_personalias');
    }
};
