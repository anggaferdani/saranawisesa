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
        Schema::create('lelangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_lelang');
            $table->foreignId('jenis_pengadaan_id')->references('id')->on('jenis_pengadaans')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nama_lelang');
            $table->string('uraian_singkat_pekerjaan');
            $table->date('tanggal_mulai_lelang');
            $table->date('tanggal_akhir_lelang');
            $table->string('jenis_kontrak');
            $table->string('lokasi_pekerjaan');
            $table->bigInteger('hps');
            $table->string('syarat_kualifikasi');
            $table->enum('lampiran_pengadaan', ['penawaran', 'konsep', 'penawaran dan konsep']);
            $table->enum('status_pengadaan', ['lelang', 'penunjukan langsung']);
            $table->enum('status_pengadaan2', ['buka', 'tutup', 'selesai'])->default('buka');
            $table->enum('status_aktif', ['aktif', 'tidak aktif'])->default('aktif');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lelangs');
    }
};
