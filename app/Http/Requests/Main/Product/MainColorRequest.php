<?php

namespace App\Http\Requests\Main\Product;

use Illuminate\Foundation\Http\FormRequest;

class MainColorRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'color' => ['required', 'exists:colors,id'],
            'product' => ['required', 'exists:products,id']
        ];
    }
}
