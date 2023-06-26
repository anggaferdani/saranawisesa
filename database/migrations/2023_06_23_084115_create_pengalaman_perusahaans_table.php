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
        Schema::create('pengalaman_perusahaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_paket_pekerjaan')->nullable();
            $table->string('kelompok')->nullable();
            $table->string('ringkas_lingkup_paket_pekerjaan')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('nama_pemberi_pekerjaan')->nullable();
            $table->string('alamat_pemberi_pekerjaan')->nullable();
            $table->date('tanggal_kontrak')->nullable();
            $table->string('nilai_kontrak')->nullable();
            $table->string('status_penyedia_pekerjaan')->nullable();
            $table->date('tanggal_selesai_berdasarkan_kontrak')->nullable();
            $table->date('tanggal_selesai_berdasarkan_ba_serah_terima')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman_perusahaans');
    }
};
