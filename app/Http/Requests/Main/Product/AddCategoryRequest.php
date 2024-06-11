<?php

namespace App\Http\Requests\Main\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        return [
            'category' => [
                'required', 'exists:categories,id',
                Rule::unique('product_categories', 'category_id')
                    ->where(function ($query) use ($request) {
                        return $query->where('category_id', $request->category)
                            ->where('product_id', $request->product);
                    })
            ],
            'product' => ['required', 'exists:products,id']
        ];
    }
}