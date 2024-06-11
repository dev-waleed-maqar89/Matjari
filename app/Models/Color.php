<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = ['size_id', 'Color', 'price', 'quantity', 'main'];

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function product()
    {
        return $this->size()->first()->product();
    }
    public function pics()
    {
        return $this->hasMany(ColorImage::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function lastDiscount()
    {
        return $this->discounts()->whereDate('ends_at', '>', Carbon::now())->orderBy('id', 'desc')->first();
    }
    public function getNewPriceAttribute()
    {
        $difference = 0;
        $price = $this->price;
        if ($this->lastDiscount()) {
            $disscount = $this->lastDiscount()->amount;
            if ($this->lastDiscount()->type === 'percent') {
                $difference = ($disscount / 100) * $price;
            } else {
                $difference = $disscount;
            }
        }
        $price -= $difference;
        return $price;
    }
}