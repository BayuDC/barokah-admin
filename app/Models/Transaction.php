<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Transaction extends Model {
    use HasFactory, HasEagerLimit;

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
    public function productsCount() {
    }

    public function customer(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
