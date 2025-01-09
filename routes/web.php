<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyCommerceController;
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
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\AdminOrderController;

//MyCommerceController
Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/product/category/{id}', [MyCommerceController::class, 'category'])->name('product.category');
Route::get('/product/subcategory/{id}', [MyCommerceController::class, 'subcategory'])->name('product.subcategory');
Route::get('/product/detail/{id}', [MyCommerceController::class, 'detail'])->name('product.detail');


//CartController
Route::get('/cart/show', [CartController::class, 'index'])->name('cart.show');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');


//CheckoutController
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/cash-on-delivery', [CheckoutController::class, 'cashOnDelivery'])->name('cash-on-delivery');
Route::get('/order-complete', [CheckoutController::class, 'orderComplete'])->name('order-complete');

//CustomerAuthController
Route::get('/customer/login', [CustomerAuthController::class, 'loginCustomer'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'loginCustomerCheck'])->name('customer.login');
Route::get('/customer/register', [CustomerAuthController::class, 'registerCustomer'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'newCustomer'])->name('customer.register');


Route::middleware(['customer'])->group(function () {

//CustomerAuthController
Route::get('/customer/dashboard', [CustomerAuthController::class, 'dashboardCustomer'])->name('customer.dashboard');
Route::get('/customer/logout', [CustomerAuthController::class, 'logoutCustomer'])->name('customer.logout');

//CustomerOrderController
Route::get('/customer/orders', [CustomerOrderController::class, 'showOrders'])->name('customer.orders');

});


Route::get('/easyCheckout', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/hostedCheckout', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //CategoryController
    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/category/new', [CategoryController::class, 'store'])->name('category.new');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/status/{id}', [CategoryController::class, 'status'])->name('category.status');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');

    //SubCategoryController
    Route::get('/subcategory/add', [SubCategoryController::class, 'index'])->name('subcategory.add');
    Route::post('/subcategory/new', [SubCategoryController::class, 'store'])->name('subcategory.new');
    Route::get('/subcategory/manage', [SubCategoryController::class, 'manage'])->name('subcategory.manage');
    Route::get('/subcategory/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/status/{id}', [SubCategoryController::class, 'status'])->name('subcategory.status');
    Route::post('/subcategory/delete', [SubCategoryController::class, 'delete'])->name('subcategory.delete');

    //BrandController
    Route::get('/brand/add', [BrandController::class, 'index'])->name('brand.add');
    Route::post('/brand/new', [BrandController::class, 'store'])->name('brand.new');
    Route::get('/brand/manage', [BrandController::class, 'manage'])->name('brand.manage');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/status/{id}', [BrandController::class, 'status'])->name('brand.status');
    Route::post('/brand/delete', [BrandController::class, 'delete'])->name('brand.delete');

    //UnitController
    Route::get('/unit/add', [UnitController::class, 'index'])->name('unit.add');
    Route::post('/unit/new', [UnitController::class, 'store'])->name('unit.new');
    Route::get('/unit/manage', [UnitController::class, 'manage'])->name('unit.manage');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/status/{id}', [UnitController::class, 'status'])->name('unit.status');
    Route::post('/unit/delete', [UnitController::class, 'delete'])->name('unit.delete');

    //ProductController
    Route::get('/product/add', [ProductController::class, 'index'])->name('product.add');
    Route::get('/product/get-subcategory-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('product.get-subcategory-by-category');
    Route::post('/product/new', [ProductController::class, 'store'])->name('product.new');
    Route::get('/product/manage', [ProductController::class, 'manage'])->name('product.manage');
    Route::get('/product/details/{id}', [ProductController::class, 'details'])->name('product.details');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/status/{id}', [ProductController::class, 'status'])->name('product.status');
    Route::post('/product/delete', [ProductController::class, 'delete'])->name('product.delete');

    //AdminOrderController
    Route::get('/admin/all-order', [AdminOrderController::class, 'index'])->name('admin.all-order');
    Route::get('/admin/order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order-detail');
    Route::get('/admin/order-edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order-edit');
    Route::post('/admin/update-order/{id}', [AdminOrderController::class, 'update'])->name('admin.update-order');
    Route::get('/admin/order-invoice/{id}', [AdminOrderController::class, 'showInvoice'])->name('admin.order-invoice');
    Route::get('/admin/print-invoice/{id}', [AdminOrderController::class, 'printInvoice'])->name('admin.print-invoice');
    Route::post('/admin/order-delete', [AdminOrderController::class, 'Delete'])->name('admin.order-delete');

});