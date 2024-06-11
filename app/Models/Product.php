<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function categories()
    {
        return $this->hasMany(ProductCategory::class);
    }
    public function hasCategory($id)
    {
        $cat = $this->categories()->where('category_id', $id)->first();
        if ($cat) {
            return true;
        }
        return false;
    }
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
    public function colors()
    {
        return $this->hasManyThrough(Color::class, Size::class);
    }

    public function mainColor()
    {
        return $this->hasOneThrough(Color::class, Size::class)->where('main', true);
        // return $this->colors()->where('main', true)->first();
    }

    public function getQuantityAttribute()
    {
        return $this->colors->sum('quantity');
    }
}