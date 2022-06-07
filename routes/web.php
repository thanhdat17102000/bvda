<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/product_list', function () {
//     return view('Auth.product_list.product_list');
// });
// Route::get('/wishlist', function () {
//     return view('Auth.wishlist.wishlist');
// });
// Route::get('/cart', function () {
//     return view('Auth.cart.cart');
// });
// Route::get('/checkout', function () {
//     return view('Auth.checkout.checkout');
// });
// Route::get('/profile', function () {
//     return view('Auth.account.profile');
// });
// Route::get('/productdetails', function () {
//     return view('Auth.product_details.productdetails');
// });
// Route::get('/login', function () {
//     return view('Auth.account.login');
// });
// Route::get('/register', function () {
//     return view('Auth.account.register');
// });
// Route::get('/profile', function () {
//     return view('Auth.account.profile');
// });

// Admin
Route::group(['prefix' => 'admintrator'], function () {
    Route::resource('/',DashboardController::class);
    Route::resource('dashboard',DashboardController::class);

    //Category
    Route::resource('category',CategoryController::class);
    //CategoryAjax
    Route::post('category_add',[CategoryController::class,'add']);
    Route::get('category_loadlist',[CategoryController::class,'loadlist']);
    Route::post('category_delete',[CategoryController::class,'delete']);
    Route::post('category_loadDetail',[CategoryController::class,'loadDetail']);
});
Route::group(['prefix' => '/'], function (){

});

