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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_panjang');
            $table->string('email')->unique();
            $table->enum('check_email', ['yes', 'no'])->default('no');
            $table->enum('email_has_been_verified', ['terverifikasi', 'belum_terverifikasi'])->default('belum_terverifikasi');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->enum('level', ['superadmin', 'admin', 'creator', 'helpdesk', 'perusahaan']);
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
        Schema::dropIfExists('users');
    }
};
