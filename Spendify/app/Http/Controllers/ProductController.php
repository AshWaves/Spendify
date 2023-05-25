<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

	
    //
	public function getAllProducts()
	{
		$product =Product::get();
		return response()->json(['product' => $product], 200);
	}

	public function createProduct(CreateProductRequest $request)
	{
		$product = new Product($request->all());
		$product->save();
		return response()->json(['product' =>$product ], 201);
	}
	public function updateProduct(Product $product, UpdateProductRequest $request)
	{
		$product->update($request->all());
		return response()->json(['product' =>$product->refresh() ], 201);
	}
	public function deleteProduct(Product $product)
	{
		$product->delete();
		return response()->json([], 204);
	}
}
