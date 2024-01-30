<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

use function PHPUnit\Framework\returnSelf;

class User extends Authenticatable implements JWTSubject {
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'role',
        'picture_url'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
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
        if (!$value) {
            return '/default/user.jpg';
        } else if (str_starts_with($value, 'http')) {
            return $value;
        }

        return '/uploads/' . $value;
    }

    public function getRolePrettyAttribute() {
        switch ($this->role) {
            case 'admin':
                return 'Admin';
            case 'worker':
                return 'Karyawan';
            case 'user':
                return 'Pembeli';

            default:
                return null;
        }
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
}
