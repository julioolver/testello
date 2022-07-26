<?php

namespace App\Http\Requests\Auth;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Error message
     *
     * @return string
     */
    public function errorMessage(): string
    {
        return "Não foi possível registrar o usuário.";
    }

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
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'email' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'user.required' => 'O campo Usuário (user) é obrigatório',
            'password.required' => 'O campo Senha (password) é obrigatório',
            'password_confirmation.required' => 'O campo Confirmação de Senha (password_confirmation) é obrigatório',
            'name.required' => 'O campo Nome (name) é obrigatório',
            'email.required' => 'O campo E-mail (email) é obrigatório',
            'document_number.required' => 'O campo Número do documento (document_number) é obrigatório',
        ];
    }
}
