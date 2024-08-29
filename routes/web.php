<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;



Route::get('/', [WebController::class, "index"])->name('index');
Route::get('/sign-in', [AdminController::class, "signin"])->name('signin');
Route::post('/admin-verify', [AdminAccountController::class, "adminverify"])->name('adminverify');

// ............................admin panel.....................................
Route::group(['prefix' => 'admin', 'middleware'=>['AdminAuth']],function(){
    Route::get('/dashboard', [AdminController::class, "index"])->name('dashboard');
    // ...................................media...................................
    Route::get('/media', [AdminController::class, "media"])->name('media');
    // ................................category routes.........................................
    Route::match(['get','post'], '/category', [CategoryController::class, "category"])->name('category');
    Route::get('edit-category/{id}', [CategoryController::class, "editcategory"])->name('categories.edit');
    Route::post('categoriesupdate', [CategoryController::class, "categoriesupdate"])->name('categoriesupdate');
    Route::get('delete-category/{id}', [CategoryController::class, "deletecategory"])->name('categories.destroy');
    // ........................................................................................

    // ................products..........................
    Route::match(['get','post'], '/product', [ProductsController::class, "product"])->name('product');
    Route::get('/product-view', [ProductsController::class, "productview"])->name('productview');
    Route::get('/product-delete/{id}', [ProductsController::class, "delete"])->name('product.delete');
    Route::get('/product-edit/{id}', [ProductsController::class, "edit"])->name('product.edit');
    Route::post('productupdate', [ProductsController::class, "productupdate"])->name('productupdate');
    Route::post('/import', [ProductsController::class, "import"])->name('products.import');
    // ..................................................

    Route::get('/admin-logout', [AdminController::class, 'logout'])->name('adminlogout');
});
// ..........................end admin panel......................................
