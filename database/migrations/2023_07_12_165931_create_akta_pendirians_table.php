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
        Schema::create('akta_pendirians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('kode_dokumen');
            $table->string('no_akta');
            $table->date('tanggal_akta');
            $table->string('nama_notaris');
            $table->string('no_sk');
            $table->date('tanggal_sk');
            $table->string('akta');
            $table->string('sk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akta_pendirians');
    }
};
