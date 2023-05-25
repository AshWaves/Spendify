<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

	public function showCategories()
	{
		$categories = $this->getAllCategories()->original['categories'];
		return view('index', compact('categories'));
	}
    //
	public function getAllCategories()
	{
		$categories =Category::get();
		return response()->json(['categories' => $categories], 200);
	}

	public function createCategory(CreateCategoryRequest $request)
	{
		$category = new Category($request->all());
		$category->save();
		return response()->json(['category' =>$category], 201);
	}
	public function updateCategory(Category $category, UpdateCategoryRequest $request)
	{
		$category->update($request->all());
		return response()->json(['category' =>$category->refresh() ], 201);
	}
	public function deleteCategory(Category $category)
	{
		$category->delete();
		return response()->json([], 204);
	}

	public function showCategoriesWhithProducts()
	{
		$categoires = Category::with('Products')->get();
		return view('home', compact('categories'));
	}
}
