<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

use App\Traits\ForeignKeys;

class Category extends Model
{
    use HasFactory, ForeignKeys;

    /* IMAGENS */
    const HAS_FILE = false;

    /* CHAVES ESTRANGEIRAS */
    const HAS_FOREIGN_KEYS = true;
    public $foreign_keys = ['books'];

    protected $guarded = [];

    public function books() {
        return $this->belongsToMany(Book::class, 'book_category');
    }
}
