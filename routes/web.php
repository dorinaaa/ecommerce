<?php
require 'admin.php';

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
Route::get('test', function(){

});

// Route::get('/', function () {
//     return view('admin.layouts.app');
// });
// Route::view('/admin', 'admin.layouts.app');
//Route::view('/admin', 'admin.dashboard.index');
Route::redirect('/home', '/');
Route::view('/', 'user.layouts.home')->name('home');
Route::view('/shop-grid', 'user.layouts.shop-grid')->name('shop-grid');
Route::view('/cart', 'user.layouts.cart')->name('cart');

Route::view('/checkout', 'user.layouts.checkout2')->name('checkout');

Route::view('/favorites', 'user.layouts.favorites')->name('favorites');
// Route::view('/checkout', 'user.layouts.checkout')->name('checkout');

Route::post('/capture-order', 'PaymentController@captureOrder');
Route::post('/profile', 'Profile\ProfileController@getUserOrders')->name('profile');
Route::post('/tracking-order', 'Order\OrderController@getOrdersById')->name('tracking-order');


Route::namespace('Auth')->group(function () {
    Route::get('/login','LoginController@show_login_form')->name('show.login');
    Route::get('/unlock','LoginController@show_unlock_form')->name('show.unlock');
    Route::post('/login','LoginController@process_login')->name('login');
    Route::post('/unlock','LoginController@process_unlock')->name('unlock');
    Route::get('/register','LoginController@show_signup_form')->name('register');
    Route::post('/register','LoginController@process_signup');
    Route::post('/logout','LoginController@logout')->name('logout');
});


Route::group(['middleware' => 'admin'], function () {
    // All admin routes here
    Route::get('/admin', function () {
        return view('admin.app');
        return view('admin.dashboard.index');
    })->name('admin.dashboard');
});


