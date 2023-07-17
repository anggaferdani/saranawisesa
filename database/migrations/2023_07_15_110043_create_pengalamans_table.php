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
        Schema::create('pengalamans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_pekerjaan');
            $table->string('pemberi_pekerjaan');
            $table->string('ringkas_lingkup_pekerjaan');
            $table->string('lokasi');
            $table->date('tanggal_kontrak');
            $table->string('nilai_kontrak')->nullable();
            $table->string('kontrak');
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
        Schema::dropIfExists('pengalamans');
    }
};
