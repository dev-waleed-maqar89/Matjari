<?php

namespace App\Http\Requests\Main\Product;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AddDiscountRequest extends FormRequest
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
            'type' => ['required', 'in:value,percent'],
            'amount' => ['required', 'numeric', 'min:0'],
            'starts_at' => ['required', 'date', 'after-or-equal:' . Carbon::now()],
            'ends_at' => ['required', 'date', 'after:starts_at']
        ];
    }
}