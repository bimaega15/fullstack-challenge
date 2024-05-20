<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SatuanBarangRequest extends FormRequest
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
            'kode_sbarang' => 'required|unique:satuan_barang,kode_sbarang,' . $this->route('satuanBarang'),
            'status_sbarang' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'kode_sbarang.required' => 'Kode Satuan Barang wajib diisi.',
            'kode_sbarang.unique' => 'Kode Satuan Barang sudah ada di database. Harap pilih kode yang lain.',
            'status_sbarang.required' => 'Status Satuan Barang wajib diisi.',
            'status_sbarang.string' => 'Status Satuan Barang harus berupa teks.',
            'status_sbarang.max' => 'Status Satuan Barang tidak boleh lebih dari 255 karakter.',
        ];
    }
}
