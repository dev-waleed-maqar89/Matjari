<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasManyThrough(Product::class, ProductCategory::class, 'category_id', 'id', 'id', 'product_id');
    }
    public function hasProduct($id)
    {
        $relation  = ProductCategory::where('product_id', $id)->where('category_id', $this->id)->first();
        if ($relation) {
            return true;
        }
    }
}
