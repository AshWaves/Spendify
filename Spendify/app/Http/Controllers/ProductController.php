<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
	// public function showProducts()
	// {
	// 	return view('products.index');
	// }

	// public function showHomeWithProducts()
	// {
	// 	$products = $this->getAllProducts()->original['products'];
	// 	return view('index', compact('products'));
	// }
    // //
	// public function getAllProducts()
	// {
	// 	$product =Product::get();
	// 	return response()->json(['product' => $product], 200);
	// }

	// public function getAllBooksForDataTable()
	// {
	// 	$products = Product::with('name');
	// 	return DataTables::of($products)
	// 		->addColumn('action', function ($row) {
	// 			return "<a
	// 			href='#'
	// 			onclick='event.preventDefault();'
	// 			data-id='{$row->id}'
	// 			role='edit'
	// 			class='btn btn-warning btn-sm'>Edit</a>
	// 			<a
	// 			href='#'
	// 			onclick='event.preventDefault();'
	// 			data-id='{$row->id}'
	// 			role='delete'
	// 			class='btn btn-danger btn-sm'>Delete</a>";
	// 		})
	// 		->rawColumns(['action'])
	// 		->make();
	// }
	// public function saveProduct(Request $request)
	// {
	// 	$product = new Product($request->all());
	// 	$this->uploadImages($request, $product);
	// 	$product->save();
	// 	return response()->json(['product' => $product->load('User', 'Category')], 201);
	// }

	// public function updateProduct(Product $product, Request $request)
	// {
	// 	$requestAll = $request->all();
	// 	$this->uploadImages($request, $product);
	// 	$requestAll['image'] = $product->image;
	// 	$product->update($requestAll);
	// 	return response()->json(['product' => $product->refresh()->load('User', 'Category')], 201);
	// }

	// public function deleteProduct(Product $product)
	// {
	// 	$product->delete();
	// 	return response()->json([], 204);
	// }

	// private function uploadImages($request, &$product)
	// {
	// 	if (!isset($request->image)) return;
	// 	$random = Str::random(20);
	// 	$image_name = "{$random}.{$request->image->clientExtension()}";
	// 	$request->image->move(storage_path('app/public/images/prodcuts'), $image_name);
	// 	$product->image = $image_name;
	// }



	// public function showProducts()
	// {
	// 	return view('products.index');
	// }

	// public function showHomeWithProducts()
	// {
	// 	$products = $this->getAllProducts()->original['products'];
	// 	return view('index', compact('products'));
	// }

	// public function getAllProducts()
	// {
	// 	$products = Product::with('Category')->get();
	// 	return response()->json(['products' => $products], 200);
	// }

	// public function getAllBooksForDataTable()
	// {
	// 	$products = Product::with('Category');
	// 	return DataTables::of($products)
	// 		->addColumn('action', function ($row) {
	// 			return "<a
	// 			href='#'
	// 			onclick='event.preventDefault();'
	// 			data-id='{$row->id}'
	// 			role='edit'
	// 			class='btn btn-warning btn-sm'>Edit</a>
	// 			<a
	// 			href='#'
	// 			onclick='event.preventDefault();'
	// 			data-id='{$row->id}'
	// 			role='delete'
	// 			class='btn btn-danger btn-sm'>Delete</a>";
	// 		})
	// 		->rawColumns(['action'])
	// 		->make();
	// }

	// public function getAProduct(Product $product)
	// {
	// 	$product->load( 'Category');
	// 	return response()->json(['product' => $product], 200,);
	// }

	// public function saveProduct(Request $request)
	// {
	// 	$product = new Product($request->all());
	// 	$this->uploadImages($request, $product);
	// 	$product->save();
	// 	return response()->json(['book' => $product->load( 'Category')], 201);
	// }

	// public function updateBook(Product $product, Request $request)
	// {
	// 	$requestAll = $request->all();
	// 	$this->uploadImages($request, $product);
	// 	$requestAll['image'] = $product->image;
	// 	$product->update($requestAll);
	// 	return response()->json(['product' => $product->refresh()->load('Category')], 201);
	// }

	// public function deleteBook(Product $product)
	// {
	// 	$product->delete();
	// 	return response()->json([], 204);
	// }

	// private function uploadImages($request, &$product)
	// {
	// 	if (!isset($request->image)) return;
	// 	$random = Str::random(20);
	// 	$image_name = "{$random}.{$request->image->clientExtension()}";
	// 	$request->image->move(storage_path('app/public/images/products'), $image_name);
	// 	$product->image = $image_name;
	// }
	public function showAllProducts()
	{
		$products =  $this->getAllProducts()->original['products'];
		return view('products.index', compact('products'));
	}
	public function showCreateProduct()
	{

		return view('products.create-product');
	}

	public function showEditProduct(Product $product)
	{

		return view('products.edit-product', compact('product',));
	}




	//
	public function getAllProducts()
	{
		$products = Product::get();
		return response()->json(['products' => $products], 200);
	}


	public function createProduct(CreateProductRequest $request)
	{
		try {
			DB::beginTransaction();
			$product = new Product($request->all());
			$product->save();
			DB::commit();
			if ($request->ajax()) return response()->json(['product' => $product], 201);
			return back()->with('success', 'Product Created');
		} catch (\Throwable $th) {
			DB::rollback();
			throw $th;
		}
	}

	// public function updateUser(Product $product, UpdateProductRequest $request)
	// {
	// 	try {
	// 		DB::beginTransaction();
	// 		$allRequest = $request->all();
	// 		if (isset($allRequest['password'])) {
	// 			if (!$allRequest['password']) unset($allRequest['password']);
	// 		}
	// 		$user->update($request->all());
	// 		$user->syncRoles([$request->role]);
	// 		DB::commit();

	// 		if ($request->ajax()) return response()->json(['user' => $user->refresh()], 201);
	// 		return back()->with('success', 'User edited');
	// 	} catch (\Throwable $th) {
	// 		DB::rollback();
	// 		throw $th;
	// 	}
	// }

	public function deleteProduct(Product $product, Request $request)
	{
		$product->delete();
		if ($request->ajax()) response()->json([], 204);
		return back()->with('success', 'Product Delete');
	}
}
