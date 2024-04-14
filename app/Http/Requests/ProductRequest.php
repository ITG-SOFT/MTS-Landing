<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'title' => ['required', 'max:255'],
            'slug' => ['nullable', 'max:255', Rule::unique('products')->ignore($this->route('product'))],
            'photo' => [($this->method() == 'POST') ? 'required' : 'nullable', 'string'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'price' => ['required', 'decimal:0,2'],
            'sale_price' => ['nullable', 'decimal:0,2'],
            'text' => ['required'],

            'attributes' => ['nullable', 'array'],
            'attributes.*' => ['nullable', 'max:255'],

            'photos' => ['nullable', 'array'],
            'photos.*' => ['nullable'],
        ];
    }
}
