<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title_ka' => 'required|string|min:3|max:200',
            'title_en' => 'required|string|min:3|max:200',
            'title_ru' => 'required|string|min:3|max:200',
            'description_ka' => 'required|string|min:10',
            'description_en' => 'required|string|min:10',
            'description_ru' => 'required|string|min:10',
            'image' => 'required|url',
            'section_id' => 'nullable',
            'visibility' => 'nullable',
            'date' => 'required|string'
        ];
    }
}
