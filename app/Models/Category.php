<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    // kode memilah kolom yang dapat diisi datanya
    protected $fillable = ['nama_kategori'];

    // Satu category punya banyak buku
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
