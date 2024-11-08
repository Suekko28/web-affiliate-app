<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
        $method = $this->method();

        $rules = [
            'nama' => ['required', 'max:255'],
            'link_shopee' => ['nullable', 'max:255'],
            'link_tokped' => ['nullable', 'max:255'],
            'link_tiktok' => ['nullable', 'max:255'],
        ];

        if ($method === 'POST') {
            $rules['image'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
        } else {
            // Jika ini adalah request untuk update, gambar bersifat opsional (nullable)
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama produk wajib diisi.',
            'nama.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',
            'link_shopee.max' => 'Link Shopee tidak boleh lebih dari 255 karakter.',
            'link_tokped.max' => 'Link Tokopedia tidak boleh lebih dari 255 karakter.',
            'link_tiktok.max' => 'Link TikTok tidak boleh lebih dari 255 karakter.',
            'image.required' => 'Gambar produk wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.', // Corrected rule
            'image.mimes' => 'Gambar harus berformat jpeg, png, atau jpg.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
        ];
    }

}
