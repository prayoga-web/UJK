<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi - Menambah kolom 'role' ke tabel users
     * Kolom role digunakan untuk membedakan antara admin dan user biasa
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Tambah kolom 'role' dengan nilai default 'user' setelah kolom 'password'
            $table->string('role')->default('user')->after('password');
        });
    }

    /**
     * Batalkan migrasi - Hapus kolom 'role' dari tabel users
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom 'role' jika migrasi dibatalkan
            $table->dropColumn('role');
        });
    }
};
