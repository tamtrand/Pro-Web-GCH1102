<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'image', 'price', 'quantity','size', 'product_id'
    ];

    public function products2()
    {
        return $this->hasMany(Product::class);
    }
}