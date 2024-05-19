<?php

namespace App\Http\Requests;

use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class updatePasswordRequest extends FormRequest
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
            //
            'password' => ['required', new CurrentPassword],
            'password_new' => ['required', 'string', 'min:8', 'confirmed'],
            'password_new_confirmation' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Password lama harus diisi.',
            'password_new.required' => 'Password baru harus diisi.',
            'password_new.min' => 'Password baru harus terdiri dari minimal 8 karakter.',
            'password_new.confirmed' => 'Konfirmasi password baru tidak cocok.',
            'password_new_confirmation.required' => 'Konfirmasi password baru harus diisi.',
            'password_new_confirmation.min' => 'Konfirmasi password baru harus terdiri dari minimal 8 karakter.',
        ];
    }
}
