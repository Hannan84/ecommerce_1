<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.home');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // category routes 
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::get('/edit/{id}', [CategoryController::class, 'edit']);
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    });
    // subcategory routes 
    Route::group(['prefix' => 'subcategory'], function () {
        Route::get('/', [SubCategoryController::class, 'index'])->name('subcategory.index');
        Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/delete/{id}', [SubCategoryController::class, 'destroy'])->name('subcategory.delete');
        Route::get('/edit/{id}', [SubCategoryController::class, 'edit']);
        Route::post('/update', [SubCategoryController::class, 'update'])->name('subcategory.update');
    });
    // childcategory routes 
    Route::group(['prefix' => 'childcategory'], function () {
        Route::get('/', [ChildCategoryController::class, 'index'])->name('childcategory.index');
        Route::post('/store', [ChildCategoryController::class, 'store'])->name('childcategory.store');
        Route::get('/delete/{id}', [ChildCategoryController::class, 'destroy'])->name('childcategory.delete');
        Route::get('/edit/{id}', [ChildCategoryController::class, 'edit']);
        Route::post('/update', [ChildCategoryController::class, 'update'])->name('childcategory.update');
    });

    // brand routes 
    Route::group(['prefix' => 'brand'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('brand.index');
        Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/delete/{id}', [BrandController::class, 'destroy'])->name('brand.delete');
        // Route::get('/edit/{id}', [BrandController::class, 'edit']);
        // Route::post('/update', [BrandController::class, 'update'])->name('childcategory.update');
    });
});
