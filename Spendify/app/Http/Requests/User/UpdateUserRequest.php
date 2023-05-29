<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
			'name' => ['required', 'string'],
			'last_name' => ['required', 'string'],
			'document_id' => ['required', 'numeric', "unique:users,number_id,{$this->user->id}"],
			'email' => ['required', 'email', "unique:users,email,{$this->user->id}"],
			'password' => ['nullable', 'string', 'min:8', 'confirmed'],
			'address' => ['required', 'string'],
        ];
    }
	public function messages()
	{
		return[
			'document_id.required' => 'Debes ingresar el nombre',
			'document_id.numeric' => 'Este nombre no es valido',
			'document_id.unique' => 'Este documento ya existe',

			'name.required' => 'Debes ingresar el nombre',
			'name.string' => 'Este nombre no es valido',

			'last_name.required' => 'Debes ingresar el apellido',
			'last_name.string' => 'Este apellido no es valido',


			'email.required' => 'Debes ingresar el correo',
			'email.email' => 'El correo no es valido',
			'email.unique' => 'Este correo ya existe',


			'password.string' => 'La contraseña no es valida',
			'password.min' => 'La contraseña es muy corta (min 10)',
			'password.confirmed' => 'Las contraseñas no coinciden',

			'address.required' => 'Debes ingresar la direccion',
			'address.string' => 'La contraseña no es valida',
		];
	}
}
