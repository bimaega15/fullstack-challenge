<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountRequest extends FormRequest
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
            'nama_profile' => 'required|string|max:255',
            'email_profile' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user()->id),
            ],
            'tanggallahir_profile' => 'required|date',
            'notelpon_profile' => 'required|numeric',
            'alamat_profile' => 'required|string|max:500',
            'pekerjaan_profile' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_profile.required' => 'Nama profil wajib diisi.',
            'nama_profile.string' => 'Nama profil harus berupa teks.',
            'nama_profile.max' => 'Nama profil tidak boleh lebih dari 255 karakter.',

            'email_profile.required' => 'Email profil wajib diisi.',
            'email_profile.email' => 'Email profil harus berupa email yang valid.',
            'email_profile.max' => 'Email profil tidak boleh lebih dari 255 karakter.',
            'email_profile.unique' => 'Email profil sudah digunakan.',

            'tanggallahir_profile.required' => 'Tanggal lahir profil wajib diisi.',
            'tanggallahir_profile.date' => 'Tanggal lahir profil harus berupa tanggal yang valid.',

            'notelpon_profile.required' => 'Nomor telepon profil wajib diisi.',
            'notelpon_profile.numeric' => 'Nomor telepon profil harus berupa angka.',

            'alamat_profile.required' => 'Alamat profil wajib diisi.',
            'alamat_profile.string' => 'Alamat profil harus berupa teks.',
            'alamat_profile.max' => 'Alamat profil tidak boleh lebih dari 500 karakter.',

            'pekerjaan_profile.required' => 'Pekerjaan profil wajib diisi.',
            'pekerjaan_profile.string' => 'Pekerjaan profil harus berupa teks.',
            'pekerjaan_profile.max' => 'Pekerjaan profil tidak boleh lebih dari 255 karakter.',
        ];
    }
}
