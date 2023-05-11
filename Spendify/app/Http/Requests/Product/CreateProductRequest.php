<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
				'category_id' => ['required', 'numeric', 'unique:categories,id'],
				'seller_id' => ['required', 'numeric'],
				'name' => ['required', 'string'],
				'price' => ['required', 'numeric'],
				'stock' => ['required', 'numeric',],
				'status' => ['nullable', 'string', ],
				'description' => ['required', 'string'],
            //
        ];
    }
	public function messages()
	{
		return[
			'category_id.required' => 'Debes ingresar la cateog',
			'category_id.numeric' => 'numero de la categoria no valido',
			'category_id.unique' => 'Esta categoria ya existe',

			'seller_id.required' => 'Debes ingresar el vendedor',
			'seller_id.numeric' => 'numero de vendedor, no valido',

			'name.required' => 'Debes ingresar el nombre del producto',
			'name.string' => 'Nombre del producto no valido',

			'price.required' => 'Debes ingresar el precio',
			'price.numeric' => 'precio del vendedor no valido',

			'stock.required' => 'Debes ingresar el stock del producto',
			'stock.numeric' => 'stock no valido(numerico)',

			'status.required' => 'Debes ingresar la disponibilidad del producto',
			'status.string' => 'Estado no valido',

			'description.required' => 'Debes ingresar una descripcion del producto',
			'description.string' => 'Descripcion no valida',
		];
	}
}
