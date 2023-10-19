<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;
use App\Models\Book;

class Loan extends Model
{
    use HasFactory;

    const HAS_FILE = false;
    const HAS_FOREIGN_KEYS = false;

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
