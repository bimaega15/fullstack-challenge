<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompleteProfileRequest extends FormRequest
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
            'tanggallahir_profile' => 'required',
            'notelpon_profile' => 'required',
            'pekerjaan_profile' => 'required',
            'foto_profile' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'tanggallahir_profile.required' => 'Tanggal lahir wajib diisi.',
            'notelpon_profile.required' => 'Nomor telepon wajib diisi.',
            'pekerjaan_profile.required' => 'Pekerjaan wajib diisi.',
            'foto_profile.image' => 'File yang diunggah harus berupa gambar.',
            'foto_profile.mimes' => 'File gambar harus memiliki format: jpeg, png, jpg, gif, atau svg.',
            'foto_profile.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ];
    }
}
