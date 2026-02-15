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
        Schema::table('categories', function (Blueprint $table) {
            // Menambahkan kolom deskripsi sesuai tugas evaluasi [cite: 115, 116]
            $table->text('deskripsi')->nullable()->after('nama_kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            // Menghapus kolom jika migration di-rollback
            $table->dropColumn('deskripsi');
        });
    }
};