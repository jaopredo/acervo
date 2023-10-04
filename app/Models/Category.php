<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

class Category extends Model
{
    use HasFactory;

    /* IMAGENS */
    const HAS_FILE = false;

    /* CHAVES ESTRANGEIRAS */
    const HAS_FOREIGN_KEYS = false;

    protected $guarded = [];

    public function books() {
        return $this->belongsToMany(Book::class, 'book_category');
    }
}
