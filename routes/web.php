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

Route::get('/products', [
	'uses' => 'ProductsController@index',
	'as' => 'products.index'
])->middleware(['auth']);

Route::put('/cart/{product}', [
	'uses' => 'CartController@update',
	'as' => 'cart.update'
])->middleware(['auth']);

Route::get('/cart', [
	'uses' => 'CartController@index',
	'as' => 'cart.index'
])->middleware(['auth']);

Route::post('/orders', [
    'uses' => 'OrdersController@store',
    'as' => 'orders.store'
])->middleware(['auth']);


Route::post('/carts/{cart}/products', [
	'uses' => 'Carts\ProductsController@store',
	'as' => 'carts.products.store'
])->middleware(['auth']);


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
