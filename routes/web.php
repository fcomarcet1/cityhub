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


// services
Route::get('cab',[
  'as'=>'cab',
  'uses'=>'Services\ServicesController@cab'
]);

Route::post('cab',[
  'as'=>'',
  'uses'=>'Services\ServicesController@bookcab'
]);

Route::get('service/{id}',[
  'as'=>'service',
  'uses'=>'Services\ServicesController@service'
]);

Route::post('service/{id}',[
  'as'=>'',
  'uses'=>'Services\ServicesController@request_service'
]);

Route::get('electrician',[
  'as'=>'electrician',
  'uses'=>'Services\ServicesController@electrician'
]);

Route::post('electrician',[
  'as'=>'',
  'uses'=>'Services\ServicesController@electrician'
]);

Route::get('plumber',[
  'as'=>'plumber',
  'uses'=>'Services\ServicesController@plumber'
]);

Route::post('plumber',[
  'as'=>'',
  'uses'=>'Services\ServicesController@plumber'
]);



Route::get('service-checkout',[
  'as'=>'service-checkout',
  'uses'=>'Services\ServicesController@service_checkout',
  'middleware'=>'auth'
]);

Route::post('service-checkout',[
  'as'=>'',
  'uses'=>'Services\ServicesController@postservice_checkout',
  'middleware'=>'auth'
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

Route::get('client/logout',[
  'as'=>'client.logout',
  'uses'=>'Join\ClientLoginController@clientlogout'
]);

//client dashboard/shop/add product
Route::get('client',[
  'as'=>'client.dashboard',
  'uses'=>'Join\ClientPageController@index'
]);

Route::get('client/shop',[
  'as'=>'client.shop',
  'uses'=>'Join\ClientPageController@clientshop'
]);

Route::post('client/shop',[
  'as'=>'',
  'uses'=>'Join\ClientPageController@add_product'
]);

Route::post('update/{id}',[
  'as'=>'statusUpdate',
  'uses'=>'Join\ClientPageController@statusUpdate'
]);


// update/delete client product
Route::get('clientproduct/update/{id}',[
  'as'=>'clientproduct.update',
  'uses'=>'Join\ClientPageController@update'
]);

Route::get('clientproduct/delete/{id}',[
  'as'=>'clientproduct.delete',
  'uses'=>'Join\ClientPageController@delete'
]);

// user add to cart
Route::get('addtocart/{id}',[
  'as'=>'addToCart',
  'uses'=>'Food\IndexController@addToCart'
]);

//increase by one/reduce by one

Route::get('reduceByOne/{id}',[
  'as'=>'reduceByOne',
  'uses'=>'Food\IndexController@reduceByOne'
]);

Route::get('increaseByOne/{id}',[
  'as'=>'increaseByOne',
  'uses'=>'Food\IndexController@increaseByOne'
]);

Route::get('trash/{id}',[
  'as'=>'trash',
  'uses'=>'Food\IndexController@removeItem'
]);

//user cart view
Route::get('cart',[
  'as'=>'cart',
  'uses'=>'Food\IndexController@cart'
]);

//checkout
Route::get('checkout',[
  'as'=>'checkout',
  'uses'=>'Food\IndexController@checkout',
  'middleware'=>'auth'
]);

Route::post('checkout',[
  'as'=>'',
  'uses'=>'Food\IndexController@pay',
  'middleware'=>'auth'
]);

Route::get('cancelOrder/{id}',[
  'as'=>'cancelOrder',
  'uses'=>'Food\IndexController@cancelorder'
]);

Route::get('redirect',[
  'as'=>'redirect',
  'uses'=>'Food\IndexController@redirect'
]);


//user dashboard & profile
Route::get('myorders',[
  'as'=>'user.orders',
  'uses'=>'Join\UserController@myorders'
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
Route::get('food/{id}',[
  'as'=>'food.shop',
  'uses'=>'Food\IndexController@restaurant'
]);


//contact/suggest
Route::get('contact',[
  'as'=>'contact',
  'uses'=>'Basic\BasicController@contact'
]);

Route::post('contact',[
  'as'=>'',
  'uses'=>'Basic\BasicController@contact_mail'
]);


// admin
Route::get('chadmin',[
  'as'=>'admindashboard',
  'uses'=>'Admin\AdminController@dashboard'
]);

Route::get('addService',[
  'as'=>'addService',
  'uses'=>'Admin\AdminController@addService'
]);

Route::get('addFormField',[
  'as'=>'addFormField',
  'uses'=>'Admin\AdminController@addFormFields'
]);

Route::get('updateService',[
  'as'=>'updateService',
  'uses'=>'Admin\AdminController@updateService'
]);