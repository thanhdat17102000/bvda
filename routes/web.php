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

Route::get('/', function () {
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
