<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerShopController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix("/")->group(__DIR__ . "/web_product.php");
Route::prefix("/")->group(__DIR__ . "/web_category.php");
Route::prefix("/")->group(__DIR__ . "/web_manufacturer.php");
Route::prefix("/")->group(__DIR__ . "/web_user.php");

Route::get('/', function () {
//    return redirect() -> route('home');
    return redirect() -> route('login');
//    return view('customer_product_details');
//    return view('index');
//    return view('shop');
//    return view('cart');
});

//Route::get('/admin/product/list', [ProductController::class, "getAll"])->name('product_list');
//Route::get('/admin/user/list', [UserController::class, "getAll"])->name('user_list');
//Route::get('/admin/category/list', [CategoryController::class, "getAll"]);
//Route::get('/admin/manufacturer/list', [ManufacturerController::class, "getAll"]);

Route::get('/auth/login', [AuthController::class, "login"])->name('login');
Route::post('/auth/loginPost', [AuthController::class, "loginPost"]);
Route::get('/auth/logout', [AuthController::class, "logout"]);
Route::post('/auth/register', [AuthController::class, "register"]);


Route::middleware("isAdmin")->group(function () {
    Route::get('/admin', function (){
        return redirect() -> route('admin');
    });
    Route::get ('admin/product/list', [ProductController::class, "getAll"])->name('admin');
    Route::get ('admin/product/add', [ProductController::class, "add"]);
    Route::post('admin/product/save', [ProductController::class, "save"]);
    Route::get('admin/product/delete/{id}', [ProductController::class, "delete"]);
    Route::get('admin/product/delete-permanent/{id}', [ProductController::class, "deletePermanent"]);
    Route::get('admin/product/edit/{id}', [ProductController::class, "edit"]);
    Route::post('admin/product/update/{id}', [ProductController::class, "update"]);
    Route::get('admin/trash', [ProductController::class,"trash"]);
    Route::get('admin/product/{id}', [ProductController::class, "detail"]);
    Route::get('admin/product/restore/{id}', [ProductController::class, "restore"]);
    Route::get('admin/orders', [OrdersController::class, 'getALl']);
    Route::get('admin/order/{id}', [OrdersController::class, 'details']);
    Route::get('/admin/orders/cancel/{id}', [OrdersController::class, 'order_cancel']);
    Route::get('/admin/orders/confirm/{id}', [OrdersController::class, 'order_confirm']);
    Route::get('/admin/orders/shipping/{id}', [OrdersController::class, 'order_shipping']);
    Route::get('/admin/orders/shipped/{id}', [OrdersController::class, 'order_shipped']);
    Route::get('/admin/orders/done/{id}', [OrdersController::class, 'order_done']);
    Route::get('admin/orders/cancelled',[OrdersController::class, "order_cancelled"]);
    Route::get('admin/orders/pending',[OrdersController::class, "order_pending"]);
    Route::get('admin/orders/confirmed',[OrdersController::class, "order_confirmed"]);
    Route::get('admin/orders/shipping',[OrdersController::class, "order_ship"]);
    Route::get('admin/orders/shipped',[OrdersController::class, "order_came"]);
    Route::get('admin/orders/done',[OrdersController::class, "order_completed"]);

});
//Route::get('/home', function(){
//    return view('customer.index');
//});

//Route::get('/home', [CategoryController::class, "view"]);
Route::get('/home/product/all', [CustomerShopController::class, "getAll"]);
Route::get('/home', [CategoryController::class, "view"])->name('home');
Route::get('/home/category/Kit', [CustomerShopController::class, "kit"]);
Route::get('/home/category/Switch', [CustomerShopController::class, "switch"]);
Route::get('/home/category/Keycap', [CustomerShopController::class, "keycap"]);
Route::get('/home/category/Tools', [CustomerShopController::class, "tools"]);
Route::get('/home/product/detail/{id}', [CustomerShopController::class, "detail"]);
Route::get('home/cart', [CustomerShopController::class, "cart"]);
Route::post('home/cart/add/{id}', [CustomerShopController::class, 'addToCart']);
Route::get('home/checkout', [CustomerShopController::class, "checkout"]);
Route::post('home/place_order', [CustomerShopController::class, "place_order"]);
Route::get('home/order/history', [CustomerShopController::class, "order_history"]);
Route::get('home/order/{id}', [CustomerShopController::class, "order_detail"]);
Route::get('home/order/cancel/{id}', [CustomerShopController::class, "order_cancel"]);
Route::match(['get', 'post'],'/home/cart/update', [CustomerShopController::class, "update_cart"]);
Route::match(['get', 'post'], 'home/cart/remove/{id}', [CustomerShopController::class, 'cart_remove']);
