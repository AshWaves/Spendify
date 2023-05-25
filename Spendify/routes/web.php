<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[CategoryController::class, 'showCategories'])->name('home');


Route::group(['prefix' => 'Users','controller' => UserController::class], function()
	{
		//Route::resetPassword();
		Route::get('/','showAllUsers')->name('users');
		Route::get('/CreateUser', 'showCreateUser')->name('user.create');

	});

	Route::group(['controller' => LoginController::class], function()
	{
		Route::get('login', 'showLoginForm')->name('login');
		Route::post('login', 'login');
		Route::post('logout', 'logout')->name('logout');
	});


	Route::group(['controller' => ForgotPasswordController::class], function()
	{
		//Route::resetPassword();
		Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
		Route::post('password/email', 'sendResetLinkEmail')->name('password.email');
	});

	Route::group(['controller' => ResetPasswordController::class], function()
	{
		Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
		Route::post('password/reset', 'reset')->name('password.update');
	});

	Route::group(['controller' => ConfirmPasswordController::class], function()
	{
		Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
		Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');
	});

	Route::group(['controller' => VerificationController::class], function()
	{
		Route::get('email/verify', 'show')->name('verification.notice');
		Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');
		Route::post('email/resend', 'resend')->name('verification.resend');

	});

