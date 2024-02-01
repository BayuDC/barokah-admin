<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Transaction extends Model {
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $fillable = [
        'status',
        'payment',
        'final_price'
    ];

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'transaction_products')->withPivot('quantity');
    }
}
