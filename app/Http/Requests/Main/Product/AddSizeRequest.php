<?php

namespace App\Http\Requests\Main\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddSizeRequest extends FormRequest
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
            'size' => ['required', 'string', 'min:1', 'max:30', Rule::unique('sizes')->where(function ($query) use ($request) {
                return $query->where('size', $request->size)->where('product_id', $request->product);
            })],
        ];
    }

    public function messages()
    {
        return [
            'size.required' => 'You need to add a name for the size',
        ];
    }
}