<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'kategori_barang_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_barang.required' => 'Nama Kategori Barang wajib diisi.',
            'merk_barang.required' => 'Merk Barang wajib diisi.',
            'kategori_barang_id.required' => 'Kategori Barang wajib diisi.',
        ];
    }
}
