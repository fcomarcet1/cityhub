<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// welcome route
Route::get('/',[
	'uses'=>'WelcomeController@welcome',
	'as'  =>'welcome'
]);

// login/signup routes

Route::get('login', [
  'as' => 'login',
  'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
  'as' => '',
  'uses' => 'Auth\LoginController@login'
]);

Route::get('register', [
  'as' => 'register',
  'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);

Route::get('user/logout',[
  'as'=>'user.logout',
  'uses'=>'Auth\LoginController@userlogout'
]);

//signup as a client(service provider)

Route::get('join',[
  'as'=>'join.client',
  'uses'=>'Join\JoinController@index'
]);

Route::post('join',[
  'as'=>'',
  'uses'=>'Join\JoinController@signup'
]);

Route::get('clientlogin',[
  'as'=>'login.client',
  'uses'=>'Join\ClientLoginController@signinform'
]);

Route::post('clientlogin',[
  'as'=>'',
  'uses'=>'Join\ClientLoginController@signin'
]);

Route::get('client',[
  'as'=>'client.dashboard',
  'uses'=>'Join\ClientPageController@index'
]);

Route::get('client/logout',[
  'as'=>'client.logout',
  'uses'=>'Join\ClientLoginController@clientlogout'
]);

//client reset password
 Route::post('client/password/email', 'Join\ClientForgotPasswordController@sendResetLinkEmail')->name('client.password.email');
  Route::get('client/password/reset', 'Join\ClientForgotPasswordController@showLinkRequestForm')->name('client.password.request');
  Route::post('client/password/reset', 'Join\ClientResetPasswordController@reset');
  Route::get('client/password/reset/{token}', 'Join\ClientResetPasswordController@showResetForm')->name('client.password.reset');



//services
Route::get('food',[
  'as'=>'food.index',
  'uses'=>'Food\IndexController@index'
]);

// restaurant
Route::get('restaurant/{id}',[
  'as'=>'food.rest',
  'uses'=>'Food\IndexController@restaurant'
]);