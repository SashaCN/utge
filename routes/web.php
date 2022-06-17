<?php

use App\Http\Middleware\SetLocale;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Null_;
use Spatie\QueryBuilder\QueryBuilder;



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




Route::middleware('set_locale')->group(function()
{
    Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])->name('index');
    Route::get('locale/{locale}', [\App\Http\Controllers\Admin\AdminController::class, 'changeLocale'])->name('locale');
    Route::get('/products', [\App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product');
    Route::get('/deliveriesAndPayments', [\App\Http\Controllers\SiteController::class, 'showDeliveryAndPay'])->name('deliveriesAndPayments');
    Route::get('/news', [\App\Http\Controllers\SiteController::class, 'showNews'])->name('news');
    Route::get('/contacts', [\App\Http\Controllers\SiteController::class, 'showContacts'])->name('contacts');
});


Route::middleware('auth')->group(function()
{
    Route::middleware('set_locale')->group(function ()
    {
        Route::prefix('admin')->group(function()
        {

            Route::get('locale/{locale}', [\App\Http\Controllers\Admin\AdminController::class, 'changeLocale'])->name('locale');
            Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
            Route::resource('childPage', \App\Http\Controllers\Admin\ChildPageController::class);
            Route::resource('seo', \App\Http\Controllers\Admin\SeoController::class);
            Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
            Route::resource('productType', \App\Http\Controllers\Admin\ProductTypeController::class);
            Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class);
            Route::resource('subCategory', \App\Http\Controllers\Admin\SubCategoryController::class);
            Route::resource('product', \App\Http\Controllers\Admin\ProductController::class);
            Route::resource('trashBox', \App\Http\Controllers\Admin\TrashBoxController::class);
            Route::resource('newsCategory', \App\Http\Controllers\Admin\NewsCategoryController::class);
            Route::get('newsCategory/delete/{newsCategory}', [\App\Http\Controllers\Admin\NewsCategoryController::class, 'delete'])->name('newsCategory.delete');
            Route::get('trashBox/{prouct}/restore/', [\App\Http\Controllers\Admin\TrashBoxController::class, 'restore'])->name('trashBox.restore');
            Route::post('news/mediaUpdate/{news}', [\App\Http\Controllers\Admin\NewsController::class, 'mediaUpdate'])->name('news.mediaUpdate');
            Route::post('childPage/mediaUpdate/{childPage}', [\App\Http\Controllers\Admin\ChildPageController::class, 'mediaUpdate'])->name('childPage.mediaUpdate');
            Route::post('product/mediaUpdate/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'mediaUpdate'])->name('product.mediaUpdate');
            Route::get('product/delete/{product}', [\App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('product.delete');
            Route::get('productType/delete/{productType}', [\App\Http\Controllers\Admin\ProductTypeController::class, 'delete'])->name('productType.delete');
            Route::get('category/delete/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('category.delete');
            Route::get('subCategory/delete/{subCategory}', [\App\Http\Controllers\Admin\SubCategoryController::class, 'delete'])->name('subCategory.delete');

        });
    });
});


require __DIR__.'/auth.php';
