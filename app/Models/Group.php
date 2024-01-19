<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\FileValidator;
use App\Traits\ForeignKeys;

use App\Models\Book;

class Group extends Model
{
    use HasFactory, FileValidator, ForeignKeys;

    protected $guarded = [];

    /* IMAGENS */
    const HAS_FILE = true;
    public $file_field = 'image';

    /* CHAVES ESTRANGEIRAS */
    const HAS_FOREIGN_KEYS = true;
    public $foreign_keys = ['books'];

    public function books() {
        return $this->belongsToMany(Book::class, 'book_group');
    }
}
