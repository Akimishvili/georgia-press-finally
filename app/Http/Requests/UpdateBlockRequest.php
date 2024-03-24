<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlockRequest extends FormRequest
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
            'title_ka' => 'nullable|string|min:3|max:200',
            'title_en' => 'nullable|string|min:3|max:200',
            'title_ru' => 'nullable|string|min:3|max:200',
            'sub_title_ka' => 'nullable|string|min:3|max:200',
            'sub_title_en' => 'nullable|string|min:3|max:200',
            'sub_title_ru' => 'nullable|string|min:3|max:200',
            'description_ka' => 'nullable|string|min:10',
            'description_en' => 'nullable|string|min:10',
            'description_ru' => 'nullable|string|min:10',
            'image' => 'sometimes|mimes:jpg,webp,png',
            'video' => 'nullable|url:http,https',
            'article_id' => 'required'
        ];
    }
}
