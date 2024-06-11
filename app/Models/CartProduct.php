<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'color_id', 'price', 'quantity'];

    public function Color()
    {
        return $this->belongsTo(Color::class);
    }
    public function getCostAttribute()
    {
        return $this->price == 0 ? $this->Color()->first()->newPrice : $this->price;
    }
    public function getAmountAttribute()
    {

        $amount = $this->cost * $this->quantity;
        return $amount;
    }
}
