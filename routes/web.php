<?php

use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoryModel;

//  start Comment sent
use App\Http\Controllers\Comment_Product;
// end comment
// start comment blog
// emd comment blog
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
    $categories = CategoryModel::where('m_id_parent', 0)->get();
    return view('Auth.product_list.product_list', compact('categories'));
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
    $categories = CategoryModel::where('m_id_parent', 0)->get();
    return view('Auth.blog.tintuc', compact('categories'));
});
Route::get('/chitiettin', function () {
    return view('Auth.blog.chitiettintuc');
});
Route::get('/compare', function () {
    return view('Auth.home-compare.compare');
});
Route::get('/', function(){
    return view('Auth.home-compare.home_page');
})->name('home');
Route::get('/lien-he', function(){
    return view('Auth.contact.contact');
});
//liên hệ phần người dùng
Route::get('/contact', [ContactController::class, 'index'])->name('contact-auth');
Route::post('/contact', [ContactController::class, 'postMessage']);

// Admin
Route::group(['prefix'=>'admin'],function(){
    Auth::routes();
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
// Admin
Route::group(['prefix' => 'admintrator','middleware'=>['checkAdmin','auth']], function () {
    // Auth
    //dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('admintrator');
    // Route::resource('/',DashboardController::class);
    Route::resource('dashboard',DashboardController::class);
    // Post
    Route::resource('/post', PostController::class);
    Route::get('create-post', [PostController::class,'createPost']);
    // Accounts
    Route::resource('profile',App\Http\Controllers\UserController::class);
    Route::get('user',[App\Http\Controllers\UserController::class, 'list'])->name('list-user');
    Route::post('doi-matkhau-admin',[App\Http\Controllers\UserController::class, 'doimatkhauadmin'])->name('doimatkhauadmin');
    Route::post('doi-thongtin-admin',[App\Http\Controllers\UserController::class, 'doithongtinadmin'])->name('doithongtinadmin');
    // Product
    Route::resources([
        'product' => App\Http\Controllers\productController::class,
    ]);
    // start Comment

    Route::get('/list',[Comment_Product::class,'index'])->name('list_comment');
    Route::get('/delete_cmt/{id}',[Comment_Product::class,'delete_comment'])->name('delete_cmtpro');
    // end Comment
    // Route::get('/list_cmt_blog','');


    Route::post('doi-matkhau-admin',[App\Http\Controllers\profileController::class, 'doimatkhauadmin'])->name('doimatkhauadmin');
    Route::post('doi-thongtin-admin',[App\Http\Controllers\profileController::class, 'doithongtinadmin'])->name('doithongtinadmin');
    //ajax category
    Route::get('category', [CategoryController::class, 'index'])->name('category-admin');
    Route::post('category_delete',[CategoryController::class,'delete']);
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
});
    // Route::resources('user' => App\Http\Controllers\userController::class,)

    // Route::resources([
    //     'product' => App\Http\Controllers\productController::class,
    //     'user' => App\Http\Controllers\userController::class,
    // ]);
Route::get(
    '/',
    function () {
        return view('Auth.home-compare.home_page');
    }
);
route::get('/get_data_cmt/{id}',[Comment_Product::class,'get_data_cmt']);
Route::get('admintrator/order', [AdminOrderController::class, 'index'])->name('order');
Route::post('admintrator/order/store', [AdminOrderController::class, 'store'])->name('order.store');
Route::post('admintrator/order/action', [AdminOrderController::class, 'action'])->name('order.action');
Route::get('admintrator/order/detail', [AdminOrderController::class, 'detail'])->name('order.detail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
