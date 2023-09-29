<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Group;
use App\Models\Category;
use App\Models\Tomb;

use App\Traits\FileValidator;
use App\Traits\ForeignKeys;

class Book extends Model
{
    use HasFactory, FileValidator, ForeignKeys;

    protected $guarded = [];

    /* IMAGENS */
    const HAS_FILE = true;
    public $file_field = 'image';

    /* CHAVES ESTRANGEIRAS */
    const HAS_FOREIGN_KEYS = true;
    public $foreign_keys = ['categories', 'groups'];

    /* RELAÇÕES */
    public function groups() {
        return $this->belongsToMany(Group::class, 'book_group');
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function tombs() {
        return $this->hasMany(Tomb::class);
    }
}
