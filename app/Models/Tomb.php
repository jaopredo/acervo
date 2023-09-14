<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;

class Tomb extends Model
{
    use HasFactory;

    const HAS_FILE = false;

    protected $guarded = [];

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
