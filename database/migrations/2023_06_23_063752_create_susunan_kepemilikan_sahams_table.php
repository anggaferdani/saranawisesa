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
        Schema::create('susunan_kepemilikan_sahams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_pemilik_saham')->nullable();
            $table->string('no_ktp_paspor_keterangan_domisili_tinggal_pemilik_saham')->nullable();
            $table->string('alamat_pemilik_saham')->nullable();
            $table->string('persentase_kepemilikan_saham')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('susunan_kepemilikan_sahams');
    }
};
