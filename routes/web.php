<?php

use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use App\Models\CategoryModel;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Models\product;
use App\Http\Resources\UserResource;
use App\Models\User;

//  start Comment sent
use App\Http\Controllers\Comment_Product;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Utilities\Request;

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
// error
Route::group(['prefix' => 'error'], function () {
    Route::get('/404-error', [\App\Http\Controllers\ErrorController::class, 'error404'])->name('error404');
});
// AuthClients
Route::group(['prefix' => 'account'], function () {
    Auth::routes();
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
// AuthAdmin
Route::group(['prefix' => 'admintrator'], function () {
    Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('login-admin-form');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('logout-admin');
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
    // Profile
    Route::resource('profile', App\Http\Controllers\UserController::class);
    Route::post('doi-matkhau-admin', [App\Http\Controllers\UserController::class, 'doimatkhauadmin'])->name('doimatkhauadmin');
    Route::post('doi-thongtin-admin', [App\Http\Controllers\UserController::class, 'doithongtinadmin'])->name('doithongtinadmin');
    // Quản lý user
    Route::get('user', [App\Http\Controllers\UserController::class, 'list'])->name('list-user');
    Route::get('/user/add', [UserController::class,'add_user'])->name('add_user');
    Route::get('user/edit/{id}', [UserController::class, 'update_form'])->name('update_user');
    // Product
    Route::resources([
        'product' => App\Http\Controllers\productController::class,
    ]);

    // start Comment
    Route::get('/list', [Comment_Product::class, 'index'])->name('list_comment');
    Route::get('/delete_cmt/{id}', [Comment_Product::class, 'delete_comment'])->name('delete_cmtpro');
    Route::post('/answer_data/{id}', [Comment_Product::class, 'answer_data']);

    // ajax category
    Route::get('category', [CategoryController::class, 'index'])->name('category-admin');
    Route::post('category/{id}/delete', [CategoryController::class, 'delete']);

    // category
    Route::get('category/add', [CategoryController::class, 'getAddCategory'])->name('category-add-admin');
    Route::post('category/add', [CategoryController::class, 'postAddCategory'])->name('category-post-admin');
    Route::get('category/{id}/edit', [CategoryController::class, 'getEditCategory'])->name('category-edit-admin');
    Route::post('category/{id}/edit', [CategoryController::class, 'postEditCategory']);
    Route::get('category_loadlist', [CategoryController::class, 'loadlist']);

    // contact
    Route::get('contact', [ContactController::class, 'getContact'])->name('contact-admin');
    Route::get('contact/{id}/edit', [ContactController::class, 'getEditContact'])->name('contact-edit-admin');
    Route::post('contact/{id}/edit', [ContactController::class, 'postEditContact']);
    Route::delete('contact/{id}/delete', [ContactController::class, 'getDeleteContact'])->name('contact-delete-admin');

    // order
    Route::get('order', [AdminOrderController::class, 'index'])->name('order');
    Route::post('order/store', [AdminOrderController::class, 'store'])->name('order.store');
    Route::post('order/action', [AdminOrderController::class, 'action'])->name('order.action');
    Route::get('order/detail', [AdminOrderController::class, 'detail'])->name('order.detail');

    // file images
    Route::get('/file', [App\Http\Controllers\DashboardController::class, 'file'])->name('file');

    // chức năng nâng cao admin product
    Route::post('/cap-nhat-gia-san-pham', [App\Http\Controllers\productController::class, 'capnhatprice'])->name('capnhatprice');
    Route::delete('/delete-all-san-pham', [App\Http\Controllers\productController::class, 'deleteallsp'])->name('deleteallsp');
});


// Client
Route::get('/', function () {
    return view('Auth.home-compare.home_page');
})->name('home');
Route::get('/compare', function () {
    return view('Auth.home-compare.compare');
});
Route::get('/product_list', function () {
    // dd('123');
    $categories = CategoryModel::where('m_id_parent', 0)->get();
    $showproduct = product::orderBy('updated_at', 'desc')->where('m_status', 1)->search()->paginate(6);
    if (Auth::user()) {
        $userLogin = Auth::user()->id;
        $list_favourite = DB::table('t_product')->join('t_user_favourite', 't_user_favourite.id_product', '=', 't_product.id')->where('t_user_favourite.id_user', $userLogin)->get();
        // dd($list_favourite);
    } else {
        $list_favourite = [];
        // dd($list_favourite);
    }
    if (isset($_GET['danhsach'])) {
        $sort_by = $_GET['danhsach'];
        if ($sort_by == 'sanphamaz') {
            $showproduct = product::orderBy('id', 'ASC')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        } elseif ($sort_by == 'sanphamza') {
            $showproduct = product::orderBy('id', 'desc')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        } elseif ($sort_by == 'giathapdencao') {
            $showproduct = product::orderBy('m_original_price', 'asc')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        } elseif ($sort_by == 'giacaodenthap') {
            $showproduct = product::orderBy('m_original_price', 'desc')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        } elseif ($sort_by == 'moicapnhat') {
            $showproduct = product::orderBy('updated_at', 'desc')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        }
    }
    return view('Auth.product_list.product_list', compact('categories', 'showproduct', 'list_favourite'));
});
Route::get('/product_list_search', function (Request $request) {
    $keyword = '';
    if (!empty($request->input('keywork'))) {
        $keywork =  $request->input('keywork');
        $showproduct = product::orderBy('updated_at', 'desc')->where("m_product_name", 'LIKE', "%{$keywork}%")->where('m_status', 1)->search()->paginate(10);
    }
    $categories = CategoryModel::where('m_id_parent', 0)->get();
    // return $showproduct;
    if (Auth::user()) {
        $userLogin = Auth::user()->id;
        $list_favourite = DB::table('t_product')->join('t_user_favourite', 't_user_favourite.id_product', '=', 't_product.id')->where('t_user_favourite.id_user', $userLogin)->get();
    } else {
        $list_favourite = [];
    }
    if (isset($_GET['danhsach'])) {
        $sort_by = $_GET['danhsach'];
        if ($sort_by == 'sanphamaz') {
            $showproduct = product::orderBy('id', 'ASC')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        } elseif ($sort_by == 'sanphamza') {
            $showproduct = product::orderBy('id', 'desc')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        } elseif ($sort_by == 'giathapdencao') {
            $showproduct = product::orderBy('m_original_price', 'asc')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        } elseif ($sort_by == 'giacaodenthap') {
            $showproduct = product::orderBy('m_original_price', 'desc')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        } elseif ($sort_by == 'moicapnhat') {
            $showproduct = product::orderBy('updated_at', 'desc')->where('m_status', 1)->search()->paginate(10);
            $showproduct->render();
        }
    }
    return view('Auth.product_list.product_list', compact('categories', 'showproduct', 'list_favourite'));
})->name('search');
Route::get('/loc-gia-sp', [HomeController::class, 'locgiasp'])->name('locgia');
Route::get('/product_list/{id}', [HomeController::class, 'showcategoryid'])->name('showcategoryid');

Route::get('/wishlist', function () {
    return view('Auth.wishlist.wishlist');
});
Route::get('/cart', function () {
    return view('Auth.cart.cart');
});
Route::get('/checkout', function () {
    return view('Auth.checkout.checkout');
});

// Profile Client
Route::group(['prefix' => 'profile'], function () {
    Route::get('/', [App\Http\Controllers\ProfileController::class, 'profile'])->name('profile');
    Route::get('/chi-tiet-don-hang/{id}', [App\Http\Controllers\ProfileController::class, 'order']);
    Route::get('/huy-don-hang/{id}', [App\Http\Controllers\ProfileController::class, 'cancelled']);
    Route::post('/doi-thong-tin-profile', [App\Http\Controllers\ProfileController::class, 'updateProfile']);
});


Route::get('/chi-tiet-san-pham/{slug}', [HomeController::class, 'productdetail'])->name('productdetails');
Route::post('postcomment', [HomeController::class, 'postcomment'])->name('postcomment');
Route::post('showdelete', [HomeController::class, 'showdelete'])->name('showdelete');

Route::get('/login', function () {
    return view('Auth.login');
});
Route::get('/register', function () {
    return view('Auth.register');
});

// Order
Route::get('/cart', function () {
    return view('Auth.cart.cart');
})->name('cart');
Route::get('/checkout', function () {
    return view('Auth.checkout.checkout');
})->name('checkout');
Route::get('/checkout-success', [CheckoutController::class, 'checkout_success'])->name('checkout-success');
Route::post('/momo-payment', [CheckoutController::class, 'momo_payment'])->name('momo-payment');
Route::post('/vnpay-payment', [CheckoutController::class, 'vnpay_payment'])->name('vnpay-payment');

// Product
Route::get('/product_list', function () {
    $categories = CategoryModel::where('m_id_parent', 0)->get();
    $showproduct = product::orderBy('updated_at', 'desc')->where('m_status', 1)->get();
    return view('Auth.product_list.product_list', compact('categories', 'showproduct'));
});
Route::get('/chi-tiet-san-pham/{slug}', [HomeController::class, 'productdetail'])->name('productdetails');
Route::post('postcomment', [HomeController::class, 'postcomment'])->name('postcomment');
Route::post('showdelete', [HomeController::class, 'showdelete'])->name('showdelete');
Route::get('/wishlist', function () {
    return view('Auth.wishlist.wishlist');
});
// Blog
Route::get('/blog-detail/{m_slug}', [PostController::class, 'detail'])->name('blog-detail');
Route::get('/blog', [PostController::class, 'blog_list'])->name('blog-list');
Route::get('/get_data_cmt/{id}', [Comment_Product::class, 'get_data_cmt']);
Route::get('/get_data_khachang/{id}', [Comment_Product::class, 'get_data_khachang']);

// Liên hệ phần người dùng
Route::get('/contact', [ContactController::class, 'index'])->name('contact-auth');
Route::post('/contact', [ContactController::class, 'postMessage']);
Route::get('/get_data_khachang/{id}', [Comment_Product::class, 'get_data_khachang']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
//Chọn sản phẩm yêu thích
Route::post('/product-favourite', [productController::class, 'productFavourite']);
//Danh sách sản phẩm yêu thích của user đã chọn
Route::get('/list-product-favourite', [productController::class, 'listProductFavourite'])->name('list-favourite');
//Search
Route::post('/search', [productController::class, 'search']);
