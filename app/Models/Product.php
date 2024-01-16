<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'name', 'price', 'unit', 'picture_url', 'category_id'
    ];
    public function getPictureUrlAttribute($value) {
        return '/uploads/' . $value;
    }
}
