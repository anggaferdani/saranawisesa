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
        Schema::create('lampiran_pengadaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lelang_id')->references('id')->on('lelangs')->onDelete('cascade');
            $table->string('nama_perusahaan')->nullable();
            $table->string('email_perusahaan')->nullable();
            $table->string('alamat_perusahaan')->nullable();
            $table->string('pengajuan_anggaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_pengadaans');
    }
};
