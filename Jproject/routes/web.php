<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommerceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerOrderController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SslCommerzPaymentController;


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

Route::get('/',[EcommerceController::class,'index'])->name('home');
Route::get('/product/category/{id}',[EcommerceController::class,'category'])->name('category');
Route::get('/product/subCategory/{id}',[EcommerceController::class,'subCategory'])->name('subCategory.add');
Route::get('/product/detail/{id}',[EcommerceController::class,'detail'])->name('detail');
Route::post('/cart/add-item/{id}',[CartController::class,'index'])->name('cart');
Route::get('/cart/show-item',[CartController::class,'show'])->name('show');
Route::get('/cart/remove-item/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::post('/cart/update-item/{id}',[CartController::class,'update'])->name('cart.update');
Route::get('/checkout/add',[CheckoutController::class,'index'])->name('checkout');

Route::get('/customer-email-check',[CheckoutController::class,'customerEmailCheck'])->name('customer-email-check');

Route::post('/new-order',[CheckoutController::class,'newOrder'])->name('new-order');
Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete-order');

Route::get('/customer/order',[CustomerOrderController::class,'index'])->name('customer.order')->middleware('customer');

Route::get('/customer/dashboard',[CustomerAuthController::class,'dashboard'])->name('customer.dashboard')->middleware('customer');
Route::get('/customer/logout',[CustomerAuthController::class,'logout'])->name('customer.logout');
Route::post('/customer/login',[CustomerAuthController::class,'singIn'])->name('customer.login');
Route::get('/customer/auth',[CustomerAuthController::class,'auth'])->name('customer.auth');
Route::post('/customer/auth',[CustomerAuthController::class,'newCustomer'])->name('customer.auth');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::middleware(['auth:sanctum',config('jetstream.auth_session'), 'verified'])->group(function () {


    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');


    Route::get('/category/add',[CategoryController::class,'index'])->name('category.add');
    Route::post('/category/create',[CategoryController::class,'create'])->name('category.create');
    Route::get('/category/manage',[CategoryController::class,'manage'])->name('category.manage');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');

    Route::get('/sub-category/add',[SubCategoryController::class,'index'])->name('sub-category.add');
    Route::post('/sub-category/create',[SubCategoryController::class,'create'])->name('sub-category.create');
    Route::get('/sub-category/manage',[SubCategoryController::class,'manage'])->name('sub-category.manage');
    Route::get('/sub-category/edit/{id}',[SubCategoryController::class,'edit'])->name('sub-category.edit');
    Route::post('/sub-category/update/{id}',[SubCategoryController::class,'update'])->name('sub-category.update');
    Route::get('/sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('sub-category.delete');

    Route::get('/brand/add',[BrandController::class,'index'])->name('brand.add');
    Route::post('/brand/create',[BrandController::class,'create'])->name('brand.create');
    Route::get('/brand/manage',[BrandController::class,'manage'])->name('brand.manage');
    Route::get('/brand/edit/{id}',[BrandController::class,'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}',[BrandController::class,'update'])->name('brand.update');
    Route::get('/brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');


    Route::get('/unit/add',[UnitController::class,'index'])->name('unit.add');
    Route::post('/unit/create',[UnitController::class,'create'])->name('unit.create');
    Route::get('/unit/manage',[UnitController::class,'manage'])->name('unit.manage');
    Route::get('/unit/edit/{id}',[UnitController::class,'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}',[UnitController::class,'update'])->name('unit.update');
    Route::get('/unit/delete/{id}',[UnitController::class,'delete'])->name('unit.delete');


    Route::get('/product/add',[ProductController::class,'index'])->name('product.add');
    Route::post('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::get('/product/manage',[ProductController::class,'manage'])->name('product.manage');
    Route::get('/product//{id}',[ProductController::class,'detail'])->name('product.detail');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');

    Route::get('/admin/order-manage',[AdminOrderController::class,'index'])->name('admin.order-manage');
    Route::get('/admin/order-detail/{id}',[AdminOrderController::class,'detail'])->name('admin.order-detail');
    Route::get('/admin/order-invoice/{id}',[AdminOrderController::class,'invoice'])->name('admin.order-invoice');
    Route::get('/admin/print-invoice/{id}',[AdminOrderController::class,'printOrder'])->name('admin.print-invoice');
    Route::get('/admin/order-edit/{id}',[AdminOrderController::class,'edit'])->name('admin.order-edit');
    Route::post('/admin/order-update/{id}',[AdminOrderController::class,'update'])->name('admin.order-update');
    Route::get('/admin/order-delete/{id}',[AdminOrderController::class,'delete'])->name('admin.order-delete');


    Route::get('/user/add-user',[UserController::class,'index'])->name('user.add');
    Route::post('/user/new-user',[UserController::class,'create'])->name('user.new');
    Route::get('/user/manage-user',[UserController::class,'manage'])->name('user.manage');

});
