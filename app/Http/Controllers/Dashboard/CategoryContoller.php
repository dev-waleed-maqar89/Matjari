<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryContoller extends Controller
{
    public function create()
    {
        $categories = Category::get();
        return view('dashboard.Category.create', compact(['categories']));
    }
    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name
        ]);
        return back();
    }
    public function index()
    {
        $categories = Category::paginate(6);
        return view('dashboard.Category.index', compact(['categories']));
    }
    public function show($id)
    {
        $category = Category::find($id);
        $products = $category->products()->paginate(12);
        return view('dashboard.Category.show', compact(['category', 'products']));
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $categories = Category::get();

        return view('dashboard.Category.edit', compact(['category', 'categories']));
    }
    public function update(CreateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name
        ]);
        return redirect(route('dashboard.category.index'));
    }
}
