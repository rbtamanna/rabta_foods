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

// Route::fallback(function () {return view('errors.404');})->name('errors.404');