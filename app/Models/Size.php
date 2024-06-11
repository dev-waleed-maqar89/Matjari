<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'size'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function colors()
    {
        return $this->hasMany(Color::class);
    }
}