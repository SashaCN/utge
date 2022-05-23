<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

$locale = App::currentLocale();

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('set_locale')->group(function(){
    Route::prefix('admin')->group(function()
    {
        Route::get('locale/{locale}', [\App\Http\Controllers\Admin\AdminController::class, 'changeLocale'])->name('locale');
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
        Route::resource('productType', \App\Http\Controllers\Admin\ProductTypeController::class);
        Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('subCategory', \App\Http\Controllers\Admin\SubCategoryController::class);
        Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
        Route::get('product/delete/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('product.delete');
        Route::get('productType/delete/{product}', [\App\Http\Controllers\Admin\ProductTypeController::class, 'delete'])->name('productType.delete');
        Route::get('category/delete/{product}', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('category.delete');
        Route::get('subCategory/delete/{product}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'delete'])->name('subCategory.delete');
    });
});


require __DIR__.'/auth.php';
