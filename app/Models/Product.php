<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Product extends Model {
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'name', 'price', 'unit', 'picture_url', 'category_id'
    ];
    public function getPictureUrlAttribute($value) {
        if (!$value) {
            return '/default/product.png';
        }

        return '/uploads/' . $value;
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
