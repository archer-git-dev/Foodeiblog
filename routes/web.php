<?php

use App\Http\Controllers\Main\UserController;
use Illuminate\Support\Facades\Route;

// Main
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\AboutController;
use App\Http\Controllers\Main\AuthController;
use App\Http\Controllers\Main\ContactController;
use App\Http\Controllers\Main\RecipeController;
use App\Http\Controllers\Main\CommentController;
use App\Http\Controllers\Main\MessagesController;

// Admin
use App\Http\Controllers\Admin\Main\AdminMainController;
use App\Http\Controllers\Admin\Recipe\AdminRecipeController;
use App\Http\Controllers\Admin\UserRecipe\AdminUserRecipeController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Category\AdminCategoryController;
use App\Http\Controllers\Admin\Tag\AdminTagController;
use App\Http\Controllers\Admin\Comment\AdminCommentController;
use App\Http\Controllers\Admin\Newsletter\AdminNewsletterController;
use App\Http\Controllers\Admin\Message\AdminMessageController;



// Parser
use App\Http\Controllers\Main\RecipeParserController;

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

    // Profile
    Route::group(['prefix' => 'user/{user:slug}', 'middleware' => ['auth', 'is_user']], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.profile');
        Route::get('/recipes/is-publication', [UserController::class, 'publicationRecipes'])->name('user.recipes.publication');
        Route::get('/recipes/not-publication', [UserController::class, 'notPublicationRecipes'])->name('user.recipes.not-publication');
        Route::get('/recipes/create', [UserController::class, 'create'])->name('user.recipes.create');
        Route::post('/recipes/store', [UserController::class, 'store'])->name('user.recipes.store');
        Route::get('/recipes/edit/{recipe:slug}', [UserController::class, 'edit'])->name('user.recipes.edit');
        Route::patch('/recipes/update/{recipe:slug}', [UserController::class, 'update'])->name('user.recipes.update');
        Route::delete('/recipes/delete/{recipe:slug}', [UserController::class, 'delete'])->name('user.recipes.delete');
    });

    // Auth
    Route::get('/signin/', [AuthController::class, 'signin'])->name('signin');
    Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
    Route::post('/signin', [AuthController::class, 'login'])->name('login');
    Route::post('/signup', [AuthController::class, 'registration'])->name('registration');
    // Выход из профиля (logout)
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    // Забыли пароль
    Route::get('/forget', [AuthController::class, 'forget'])->name('forget');
    Route::post('/restore', [AuthController::class, 'restore'])->name('restore');
    Route::get('/restore-password/{user:remember_token}', [AuthController::class, 'restorePasswordPage'])->name('restore-password-page');
    Route::post('/restore-password/{user:remember_token}', [AuthController::class, 'restorePassword'])->name('restore-password');
    Route::get('/verify/', [AuthController::class, 'verify'])->name('verify.page');
    Route::get('/verify/{user:remember_token}', [AuthController::class, 'verified'])->name('verified');


    // Recipes
    Route::get('/recipes', [RecipeController::class, 'getAllRecipes'])->name('recipes');
    Route::get('/recipes/{category:slug}', [RecipeController::class, 'getRecipesByCategory'])->name('recipes.category');
    Route::get('/recipe/{recipe:slug}', [RecipeController::class, 'getRecipe'])->name('recipe');


    // Comments
    Route::post('/recipe/{recipe:slug}/comment', [CommentController::class, 'store'])->name('recipe.comment.create');
    Route::delete('/recipe/{comment}/delete', [CommentController::class, 'delete'])->name('recipe.comment.delete');

    // Messages
    Route::post('/contact/message', [MessagesController::class, 'store'])->name('contact.message');

    // Newsletter
    Route::post('/newsletter', [IndexController::class, 'store'])->name('newsletter');

    // Recipe parser
    Route::get('parser', [RecipeParserController::class, 'collectData']);
});


// Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', [AdminMainController::class, 'index'])->name('admin.home');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.create');
        Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.store');
        Route::get('/delete-not-verified', [AdminUserController::class, 'deleteNotVerified'])->name('admin.user.not_verified');
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

    Route::group(['namespace' => 'UserRecipe', 'prefix' => 'user-recipes'], function () {
        Route::get('/', [AdminUserRecipeController::class, 'index'])->name('admin.user-recipe.index');
        Route::get('/{recipe:slug}', [AdminUserRecipeController::class, 'show'])->name('admin.user-recipe.show');
        Route::post('/{recipe:slug}/published', [AdminUserRecipeController::class, 'published'])->name('admin.user-recipe.published');
        Route::post('/{recipe:slug}/feedback', [AdminUserRecipeController::class, 'feedback'])->name('admin.user-recipe.feedback');
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

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', [AdminCommentController::class, 'index'])->name('admin.comment.index');
        Route::patch('/{comment}/', [AdminCommentController::class, 'update'])->name('admin.comment.update');
        Route::delete('/{comment}/', [AdminCommentController::class, 'delete'])->name('admin.comment.delete');
    });

    Route::group(['namespace' => 'Message', 'prefix' => 'messages'], function () {
        Route::get('/', [AdminMessageController::class, 'index'])->name('admin.message.index');
        Route::get('/{message}/edit', [AdminMessageController::class, 'edit'])->name('admin.message.edit');
        Route::patch('/{message}/edit', [AdminMessageController::class, 'update'])->name('admin.message.update');
        Route::delete('/{message}/delete', [AdminMessageController::class, 'delete'])->name('admin.message.delete');
    });

    Route::group(['namespace' => 'Newsletter', 'prefix' => 'newsletters'], function () {
        Route::get('/', [AdminNewsLetterController::class, 'index'])->name('admin.newsletter.index');
        Route::get('/create', [AdminNewsLetterController::class, 'create'])->name('admin.newsletter.create');
        Route::post('/store', [AdminNewsLetterController::class, 'store'])->name('admin.newsletter.store');
        Route::delete('/{newsletter}/', [AdminNewsLetterController::class, 'delete'])->name('admin.newsletter.delete');
    });
});
