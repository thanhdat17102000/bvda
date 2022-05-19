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
    return view('layouts.master');
});
Route::get('/productdetails', function(){
    return view('product_details.productdetails');
});
Route::get('/login', function(){
    return view('account.login');
});
Route::get('/register', function(){
    return view('account.register');
});
Route::get('/profile', function(){
    return view('account.profile');
});
