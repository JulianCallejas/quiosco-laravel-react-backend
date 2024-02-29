<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    
    //Permite o no realizar el request, true permite
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
        //Aqui se definen las reglas de validacion del request
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', PasswordRules::min(8)->letters()->symbols()->numbers()],


        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre debe ser texto',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Email inválido',
            'email.unique' => 'Este usuario ya está registrado',
            'password.required' => 'El password es obligatorio',
            'password.confirmed' => 'El password no coincide',
            
        ];
    }
}
