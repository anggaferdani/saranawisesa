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
            $table->unsignedBigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_lelang');
            $table->string('urian_singkat_pekerjaan');
            $table->date('tanggal_mulai_lelang');
            $table->date('tanggal_akhir_lelang');
            $table->string('jenis_kontrak');
            $table->string('lokasi_pekerjaan');
            $table->bigInteger('hps');
            $table->string('syarat_kualifikasi');
            $table->enum('status_pengadaan', ['lelang', 'penunjukan_langsung']);
            $table->enum('status_aktif', ['aktif', 'tidak_aktif'])->default('aktif');
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
