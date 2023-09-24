<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required',
            'old_password' => 'required',
            'password_confirmation' => 'required|same:password',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Você não informou o atributo :attribute',
            'password_confirmation.same' => 'As senhas não coincidem',
            'password.min' => 'Senha muito pequena',
            'password.confirmed' => 'O campo de confirmação não coincide'
        ];
    }
}
