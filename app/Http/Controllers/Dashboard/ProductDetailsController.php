<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Product\AddCategoryRequest;
use App\Http\Requests\Main\Product\AddColorRequest;
use App\Http\Requests\Main\Product\AddDiscountRequest;
use App\Http\Requests\Main\Product\AddImageRequest;
use App\Http\Requests\Main\Product\AddOptionRequest;
use App\Http\Requests\Main\Product\AddSizeRequest;
use App\Http\Requests\Main\Product\MainColorRequest;
use App\Http\Traits\ImageTrait;
use App\Models\Color;
use App\Models\ColorImage;
use App\Models\Discount;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    use ImageTrait;
    public function addCategory(AddCategoryRequest $request)
    {
        ProductCategory::create([
            'product_id' => $request->product,
            'category_id' => $request->category,
        ]);
        return back();
    }


    public function addOption(AddOptionRequest $request, $id)
    {


        $option = Option::create([
            'product_id' => $id,
            'name' => $request->name,
            'value' => $request->value
        ]);
        return back();
    }


    public function addSize(AddSizeRequest $request, $id)
    {
        Size::create([
            'product_id' => $id,
            'size' => $request->size
        ]);
        return back();
    }

    public function AddColor(AddColorRequest $request)
    {
        $main = $request->main ?? 0;
        $product = Size::find($request->size)->product;
        if ($main == 1) {
            foreach ($product->colors as $color) {
                $color->main = 0;
                $color->save();
            }
        }
        $color = Color::create([
            'size_id' => $request->size,
            'Color' => $request->color,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'main' => $main
        ]);
        return back();
    }

    public function makeMainColor(MainColorRequest $request)
    {
        $product = Product::with('categories')->find($request->product);
        $mainColor = Color::find($request->color);
        foreach ($product->colors as $color) {
            $color->main = false;
            $color->save();
        }
        $mainColor->main = true;
        $mainColor->save();
        return back();
    }

    public function addImages(AddImageRequest $request)
    {

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $color = Color::find($request->color);
            foreach ($images as $key => $img) {
                $pic = $this->singleImageUpload($img, 'product', $color->Color . '_' . $key);

                ColorImage::create([
                    'color_id' => $request->color,
                    'image_id' => $pic->id
                ]);
            }
        }
        return back();
    }
    public function addDiscount(AddDiscountRequest $request)

    {
        Discount::create([
            'color_id' => $request->color,
            'amount' => $request->amount,
            'type' => $request->type,
            'starts_at' => $request->starts_at,
            'ends_at' => $request->ends_at
        ]);
        return back();
    }
}
