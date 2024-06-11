<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(12);
        return view('dashboard.Product.index', compact(['products']));
    }
    public function create()
    {
        return view('dashboard.Product.create');
    }
    public function store(CreateProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'options' => json_encode($request->options),
        ]);
        return redirect(route('dashboard.product.show', $product->id));
    }
    public function show($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        return view('dashboard.Product.show', compact(['product']));
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('dashboard.Product.edit', compact(['product']));
    }
    public function update(CreateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect(route('dashboard.product.show', $product->id));
    }
}