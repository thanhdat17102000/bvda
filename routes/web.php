<?php

use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoryModel;
use App\Models\product;
use Illuminate\Support\Facades\DB;

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

// AuthAdmin
Route::group(['prefix' => 'admintrator'], function () {
    Auth::routes();
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
// Admin
Route::group(['prefix' => 'admintrator', 'middleware' => ['checkAdmin', 'auth']], function () {
    //dashboard
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('admintrator');
    Route::resource('dashboard', DashboardController::class);
    // Post
    Route::get('post', [PostController::class, 'index'])->name('post-list');
    Route::get('post/add', [PostController::class, 'add_form'])->name('add-form');
    Route::get('post/edit/{id}', [PostController::class, 'edit_form'])->name('edit-form');
    Route::post('/update-trangthai', [Comment_Product::class, 'update_trangthai']);
    // Route::post("/update-trangthai", "Comment_Product@update_trangthai")->name('updatedh');
    // Accounts
    Route::resource('profile', App\Http\Controllers\UserController::class);
    Route::get('user', [App\Http\Controllers\UserController::class, 'list'])->name('list-user');
    Route::post('doi-matkhau-admin', [App\Http\Controllers\UserController::class, 'doimatkhauadmin'])->name('doimatkhauadmin');
    Route::post('doi-thongtin-admin', [App\Http\Controllers\UserController::class, 'doithongtinadmin'])->name('doithongtinadmin');
    // Product
    Route::resources([
        'product' => App\Http\Controllers\productController::class,
    ]);
    // start Comment
    Route::get('/list', [Comment_Product::class, 'index'])->name('list_comment');
    Route::get('/delete_cmt/{id}', [Comment_Product::class, 'delete_comment'])->name('delete_cmtpro');
    // end Comment
    Route::post('doi-matkhau-admin', [App\Http\Controllers\profileController::class, 'doimatkhauadmin'])->name('doimatkhauadmin');
    Route::post('doi-thongtin-admin', [App\Http\Controllers\profileController::class, 'doithongtinadmin'])->name('doithongtinadmin');
    //ajax category
    Route::get('category', [CategoryController::class, 'index'])->name('category-admin');
    Route::post('category/{id}/delete', [CategoryController::class, 'delete']);
    //category
    Route::get('category/add', [CategoryController::class, 'getAddCategory'])->name('category-add-admin');
    Route::post('category/add', [CategoryController::class, 'postAddCategory'])->name('category-post-admin');
    Route::get('category/{id}/edit', [CategoryController::class, 'getEditCategory'])->name('category-edit-admin');
    Route::post('category/{id}/edit', [CategoryController::class, 'postEditCategory']);
    Route::get('category_loadlist', [CategoryController::class, 'loadlist']);
    //contact
    Route::get('contact', [ContactController::class, 'getContact'])->name('contact-admin');
    Route::get('contact/{id}/edit', [ContactController::class, 'getEditContact'])->name('contact-edit-admin');
    Route::post('contact/{id}/edit', [ContactController::class, 'postEditContact']);
    Route::delete('contact/{id}/delete', [ContactController::class, 'getDeleteContact'])->name('contact-delete-admin');
    // order
    Route::get('order', [AdminOrderController::class, 'index'])->name('order');
    Route::post('order/store', [AdminOrderController::class, 'store'])->name('order.store');
    Route::post('order/action', [AdminOrderController::class, 'action'])->name('order.action');
    Route::get('order/detail', [AdminOrderController::class, 'detail'])->name('order.detail');


    route::post('/answer_data/{id}', [Comment_Product::class, 'answer_data']);

    // file images
    Route::get('/file', [App\Http\Controllers\DashboardController::class, 'file'])->name('file');
});

// Client
Route::get('/product_list', function () {
    $categories = CategoryModel::where('m_id_parent', 0)->get();
    $showproduct = product::orderBy('updated_at', 'desc')->where('m_status', 1)->get();
    if (Auth::user()) {
        $userLogin = Auth::user()->id;
        $list_favourite = DB::table('t_product')->join('t_user_favourite', 't_user_favourite.id_product', '=', 't_product.id')->where('t_user_favourite.id_user', $userLogin)->get();
    } else {
        $list_favourite = [];
    }
    return view('Auth.product_list.product_list', compact('categories', 'showproduct', 'list_favourite'));
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
// Route::get('/productdetails', function () {
//     return view('Auth.product_details.productdetails');
// });
Route::get('/chi-tiet-san-pham/{slug}', [HomeController::class, 'productdetail'])->name('productdetails');
Route::post('postcomment', [HomeController::class, 'postcomment'])->name('postcomment');
Route::post('showdelete', [HomeController::class, 'showdelete'])->name('showdelete');

Route::get('/login', function () {
    return view('Auth.login');
});
Route::get('/register', function () {
    return view('Auth.register');
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
Route::get('/', function () {
    return view('Auth.home-compare.home_page');
})->name('home');
Route::get('/lien-he', function () {
    return view('Auth.contact.contact');
});
// Blog
Route::get('/blog-detail/{m_slug}', [PostController::class, 'detail'])->name('blog-detail');
Route::get('/blog', [PostController::class, 'blog_list'])->name('blog-list');
//liên hệ phần người dùng
Route::get('/contact', [ContactController::class, 'index'])->name('contact-auth');
Route::post('/contact', [ContactController::class, 'postMessage']);
Route::get(
    '/',
    function () {
        return view('Auth.home-compare.home_page');
    }
);

Route::get('/get_data_cmt/{id}', [Comment_Product::class, 'get_data_cmt']);

Route::get('/get_data_khachang/{id}', [Comment_Product::class, 'get_data_khachang']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Chọn sản phẩm yêu thích
Route::post('/product-favourite', [App\Http\Controllers\productController::class, 'productFavourite']);
//Danh sách sản phẩm yêu thích của user đã chọn
Route::get('/list-product-favourite', [App\Http\Controllers\productController::class, 'listProductFavourite'])->name('list-favourite');
