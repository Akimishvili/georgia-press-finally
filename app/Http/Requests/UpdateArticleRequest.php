<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title_ka' => 'required|string',
            'title_en' => 'required|string',
            'title_ru' => 'required|string',
            'description_ka' => 'required|string',
            'description_en' => 'required|string',
            'description_ru' => 'required|string',
            'image' => 'required|url',
            'section_id' => 'nullable',
            'visibility' => 'nullable',
            'date' => 'nullable|string'
        ];
    }
}
