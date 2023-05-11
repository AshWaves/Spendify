<?php

use App\Http\Controllers\Auth\LoginController;
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
Route::view('/','home');

	Route::group(['controller' => LoginController::class], function()
	{
		Route::get('login', 'showLoginForm')->name('login');
		Route::post('login', 'login');
		Route::post('logout', 'logout')->name('logout');
	});



	Route::resetPassword();

	Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
	Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');



	Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
	Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
	Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
