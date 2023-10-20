<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Classroom;
use App\Models\Loan;

use App\Traits\FileValidator;

class Student extends Model
{
    use HasFactory, FileValidator;

    protected $guarded = [];

    const HAS_FILE = true;
    public $file_field = "image";

    const HAS_FOREIGN_KEYS = false;

    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }

    public function exclude_show() {
        return ['id', 'created_at', 'updated_at', 'password', 'classroom_id', 'image'];
    }
}
