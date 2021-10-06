<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'Api'], function () {
    /* Categories */
    Route::get('/categories', 'CategoriesController@index');
    Route::get('/categories/{category}', 'CategoriesController@show');
    Route::post('/categories', 'CategoriesController@store');
    Route::put('/categories/{category}', 'CategoriesController@update');
    Route::delete('/categories/{category}', 'CategoriesController@delete');

    /* Products */
    Route::get('/products', 'ProductsController@index');
    Route::get('/products/trends', 'ProductsController@trending');
    Route::get('/products/hot', 'ProductsController@hot');

    /* Favorites */
    Route::get('/favorites', 'FavoritesController@index');
    Route::get('/favorites/{favoriteId}', 'FavoritesController@show');
    Route::post('/favorites', 'FavoritesController@store');
    Route::put('/favorites/{favoriteId}', 'FavoritesController@update');
    Route::delete('/favorites/{favoriteId}', 'FavoritesController@delete');
});
