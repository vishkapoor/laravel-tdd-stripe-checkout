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
]);

Route::put('/cart/{product}', [
	'uses' => 'CartController@update',
	'as' => 'cart.update'
]);

Route::get('/cart', [
	'uses' => 'CartController@index',
	'as' => 'cart.index'
]);

Route::post('/orders', [
    'uses' => 'OrdersController@store',
    'as' => 'orders.store'
]);

// Route::put('/carts/{cart}', [
// 	'uses' => 'CartsController@update',
// 	'as' => 'carts.update'
// ]);

// Route::get('/cart/{cart}', [
// 	'uses' => 'CartsController@show',
// 	'as' => 'carts.show'
// ]);


// Route::get('/carts/{cart}/products', [
// 	'uses' => 'Carts\ProductsController@index',
// 	'as' => 'carts.products.index'
// ]);



Route::post('/carts/{cart}/products', [
	'uses' => 'Carts\ProductsController@store',
	'as' => 'carts.products.store'
]);


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
