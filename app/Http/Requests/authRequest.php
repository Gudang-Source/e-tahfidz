<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class authRequest extends FormRequest
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
            "nama" => ['required','unique:r_pendings,nama', 'unique:users,nama'],
            "email" => ['required', 'unique:r_pendings,email', 'unique:users,email'],
            "password" => ['required','confirmed'],
            "password_confirmation" => ['required']
        ];
    }
}
