<?php


use Illuminate\Support\Facades\Route;

// Main
use App\Http\Controllers\Main\IndexController;

// Admin
use App\Http\Controllers\Admin\Main\AdminMainController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;

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

// Main
Route::group(['namespace' => 'Main'], function () {
   Route::get('/', [IndexController::class, 'index'])->name('home');
});


// Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [AdminMainController::class, 'index'])->name('admin.home');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category.index');
    });
});
