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
        Schema::create('additional_lampiran_pengadaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lelang_id')->references('id')->on('lelangs')->onDelete('cascade');
            $table->enum('nama_perusahaan', ['aktif', 'tidak_aktif'])->nullable();
            $table->enum('email_perusahaan', ['aktif', 'tidak_aktif'])->nullable();
            $table->enum('alamat_perusahaan', ['aktif', 'tidak_aktif'])->nullable();
            $table->enum('pengajuan_anggaran', ['aktif', 'tidak_aktif'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_lampiran_pengadaans');
    }
};
