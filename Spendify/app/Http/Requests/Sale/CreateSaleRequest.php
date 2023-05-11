<?php

namespace App\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;

class CreateSaleRequest extends FormRequest
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
            'buyer_id' => ['required', 'numeric'],
            'seller_id' => ['required', 'numeric'],
			'product_id' => ['required', 'numeric'],
			'date_sale' => ['nullable','required', 'date'],

        ];

    }
	public function messages()
	{
		return[
			'buyer_id.required' => 'Debes ingresar numero de comprador',
			'buyer_id.numeric' => 'Este nombre no es valido',

			'seller_id.required' => 'Debes ingresar numero de comprador',
			'seller_id.numeric' => 'Este nombre no es valido',

			'product_id.required' => 'Debes ingresar numero de comprador',
			'product_id.numeric' => 'Este nombre no es valido',


			'date_sale.required' => 'Debes ingresar la fecha',
			'date_sale.date' => 'La fecha no es valida',


		];
	}
}
