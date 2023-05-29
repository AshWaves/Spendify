<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ConfirmPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});
// create a route for create a role
Route::get('/test',function(){
	$users = User::get();
	foreach ($users as $user) {
		if ($user -> document_id == 444444444 || $user -> document_id == 18481948)  {
			$user ->assignRole('admin');
		}
		else  $user ->assignRole('user');
	}
	// Role::create(['name' => 'user']);
} );

// Route::get('/test', [TestController::class, 'showTestView'])->name('test');
// Route::get('/getProducts', [TestController::class, 'getProducts'])->name('getProducts');


Route::get('/', [CategoryController::class, 'showCategories'])->name('home');

Route::group([
	'prefix' => 'Users', 'middleware' => ['auth', 'role:admin'],
	'controller' => UserController::class
], function () {
	Route::get('/', 'showAllUsers')->name('users');
	Route::get('/CreateUser', 'showCreateUser')->name('user.create');
	Route::get('/EditUser/{user}', 'showEditUser')->name('user.edit');

	Route::post('/CreateUser', 'createUser')->name('user.create.post');
	Route::put('/EditUser/{user}', 'updateUser')->name('user.edit.put'); // no para archivos
	Route::delete('/DeleteUser/{user}', 'deleteUser')->name('user.delete');
});


Route::group(['prefix' => 'Products', 'middleware' => ['auth', 'role:admin'], 'controller' => ProductController::class], function () {
	Route::get('/', 'showAllProducts')->name('products');

	Route::get('/EditProduct/{product}', 'showEditProduct')->name('product.edit');
	Route::get('/CreateProduct', 'showCreateProduct')->name('product.create');
	Route::post('/CreateProduct', 'createProduct')->name('product.create.post');
	Route::delete('/DeleteProduct/{product}', 'deleteProduct')->name('product.delete');
	Route::post('/UpdateProduct/{product}', 'updateProduct');

	// Route::get('/GetAllProducts', 'getAllProducts');
	// Route::get('/GetAProduct/{product}', 'getAProduct');
	// Route::post('/SaveProduct', 'saveProduct');
	// Route::post('/UpdateProduct/{product}', 'updateProduct');
});


Route::group(['controller' => LoginController::class], function () {
	// Login Routes...
	Route::get('login', 'showLoginForm')->name('login');
	Route::post('login', 'login');

	// Logout Routes...
	Route::post('logout', 'logout')->name('logout');
});

Route::group(['controller' => ForgotPasswordController::class], function () {

	// Password Reset Routes...
	Route::get('password/reset', 'showLinkRequestForm')
		->name('password.request');

	Route::post('password/email', 'sendResetLinkEmail')
		->name('password.email');
});

Route::group(['controller' => ResetPasswordController::class], function () {

	Route::get('password/reset/{token}', 'showResetForm')
		->name('password.reset');

	Route::post('password/reset', 'reset')
		->name('password.update');
});

Route::group(['controller' => ConfirmPasswordController::class], function () {

	// Password Confirmation Routes...
	Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')
		->name('password.confirm');

	Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
});


Route::group(['controller' => VerificationController::class], function () {
	// Email Verification Routes...
	Route::get('email/verify', 'show')
		->name('verification.notice');

	Route::get('email/verify/{id}/{hash}', 'verify')
		->name('verification.verify');

	Route::post('email/resend', 'resend')
		->name('verification.resend');
});
