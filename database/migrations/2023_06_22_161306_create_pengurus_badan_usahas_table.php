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
        Schema::create('pengurus_badan_usahas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama_pengurus_badan_usaha')->nullable();
            $table->string('no_ktp_paspor_keterangan_domisili_tinggal')->nullable();
            $table->enum('jabatan', ['komisaris', 'direksi'])->nullable();
            $table->string('jabatan_pengurus_badan_usaha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_badan_usahas');
    }
};
