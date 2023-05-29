<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
    public function rules()
    {
        return [
			'document_id' => ['required', 'numeric', 'unique:users,document_id'],
			'name' => ['required', 'string'],
			'last_name' => ['required', 'string'],
			'email' => ['required', 'email', 'unique:users,email'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
			'address' => ['required', 'string'],
			'role' => ['required'],

        ];
    }
	public function messages()
	{
		return[
			'name.required' => 'El nombre es requerido.',
			'name.string' => 'El nombre no es valido.',

			'last_name.required' => 'El apellido es requerido.',
			'last_name.string' => 'El apellido no es valido.',

			'document_id.required' => 'El documento es requerido.',
			'documento_id.string' => 'El documento no es un numero.',
			'document_id.unique' => 'El documento ya fue tomado.',

			'email.required' => 'El correo es requerido.',
			'email.email' => 'El correo debe de ser valido.',
			'email.unique' => 'El correo ya fue tomado.',

			'password.required' => 'La contraseña es requerida.',
			'password.string' => 'La contraseña debe de ser valida.',
			'password.min' => 'La contraseña es muy corta (min 8).',
			'password.confirmed' => 'La contraseña no coincide.',

			'address.required' => 'Debes ingresar la direccion',
			'address.string' => 'La contraseña no es valida',
		];
	}
}
