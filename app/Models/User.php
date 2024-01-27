<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use function PHPUnit\Framework\returnSelf;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'picture_url'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected $attributes = [
        'gender_pretty'
    ];

    public function getGenderPrettyAttribute() {
        switch ($this->gender) {
            case 'M':
                return 'Laki-laki';

            case 'F':
                return 'Perempuan';

            default:
                return null;
        }
    }
    public function getPictureUrlAttribute($value) {
        return '/uploads/' . $value;
    }
}
