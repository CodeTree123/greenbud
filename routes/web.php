<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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


Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/header', [FrontendController::class, 'header'])->name('header');
Route::get('/footer', [FrontendController::class, 'footer'])->name('footer');
Route::get('/experiences', [FrontendController::class, 'experiences'])->name('experiences');



Route::get('/login/view', [FrontendController::class, 'login_view'])->name('login_view');
Route::post('/login', [AuthController::class, 'login'])->name('login');



Route::post('/change_password', [AuthController::class, 'change_password'])->name('change_password');

Route::get('/registration', [FrontendController::class, 'registration'])->name('registration');

Route::get('/shop_details/{id}', [FrontendController::class, 'shop_details'])->name('shop_details');
Route::get('/shop_grid/{id}', [FrontendController::class, 'shop_grid'])->name('shop_grid');
Route::get('/shop_grid_details/{id}', [FrontendController::class, 'shop_grid_details'])->name('shop_grid_details');
Route::get('/shopping_cart', [FrontendController::class, 'shopping_cart'])->name('shopping_cart');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout_view');
Route::get('/our_team', [FrontendController::class, 'our_team'])->name('our_team');
Route::get('/our_other_concerns', [FrontendController::class, 'our_other_concerns'])->name('our_other_concerns');
Route::get('/about_us', [FrontendController::class, 'about_us'])->name('about_us');
Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
Route::get('/my_order', [FrontendController::class, 'my_order_list'])->name('my_order');
Route::get('/product/order/view/{id}', [FrontendController::class, 'order_view'])->name('order_view');
Route::delete('/my_order/delete', [FrontendController::class, 'my_order_delete'])->name('my_order_delete');

Route::get('cart/addtocart/{id}', [CartController::class, 'addtocart'])->name('addtocart');
Route::put('/cart/update', [CartController::class, 'updatecart'])->name('cart.update');
Route::get('/cart/delete/{id}', [CartController::class, 'cartdelete'])->name('cartdelete');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::get('/my_order', [FrontendController::class, 'my_order_list'])->name('my_order');
Route::delete('/my_order/delete', [FrontendController::class, 'my_order_delete'])->name('my_order_delete');
Route::get('/change_password', [FrontendController::class, 'change_password'])->name('change_password_view');
Route::post('/change_password', [AuthController::class, 'change_password'])->name('change_password');



Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [FrontendController::class, 'admin_index'])->name('admin_index');
    // Catagory Route
    Route::get('/admin/catagory', [AdminController::class, 'catagory'])->name('catagory');
    Route::post('/admin/catagory/add', [AdminController::class, 'catagory_add'])->name('catagory_add');
    Route::get('/admin/catagory/edit/{id}', [AdminController::class, 'catagory_edit']);
    Route::put('/admin/catagory/update', [AdminController::class, 'catagory_update'])->name('catagory_update');
    Route::delete('/admin/catagory/delete', [AdminController::class, 'catagory_delete'])->name('catagory_delete');
    Route::get('/admin/catagory/status/{id}', [AdminController::class, 'catagory_status'])->name('catagory_status');
    //Sub Catagory Route
    Route::get('/admin/sub_catagory', [AdminController::class, 'sub_catagory'])->name('sub_catagory');
    Route::post('/admin/sub_catagory/add', [AdminController::class, 'sub_catagory_add'])->name('sub_catagory_add');
    Route::get('/admin/sub_catagory/edit/{id}', [AdminController::class, 'sub_catagory_edit']);
    Route::put('/admin/sub_catagory/update', [AdminController::class, 'sub_catagory_update'])->name('sub_catagory_update');
    Route::delete('/admin/sub_catagory/delete', [AdminController::class, 'sub_catagory_delete'])->name('sub_catagory_delete');
    Route::get('/admin/sub_catagory/status/{id}', [AdminController::class, 'sub_catagory_status'])->name('sub_catagory_status');
    //Product Route
    Route::get('/admin/product', [AdminController::class, 'product'])->name('product');
    Route::post('/admin/product/add', [AdminController::class, 'product_add'])->name('product_add');
    Route::get('/admin/product/edit/{id}', [AdminController::class, 'product_edit']);
    Route::put('/admin/product/update', [AdminController::class, 'product_update'])->name('product_update');
    Route::delete('/admin/product/delete', [AdminController::class, 'product_delete'])->name('product_delete');
    Route::get('admin/product/status/{id}', [AdminController::class, 'product_status'])->name('product_status');
    Route::get('/admin/product/image/{id}', [AdminController::class, 'product_img'])->name('product_img');
    Route::get('/admin/product/description/{id}', [AdminController::class, 'product_description'])->name('product_description');
    //Product Stock Route
    Route::put('/admin/product/add_stock', [AdminController::class, 'add_product_stock'])->name('add_product_stock');
    Route::get('/admin/product/order/status/{id}', [AdminController::class, 'ordre_status'])->name('ordre_status');
    Route::delete('/admin/product/order-delete', [AdminController::class, 'order_delete'])->name('order_delete');
    //Product orders
    Route::get('/admin/product/order', [AdminController::class, 'order_list'])->name('order_list');
    Route::get('/admin/product/order/view/{id}', [AdminController::class, 'admin_order_view'])->name('admin_order_view');
    Route::get('/admin/filteraion/', [AdminController::class, 'filter_view'])->name('filter_view');
    Route::post('/admin/filteraion/process', [AdminController::class, 'filter'])->name('filter');
    Route::get('/admin/product/filteraion/{id}', [AdminController::class, 'filteraion_description'])->name('filteraion_description');
    Route::delete('/admin/process/delete', [AdminController::class, 'process_delete'])->name('process_delete');
    Route::get('/admin/product/filteraion/edit/{id}', [AdminController::class, 'filteraion_edit']);
    Route::put('/admin/product/filteraion/update', [AdminController::class, 'filteraion_update'])->name('filteraion_update');

    Route::get('/admin/experience_list', [AdminController::class, 'experience_list'])->name('experience_list');
    Route::get('/admin/experience/edit/{id}', [AdminController::class,'exp_edit']);
    Route::put('/admin/experience/update', [AdminController::class, 'exp_update'])->name('exp_update');
    Route::post('/admin/add/experience', [AdminController::class,'add_exp'])->name('add_exp');
    Route::delete('/admin/experience/delete', [AdminController::class, 'exp_delete'])->name('exp_delete');


    Route::get('/admin/team_list', [AdminController::class, 'team_list'])->name('team_list');
    Route::get('/admin/team/edit/{id}', [AdminController::class,'team_edit']);
    Route::put('/admin/team/update', [AdminController::class, 'team_update'])->name('team_update');
    Route::post('/admin/add/team', [AdminController::class,'add_team'])->name('add_team');
    Route::delete('/admin/team/delete', [AdminController::class, 'team_delete'])->name('team_delete');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
