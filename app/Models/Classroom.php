<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\ForeignKeys;

use App\Models\Student;

class Classroom extends Model
{
    use HasFactory, ForeignKeys;

    protected $guarded = [];

    const HAS_FILE = false;
    const HAS_FOREIGN_KEYS = false;

    public function students() {
        return $this->hasMany(Student::class);
    }
}
