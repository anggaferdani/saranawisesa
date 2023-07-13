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
            $table->string('no_dokumen');
            $table->string('no_akta')->nullable();
            $table->date('tanggal_akta')->nullable();
            $table->string('nama_notaris')->nullable();
            $table->string('no_sk')->nullable();
            $table->date('tanggal_sk')->nullable();
            $table->string('akta')->nullable();
            $table->string('sk')->nullable();
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
