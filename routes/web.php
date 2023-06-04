<?php



use Illuminate\Support\Facades\Route;

// Main
use App\Http\Controllers\Main\IndexController;

// Admin
use App\Http\Controllers\Admin\Main\AdminMainController;
use App\Http\Controllers\Admin\Recipe\AdminRecipeController;
use App\Http\Controllers\Admin\Category\AdminUserController;
use App\Http\Controllers\Admin\Tag\AdminTagController;


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

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', [AdminuserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [AdminuserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [AdminuserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user:slug}', [AdminuserController::class, 'show'])->name('admin.user.show');
        Route::get('/{user:slug}/edit', [AdminuserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user:slug}/', [AdminuserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user:slug}/', [AdminuserController::class, 'delete'])->name('admin.user.delete');
    });


    Route::group(['namespace' => 'Recipe', 'prefix' => 'recipes'], function () {
        Route::get('/', [AdminRecipeController::class, 'index'])->name('admin.recipe.index');
        Route::get('/create', [AdminRecipeController::class, 'create'])->name('admin.recipe.create');
        Route::post('/store', [AdminRecipeController::class, 'store'])->name('admin.recipe.store');
        Route::get('/{recipe:slug}', [AdminRecipeController::class, 'show'])->name('admin.recipe.show');
        Route::get('/{recipe:slug}/edit', [AdminRecipeController::class, 'edit'])->name('admin.recipe.edit');
        Route::patch('/{recipe:slug}/', [AdminRecipeController::class, 'update'])->name('admin.recipe.update');
        Route::delete('/{recipe:slug}/', [AdminRecipeController::class, 'delete'])->name('admin.recipe.delete');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('admin.category.store');
        Route::get('/{category:slug}', [AdminUserController::class, 'show'])->name('admin.category.show');
        Route::get('/{category:slug}/edit', [AdminUserController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category:slug}/', [AdminUserController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category:slug}/', [AdminUserController::class, 'delete'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', [AdminTagController::class, 'index'])->name('admin.tag.index');
        Route::get('/create', [AdminTagController::class, 'create'])->name('admin.tag.create');
        Route::post('/store', [AdminTagController::class, 'store'])->name('admin.tag.store');
        Route::get('/{tag:slug}', [AdminTagController::class, 'show'])->name('admin.tag.show');
        Route::get('/{tag:slug}/edit', [AdminTagController::class, 'edit'])->name('admin.tag.edit');
        Route::patch('/{tag:slug}/', [AdminTagController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{tag:slug}/', [AdminTagController::class, 'delete'])->name('admin.tag.delete');
    });
});
