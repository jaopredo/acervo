<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use App\Traits\FileValidator;

class Student extends Authenticatable implements JWTSubject
{
    use HasFactory, HasApiTokens, FileValidator, Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'registration',
        'image',

        'classroom_id'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    const HAS_FOREIGN_KEYS = false;
    const HAS_FILE = true;
    public $file_field = "image";


    public function classroom() {
        return $this->belongsTo(Classroom::class);
    }

    public function loans() {
        return $this->hasMany(Loan::class);
    }

    public function exclude_show() {
        return ['id', 'created_at', 'updated_at', 'password', 'classroom_id', 'image'];
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

    public function reads() {
        return $this->hasMany(Read::class);
    }

    public function wishes() {
        return $this->hasMany(Wish::class);
    }

    public function reserves() {
        return $this->hasMany(Reserve::class);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
