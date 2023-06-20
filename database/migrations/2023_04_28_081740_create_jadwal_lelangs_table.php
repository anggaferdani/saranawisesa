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
        Schema::create('jadwal_lelangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lelang_id')->references('id')->on('lelangs')->onDelete('cascade');
            $table->string('nama_kegiatan_lelang');
            $table->date('tanggal_mulai_kegiatan_lelang');
            $table->date('tanggal_akhir_kegiatan_lelang');
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
        Schema::dropIfExists('jadwal_lelangs');
    }
};
