<?php



use Illuminate\Support\Facades\Route;

// Main
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\AboutController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\ContactController;

// Admin
use App\Http\Controllers\Admin\Main\AdminMainController;
use App\Http\Controllers\Admin\Recipe\AdminRecipeController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;
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
   Route::get('/about', [AboutController::class, 'index'])->name('about');
   Route::get('/contact', [ContactController::class, 'index'])->name('contact');

   // Auth
   Route::get('/signin', [AuthController::class, 'signin'])->name('signin');
   Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
   Route::post('/signin', [AuthController::class, 'login'])->name('login');
   Route::post('/signup', [AuthController::class, 'registration'])->name('registration');
    // Выход из профиля (logout)
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [AdminMainController::class, 'index'])->name('admin.home');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user:slug}', [AdminUserController::class, 'show'])->name('admin.user.show');
        Route::get('/{user:slug}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user:slug}/', [AdminUserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{user:slug}/', [AdminUserController::class, 'delete'])->name('admin.user.delete');
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
        Route::get('/', [AdminCategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{category:slug}', [AdminCategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/{category:slug}/edit', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
        Route::patch('/{category:slug}/', [AdminCategoryController::class, 'update'])->name('admin.category.update');
        Route::delete('/{category:slug}/', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');
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
