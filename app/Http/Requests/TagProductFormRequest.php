<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagProductFormRequest extends FormRequest
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
            'tag_product' => ['required', 'unique:tag_product,tag_product'],
        ];
    }

    public function messages()
    {
        return [
            'tag_product.required' => 'Tag product wajib diisi',
            'tag_product.unique' => 'Tag product sudah tedaftar'
        ];
    }
}
