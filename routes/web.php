<?php

use App\Http\Controllers\Admin\AdminMainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDiscountController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'rolemanager:customer'])->name('dashboard');

//admin routes
Route::middleware(['auth', 'verified','rolemanager:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminMainController::class)->group(function () {
            Route::get('/dashboard','index')->name('admin');
            Route::get('/settings','setting')->name('admin.setting');
            Route::get('/manage/users','manage_user')->name('admin.manage.user');
            Route::get('/manage/stores','manage_stores')->name('admin.manage.store');
            Route::get('/cart/history','cart_history')->name('admin.cart.history');
            Route::get('/order/history','order_history')->name('admin.order.history');
        });
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category/create','index')->name('category.create');
            Route::get('/category/manage','manage')->name('category.manage');
        
        });
        Route::controller(SubCategoryController::class)->group(function () {
            Route::get('/subcategory/create','index')->name('subcategory.create');
            Route::get('/subcategory/manage','manage')->name('subcategory.manage');
        
        });
       
        Route::controller(ProductController::class)->group(function () {
            Route::get('/product/manage','index')->name('product.create');
            Route::get('/product/review/manage','review_manage')->name('product.review.manage');
        
        });
        Route::controller(ProductAttributeController::class)->group(function () {
            Route::get('/productattribute/create','index')->name('productattribute.create');
            Route::get('/productattribute/manage','manage')->name('productattribute.manage');
        
        });
        Route::controller(ProductDiscountController::class)->group(function () {
            Route::get('/discount/create','index')->name('discount.create');
            Route::get('/discount/manage','manage')->name('discount.manage');
        
        });
       
    });
    
});

// Route::get('/admin/dashboard', function () {
//     return view('admin.admin');
// })->middleware(['auth', 'verified','rolemanager:admin'])->name('admin');

Route::get('/vendor/dashboard', function () {
    return view('vendor');
})->middleware(['auth', 'verified','rolemanager:vendor'])->name('vendor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
