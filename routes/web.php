<?php

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

Route::get('/cart', function () {
    return view('Auth.cart.cart');
});
Route::get('/checkout', function () {
    return view('Auth.checkout.checkout');
});
Route::get('/profile', function () {
    return view('Auth.account.profile');
});
Route::get('/productdetails', function(){
    return view('Auth.product_details.productdetails');
});
Route::get('/login', function(){
    return view('Auth.account.login');
});
Route::get('/register', function(){
    return view('Auth.account.register');
});
Route::get('/profile', function(){
    return view('Auth.account.profile');
});
Route::get('/blog', function(){
    return view('Auth.blog.tintuc');
});
Route::get('/compare', function(){
    return view('Auth.home-compare.compare');
});
Route::get('/', function(){
    return view('Auth.home-compare.home_page');
}
);
