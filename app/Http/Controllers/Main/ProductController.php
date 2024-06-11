<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $products = Product::whereHas('mainColor')->when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%');
        })->paginate(12);
        return view('main.Product.index', compact(['products', 'search']));
    }

    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $sizes = $product->sizes()->whereHas('colors')->get();
        $mainColor = $product->mainColor;
        if ($request->has('color')) {
            $mainColor = Color::find($request->color);
        }
        if (!$mainColor) {
            abort(404);
        }
        return view('main.Product.show', compact(['product', 'sizes', 'mainColor']));
    }


    public function showCategory($id)
    {
        $category = Category::find($id);
        $products = $category->products()->paginate(12);
        return view('main.Product.CategoryProduct', compact(['category', 'products']));
    }
}