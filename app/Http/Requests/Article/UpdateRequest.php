<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'photo' => ['nullable', 'string'],
//            'photo' => ['nullable', 'image'],
            'slug' => ['nullable', 'max:255', Rule::unique('articles')->ignore($this->route('article'))],
            'text' => ['required'],
            'published' => ['nullable'],

            'photos' => ['nullable', 'array'],
//            'photos.*' => ['nullable', 'image'],
            'photos.*' => ['nullable'],
        ];
    }
}
