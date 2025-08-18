<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email'=>['required', 'email'],
            'password' => ['required'],

        ];
    }

    public function messages(){

        return [
        'email.required' => 'Votre Mail est requis',
        'email.email' => 'Votre email n\'est pas au bon format',
        'password.required' => 'Votre mot de passe est requis',
    ];
    }
}
