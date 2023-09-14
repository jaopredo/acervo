<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Group;
use App\Models\Category;
use App\Models\Tomb;

use App\Traits\FileValidator;

class Book extends Model
{
    use HasFactory, FileValidator;

    protected $guarded = [];

    const HAS_FILE = true;
    public $file_field = 'image';

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    public function tombs() {
        return $this->hasMany(Tomb::class);
    }
}
