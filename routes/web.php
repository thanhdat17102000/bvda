<?php

use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;

//  start Comment sent
use App\Http\Controllers\Comment_Product;
// end comment
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

Route::get('/product_list', function () {
    return view('Auth.product_list.product_list');
});
Route::get('/wishlist', function () {
    return view('Auth.wishlist.wishlist');
});
Route::get('/cart', function () {
    return view('Auth.cart.cart');
});
Route::get('/checkout', function () {
    return view('Auth.checkout.checkout');
});
Route::get('/profile', function () {
    return view('Auth.account.profile');
});
Route::get('/productdetails', function () {
    return view('Auth.product_details.productdetails');
});
Route::get('/login', function () {
    return view('Auth.account.login');
});
Route::get('/register', function () {
    return view('Auth.account.register');
});
Route::get('/profile', function () {
    return view('Auth.account.profile');
});
Route::get('/blog', function () {
    return view('Auth.blog.tintuc');
});
Route::get('/chitiettin', function () {
    return view('Auth.blog.chitiettintuc');
});
Route::get('/compare', function () {
    return view('Auth.home-compare.compare');
});
Route::get('/', function(){
    return view('Auth.home-compare.home_page');
});
Route::get('/lien-he', function(){
    return view('Auth.contact.contact');
});

// Admin
// Admin
Route::group(['prefix' => 'admintrator','middleware'=>['checkAdmin','auth']], function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('admintrator');
    //dashboard
    // Route::resource('/',DashboardController::class);
    Route::resource('dashboard',DashboardController::class);
    //ajax category
    Route::get('category', [CategoryController::class, 'index'])->name('category-admin');
    Route::post('category_delete',[CategoryController::class,'delete']);
    Route::post('category_loadDetail',[CategoryController::class,'loadDetail']);
    // Post
    Route::get('post', [PostController::class, 'index'])->name('post-list');
    Route::get('post/add', [PostController::class, 'add_form'])->name('add-form');
    Route::get('post/edit/{id}', [PostController::class, 'edit_form'])->name('edit-form');
    // User
    Route::resources([
        'product' => App\Http\Controllers\productController::class,
        'user' => App\Http\Controllers\userController::class,
    ]);

    // start Comment
    Route::get('/list',[Comment_Product::class,'index'])->name('list_comment');
    Route::get('/delete_cmt/{id}',[Comment_Product::class,'delete_comment']);
    // end Comment


    Route::post('doi-matkhau-admin',[App\Http\Controllers\profileController::class, 'doimatkhauadmin'])->name('doimatkhauadmin');
    Route::post('doi-thongtin-admin',[App\Http\Controllers\profileController::class, 'doithongtinadmin'])->name('doithongtinadmin');
});

    Route::group(['prefix'=> 'contact'], function(){
    //category
    Route::get('category/add', [CategoryController::class, 'getAddCategory'])->name('category-add-admin');
    Route::post('category/add', [CategoryController::class, 'postAddCategory']);
    Route::get('category/{id}/edit', [CategoryController::class, 'getEditCategory'])->name('category-edit-admin');
    Route::post('category/{id}/edit', [CategoryController::class, 'postEditCategory']);
    Route::get('category_loadlist',[CategoryController::class,'loadlist']);
    //contact
    Route::get('contact', [ContactController::class, 'getContact'])->name('contact-admin');
    Route::get('contact/{id}/edit', [ContactController::class, 'getEditContact'])->name('contact-edit-admin');
    Route::post('contact/{id}/edit', [ContactController::class, 'postEditContact']);
    Route::delete('contact/{id}/delete', [ContactController::class, 'getDeleteContact'])->name('contact-delete-admin');
    // Route::resources('user' => App\Http\Controllers\userController::class,)

    // Route::resources([
    //     'product' => App\Http\Controllers\productController::class,
    //     'user' => App\Http\Controllers\userController::class,
    // ]);
});
Route::get(
    '/',
    function () {
        return view('Auth.home-compare.home_page');
    }
);
Route::get('admintrator/order', [AdminOrderController::class, 'index'])->name('order');
Route::post('admintrator/order/store', [AdminOrderController::class, 'store'])->name('order.store');
Route::get('admintrator/order/detail', [AdminOrderController::class, 'detail'])->name('order.detail');
// 
Route::get('/', [HomeController::class, 'index'])->name('home-auth');
Route::get('/contact', [ContactController::class, 'index'])->name('contact-auth');
Route::post('/contact', [ContactController::class, 'postMessage']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
