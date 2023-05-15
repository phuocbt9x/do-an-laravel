<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    //Dashboard
    Route::controller(DashboardController::class)->group(function (){
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    //Categories
    Route::controller(CategoryController::class)->group(function () {
       Route::as('category.')->group(function () {
           Route::get('categories', 'index')->name('index');
           Route::prefix('category')->group(function () {
               Route::get('create', 'create')->name('create');
               Route::post('store', 'store')->name('store');
               Route::get('edit/{category}', 'edit')->name('edit');
               Route::put('update/{category}', 'update')->name('update');
               Route::delete('delete/{category}', 'destroy')->name('delete');
           });
       });
    });

    //Banner
    Route::controller(BannerController::class)->group(function () {
        Route::as('banner.')->group(function () {
            Route::get('banners', 'index')->name('index');
            Route::prefix('banner')->group(function () {
                Route::get('show/{banner}', 'show')->name('show');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('edit/{banner}', 'edit')->name('edit');
                Route::put('update/{banner}', 'update')->name('update');
                Route::delete('delete/{banner}', 'destroy')->name('delete');
            });
        });
    });
});
