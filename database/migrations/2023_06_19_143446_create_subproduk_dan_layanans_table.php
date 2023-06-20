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
        Schema::create('subproduk_dan_layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_dan_layanan_id')->references('id')->on('produk_dan_layanans')->onDelete('cascade');
            $table->string('judul');
            $table->longText('deskripsi');
            $table->string('thumbnail');
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
        Schema::dropIfExists('subproduk_dan_layanans');
    }
};
