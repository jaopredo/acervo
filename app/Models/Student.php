<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classroom;

class Student extends Model
{
    use HasFactory;

    const HAS_FILE = false;
    const HAS_FOREIGN_KEYS = false;

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }
}
