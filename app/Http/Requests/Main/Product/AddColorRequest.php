<?php

namespace App\Http\Requests\Main\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AddColorRequest extends FormRequest
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
            'color' => ['required', 'string', Rule::unique('colors')->where(function ($query) use ($request) {
                return $query->where('color', $request->color)->where('size_id', $request->size);
            })],
            'quantity' => ['required', 'integer', 'min:0'],
            'size' => ['required', 'exists:sizes,id'],
            'price' => ['required', 'numeric', 'min:0'],
        ];
    }
}