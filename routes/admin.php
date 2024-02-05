<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PickupPointController;
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
    Route::get('/admin/password/change', [AdminController::class, 'passwordChange'])->name('admin.password.change');
    Route::post('/admin/password/update', [AdminController::class, 'passwordUpdate'])->name('admin.password.update');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // category routes 
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        Route::get('/edit/{id}', [CategoryController::class, 'edit']);
        Route::post('/update', [CategoryController::class, 'update'])->name('category.update');
    });
    // warehouse routes 
    Route::group(['prefix' => 'warehouse'], function () {
        Route::get('/', [WarehouseController::class, 'index'])->name('warehouse.index');
        Route::post('/store', [WarehouseController::class, 'store'])->name('warehouse.store');
        Route::get('/delete/{id}', [WarehouseController::class, 'destroy'])->name('warehouse.delete');
        Route::get('/edit/{id}', [WarehouseController::class, 'edit']);
        Route::post('/update', [WarehouseController::class, 'update'])->name('warehouse.update');
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
        Route::get('/edit/{id}', [BrandController::class, 'edit']);
        Route::post('/update', [BrandController::class, 'update'])->name('brand.update');
    });

    // coupon routes 
    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
        Route::post('/store', [CouponController::class, 'store'])->name('coupon.store');
        Route::delete('/delete/{id}', [CouponController::class, 'destroy'])->name('coupon.delete');
        Route::get('/edit/{id}', [CouponController::class, 'edit']);
        Route::post('/update', [CouponController::class, 'update'])->name('coupon.update');
    });

    // pickup-point routes 
    Route::group(['prefix' => 'pickupPoint'], function () {
        Route::get('/', [PickupPointController::class, 'index'])->name('pickupPoint.index');
        Route::post('/store', [PickupPointController::class, 'store'])->name('pickupPoint.store');
        Route::delete('/delete/{id}', [PickupPointController::class, 'destroy'])->name('pickupPoint.delete');
        Route::get('/edit/{id}', [PickupPointController::class, 'edit']);
        Route::post('/update', [PickupPointController::class, 'update'])->name('pickupPoint.update');
    });

    // settings routes 
    Route::group(['prefix' => 'setting'], function () {
        // seo setting 
        Route::group(['prefix' => 'seo'], function () {
            Route::get('/', [SettingController::class, 'seo'])->name('setting.seo');
            Route::post('/update', [SettingController::class, 'seoUpdate'])->name('setting.seo.update');
        });
        // smpt setting 
        Route::group(['prefix' => 'smtp'], function () {
            Route::get('/', [SettingController::class, 'smpt'])->name('setting.smtp');
            Route::post('/update', [SettingController::class, 'smtpUpdate'])->name('setting.smtp.update');
        });
        // pages setting 
        Route::group(['prefix' => 'page'], function () {
            Route::get('/', [PageController::class, 'index'])->name('page.index');
            Route::get('/create', [PageController::class, 'create'])->name('page.create');
            Route::post('/store', [PageController::class, 'store'])->name('page.store');
            Route::get('/delete/{id}', [PageController::class, 'destroy'])->name('page.delete');
            Route::get('/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
            Route::post('/update', [PageController::class, 'update'])->name('page.update');
        });
        // website setting 
        Route::group(['prefix' => 'website'], function () {
            Route::get('/', [SettingController::class, 'website'])->name('setting.website');
            Route::post('/update', [SettingController::class, 'websiteUpdate'])->name('setting.website.update');
        });
    });
});
