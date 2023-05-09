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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lelang_id')->nullable();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('lampiran0001');
            $table->string('lampiran0002');
            $table->string('lampiran0003');
            $table->string('lampiran0004');
            $table->string('lampiran0005');
            $table->string('lampiran0006');
            $table->string('lampiran0007');
            $table->string('lampiran0008')->nullable();
            $table->enum('status_aktif', ['aktif', 'tidak_aktif'])->default('aktif');
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
        Schema::dropIfExists('perusahaans');
    }
};
