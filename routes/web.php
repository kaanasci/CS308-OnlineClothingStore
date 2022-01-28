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

Route::get('/', 'WelcomeController@index')->name('welcome');
/*
Route::get('/tops', 'WelcomeController@tops')->name('tops');
Route::get('/top', 'WelcomeController@top')->name('top');
*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/product/{id}','ProductController@show');

Route::resource('product','ProductController');
Route::resource('category','CategoryController');
Route::resource('cart','CartController');

Route::get('/search','ProductController@search')->name('search');
Route::post('/review','ReviewController@store')->name('review');


Route::group(['prefix' =>'cart'],function(){
    Route::get('/', 'CartController@index')->name('cart');
    Route::post('/add', 'CartController@ekle')->name('cart.ekle');
    Route::delete('/delete/{rowid}', 'CartController@destroy')->name('cart.delete');
    Route::delete('/deleteall', 'CartController@deleteall')->name('cart.deleteall');
    Route::get('/update/{rowid}', 'CartController@update')->name('cart.update');

});

Route::group(['middleware' => 'auth'],function(){
    Route::get('/order','CheckoutController@index')->name('order');
    Route::post('/orders', 'CheckoutController@storePayment')->name('checkout');
    Route::get('/history','OrderController@index')->name('history');
    Route::get('/orders/request/{id}', 'OrderController@update')->name('refund.request');
    Route::post('/reviews','ReviewController@adminindex')->name('review');
    Route::post('/productrev/{id}','ReviewController@store')->name('addreview');
});


Route::get('/admin','WelcomeController@adminindex')->name('login');


Route::group(['middleware' => ['auth', 'product_manager']], function () {

    Route::get('/admin','ProductController@adminindex')->name('admin');
    Route::get('/adminproduct','ProductController@productindex')->name('adminproduct');
    Route::get('/productform','ProductController@productform')->name('productform');
    Route::get('/deliveries','CheckoutController@deliveries')->name('deliveries');
    Route::delete('product/delete/{id}', 'ProductController@destroy')->name('product.delete');
    Route::get('product/update/{id}', 'ProductController@update')->name('product.update');
    Route::get('/product/create', 'ProductController@create')->name('product.create');
    Route::post('/product', 'ProductController@store')->name('product.store');
    Route::get('delivery/update/{id}', 'CheckoutController@UpdateStatus')->name('delivery.up');
    Route::get('review/update/{id}', 'ReviewController@update')->name('review.update');
    Route::get('/reviews', 'CheckoutController@reviews')->name('reviews');

});

Route::group(['middleware' => ['auth', 'sales_manager']], function () {
    Route::get('/salesmanager','CheckoutController@sindex')->name('salesman');
    Route::get('/salesproduct','CheckoutController@pindex')->name('salesproduct');
    Route::get('/refunds','CheckoutController@RefundRequests')->name('refund');
    Route::get('/update/{id}', 'CheckoutController@RefundProduct')->name('delivery.update');
    Route::get('/discount/{id}', 'ProductController@discount')->name('product.discount');
    Route::get('/price/{id}', 'ProductController@SetPrice')->name('product.price');
});
