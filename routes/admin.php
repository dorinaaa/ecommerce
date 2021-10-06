<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');


    /* Settings */ 
    Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
    Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

    /* Categories */
    Route::get('/categories', 'Admin\CategoryController@index')->name('admin.categories');

    /* Orders */
    Route::get('/orders', 'Admin\OrderController@index')->name('admin.orders');

    /* Products */
    Route::get('/products', 'Admin\ProductsController@index')->name('admin.products');
});

Route::group(['prefix'  =>   'categories'], function () {

    Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
    Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
    Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
    Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
    Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
    Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');

});


Route::group(['prefix' => 'products', 'namespace' => 'Admin'], function () {

    Route::get('/', 'ProductsController@index')->name('admin.products.index');
    Route::get('/create', 'ProductsController@create')->name('admin.products.create');
    Route::post('/store', 'ProductsController@store')->name('admin.products.store');
    Route::get('/edit/{id}', 'ProductsController@edit')->name('admin.products.edit');
    Route::post('/update', 'ProductsController@update')->name('admin.products.update');
    Route::get('/delete/{id}', 'ProductsController@delete')->name('admin.products.delete');
    Route::post('images/upload', 'ProductImageController@upload')->name('admin.products.images.upload');
    Route::get('images/{id}/delete', 'ProductImageController@delete')->name('admin.products.images.delete');
});
Route::group(['prefix' => 'orders'], function () {
    Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
    Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
});

Route::group(['prefix'  =>   'orders'], function () {

    Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
    Route::post('/edit-status', 'Admin\OrderController@editStatus')->name('edit.status');
    Route::get('/invoice/{id}', 'Admin\OrderController@invoice')->name('invoice');
    // Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
    // Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
    // Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
    // Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
    // Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
});