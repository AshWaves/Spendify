<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sale\UpdateSaleRequest;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{

	public function getAllSales()
	{
		$sales =Sale::get();
		return response()->json(['sales' => $sales], 200);
	}
    public function createSale( Request $request)
	{
		$sale = new Sale($request->all());
		$sale->save();
		return response()->json(['sale' => $sale],201);
	}

	public function updateSale(User $sale, UpdateSaleRequest $request)
	{
		$sale->update($request->all());
		return response()->json(['sale' =>$sale->refresh() ], 201);
	}
	public function deleteSale(Sale $sale)
	{
		$sale->delete();
		return response()->json([], 204);
}
}
