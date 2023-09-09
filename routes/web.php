<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home','HomeController@viewHome')->middleware('isLoggedIn');

Route::get('login','HomeController@index');
Route::post('login','HomeController@login');

Route::get('logout','HomeController@logout');
Route::get('changePassword', 'HomeController@viewChangePassword')->middleware('isLoggedIn');
Route::post('change_password', 'HomeController@changePassword')->middleware('isLoggedIn');

Route::get('add_user', 'UserController@addView')->middleware('isLoggedIn');
Route::get('users', 'UserController@index')->middleware('isLoggedIn');
Route::post('add_user', 'UserController@store')->middleware('isLoggedIn');
Route::post('check_email', 'UserController@checkEmail')->middleware('isLoggedIn');

Route::get('user/edit/{id}', 'UserController@edit')->middleware('isLoggedIn');
Route::post('user/update/{id}', 'UserController@update')->middleware('isLoggedIn');

Route::get('user/delete/{id}', 'UserController@delete')->middleware('isLoggedIn');

Route::get('add_product', 'ProductController@addProductView')->middleware('isLoggedIn');
Route::get('products', 'ProductController@indexProduct')->middleware('isLoggedIn');
Route::post('add_product', 'ProductController@storeProduct')->middleware('isLoggedIn');

Route::get('product/edit/{id}', 'ProductController@edit')->middleware('isLoggedIn');
Route::post('product/update/{id}', 'ProductController@update')->middleware('isLoggedIn');

Route::get('product/delete/{id}', 'ProductController@delete')->middleware('isLoggedIn'); 

Route::get('category', 'ProductController@category')->middleware('isLoggedIn');

Route::get('addCategory', 'ProductController@addCategory')->middleware('isLoggedIn');
Route::post('addCategory', 'ProductController@storeCategory')->middleware('isLoggedIn');

Route::get('category/edit/{id}', 'ProductController@editCategory')->middleware('isLoggedIn');
Route::post('category/update/{id}', 'ProductController@updateCategory')->middleware('isLoggedIn');

Route::get('category/delete/{id}', 'ProductController@deleteCategory')->middleware('isLoggedIn'); 

Route::get('about', 'FrontendController@viewAbout');
Route::get('contact', 'FrontendController@viewContact');

Route::get('manageContact', 'FrontendController@manageContact')->middleware('isLoggedIn');

Route::get('addContact', 'FrontendController@addContact')->middleware('isLoggedIn');
Route::post('addContact', 'FrontendController@storeContact')->middleware('isLoggedIn');

Route::get('contact/edit/{id}', 'FrontendController@editContact')->middleware('isLoggedIn');
Route::post('contact/update/{id}', 'FrontendController@updateContact')->middleware('isLoggedIn');
Route::get('contact/delete/{id}', 'FrontendController@deleteContact')->middleware('isLoggedIn'); 

Route::get('menu', 'FrontendController@viewMenuList');
Route::get('menu/category/{id}', 'FrontendController@viewMenu');

Route::get('registration', 'CustomerController@viewRegistration');
Route::post('registration', 'CustomerController@store');

Route::get('signin', 'CustomerController@viewSignin');
Route::post('signin', 'CustomerController@signin');
Route::get('signout', 'CustomerController@signout')->middleware('isCustomerLoggedIn'); 

Route::get('cart', 'CustomerController@cartTable')->middleware('isCustomerLoggedIn'); 

Route::get('addToCart/{id}', 'CustomerController@addToCart')->middleware('isCustomerLoggedIn'); 

Route::post('cart/update/{id}', 'CustomerController@changeQuantity')->middleware('isCustomerLoggedIn');
Route::get('checkout/{id}', 'CustomerController@checkout')->middleware('isCustomerLoggedIn');
Route::post('checkout/{id}', 'CustomerController@orderConfirm')->middleware('isCustomerLoggedIn');

Route::get('status', 'CustomerController@status')->middleware('isCustomerLoggedIn'); 
Route::get('orderDetails/{code}','CustomerController@orderDetails')->middleware('isCustomerLoggedIn'); 

Route::get('cart/delete/{id}', 'CustomerController@deleteFromCart')->middleware('isCustomerLoggedIn');

Route::get('manageOrderStatus', 'OrderController@manageOrderStatus')->middleware('isLoggedIn');
Route::match(['get', 'post'],'status/update/{code}', 'OrderController@statusUpdate')->middleware('isLoggedIn');

Route::get('manageAbout', 'FrontendController@manageAbout')->middleware('isLoggedIn');

Route::get('addAbout', 'FrontendController@addAbout')->middleware('isLoggedIn');
Route::post('addAbout', 'FrontendController@storeAbout')->middleware('isLoggedIn');

Route::get('about/edit/{id}', 'FrontendController@editAbout')->middleware('isLoggedIn');
Route::post('about/update/{id}', 'FrontendController@updateAbout')->middleware('isLoggedIn');
Route::get('about/delete/{id}', 'FrontendController@deleteAbout')->middleware('isLoggedIn'); 