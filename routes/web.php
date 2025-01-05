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


//MyCommerceController
Route::get('/', [MyCommerceController::class, 'index'])->name('home');
Route::get('/product-category', [MyCommerceController::class, 'category'])->name('product-category');
Route::get('/product-detail', [MyCommerceController::class, 'detail'])->name('product-detail');


//CartController
Route::get('/cart.show', [CartController::class, 'showCart'])->name('cart.show');


//CheckoutController
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');



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
});
