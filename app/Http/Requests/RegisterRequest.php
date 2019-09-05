<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:7'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Kolom Nama Harus Diisi !',
            'email.required' => 'Kolom Email Harus Diisi !',
            'email.unique' => 'Email ini telah terdaftar, harap gunakan Email lain !',
            'username.required' => 'Kolom Username Harus Diisi !',
            'username.unique' => 'Username ini telah terdaftar, harap gunakan Username lain !',
            'password.required' => 'Kolom Password Harus Diisi !',
            'password.min' => 'Minimal 7 Karakter',
        ];
    }
}
