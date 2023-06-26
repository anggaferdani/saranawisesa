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
        Schema::create('pekerjaan_yang_sedang_dilaksanakans', function (Blueprint $table) {
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
            $table->string('progres_terakhir_berdasarkan_kontrak')->nullable();
            $table->string('progres_terakhir_berdasarkan_prestasi_kerja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_yang_sedang_dilaksanakans');
    }
};
