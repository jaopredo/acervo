<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

class Group extends Model
{
    use HasFactory;

    public function books() {
        $this->hasMany(Book::class);
    }
}
