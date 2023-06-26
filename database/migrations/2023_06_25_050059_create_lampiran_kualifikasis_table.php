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
        Schema::create('lampiran_kualifikasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('bukti_kepemilikan_tempat_usaha')->nullable();
            $table->string('surat_izin_usaha')->nullable();
            $table->string('surat_izin_lainnya')->nullable();
            $table->string('bukti_laporan_pajak_tahun_terakhir')->nullable();
            $table->string('bukti_status_kepemilikan_fasilitas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_kualifikasis');
    }
};
