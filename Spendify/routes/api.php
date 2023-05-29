<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['prefix' => 'Users', 'controller' => UserController::class],function(){
	Route::get('/GetAllUser', 'getAllUsers');
	Route::get('/GetAllSalesByUser/{user}', 'getAllSalesByUser');
	Route::get('/GetAllUsersWithSales', 'getAllUsersWithSales');
	Route::post('/CreateUser', 'createUser');
	Route::put('/UpdateUser/{user}', 'updateUser');
	Route::delete('/DeleteUser/{user}', 'deleteUser');
});
Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class],function(){
	Route::get('/GetAllCategories', 'getAllCategories');
	Route::post('/CreateCategory', 'createCategory');
	Route::put('/UpdateCategory/{category}', 'updateCategory');
	Route::delete('/DeleteCategory/{category}', 'deleteCategory');
});

Route::group(['prefix' => 'Sales', 'controller' => SaleController::class],function(){
	Route::get('/GetAllSales', 'getAllSales');
	Route::post('/CreateSale', 'createSale');
	Route::put('/UpdateSale/{sale}', 'updateSale');
	Route::delete('/DeleteSale/{sale}', 'deleteSale');
});

Route::group(['prefix' => 'Products', 'controller' => ProductController::class],function(){
	Route::get('/GetAllProducts', 'getAllProducts');
	Route::post('/CreateProduct', 'createProduct');
	Route::put('/UpdateProduct/{product}', 'updateProduct');
	Route::delete('/DeleteProduct/{product}', 'deleteProduct');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
