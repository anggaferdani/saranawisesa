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
        Schema::create('surat_izin_operasionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_dokumen');
            $table->string('nama_sio');
            $table->string('no_sio');
            $table->date('tanggal_terbit');
            $table->string('tanggal_jatuh_tempo');
            $table->string('penerbit_sio');
            $table->string('sio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_izin_operasionals');
    }
};
