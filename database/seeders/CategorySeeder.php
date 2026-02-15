<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan updateOrCreate agar jika dijalankan ulang, 
        // data yang sudah ada hanya akan diperbarui deskripsinya saja.
        
        Category::updateOrCreate(
            ['nama_kategori' => 'Teknologi'],
            ['deskripsi' => 'Buku tentang perkembangan perangkat lunak dan keras']
        );

        Category::updateOrCreate(
            ['nama_kategori' => 'Sains'],
            ['deskripsi' => 'Kumpulan literatur ilmu alam dan fisika']
        );

        Category::updateOrCreate(
            ['nama_kategori' => 'Sastra'],
            ['deskripsi' => 'Karya tulis kreatif dan novel']
        );
    }
}