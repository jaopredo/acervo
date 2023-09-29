<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\FileValidator;

use App\Models\Book;

class Group extends Model
{
    use HasFactory, FileValidator;

    protected $guarded = [];

    /* IMAGENS */
    const HAS_FILE = true;
    public $file_field = 'image';

    /* CHAVES ESTRANGEIRAS */
    const HAS_FOREIGN_KEYS = false;
    public $foreign_keys = [];

    public function books() {
        return $this->belongsToMany(Book::class, 'book_group');
    }
}
