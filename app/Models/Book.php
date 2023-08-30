<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Group;
use App\Models\Category;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function group() {
        $this->belongsTo(Group::class);
    }

    public function category() {
        $this->belongsToMany(Category::class);
    }
}
