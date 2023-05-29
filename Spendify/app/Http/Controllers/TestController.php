<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
	public function showTestView()
	{

		$products = Product::get();
		return view('carpeta_test.test', compact('products'));
	}

	public function getProducts()
	{
		$products = ['peras', 'manzanas']; //consulta de todos los productos
		return response()->json($products, 200);
	}
}
