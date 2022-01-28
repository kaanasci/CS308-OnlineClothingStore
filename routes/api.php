<?php


use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('register', 'Auth\RegisterController@register');
//Route::post('login', 'Auth\LoginController@login');
 Route::group(['middleware' => ['auth']], function () {
    
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
});

/*Route::group(['middleware' => ['web']], function () {
    Route::post('login', 'Auth\LoginController@login');
});
*/
Route::resource('product','ProductController');
Route::resource('category','CategoryController');
Route::resource('cart','CartController');

Route::get('/product/search/{name}','ProductController@search');