<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Pages\ArticleController as PagesArticleController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/admin/dashboard/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth'],
], function () {
    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/profile/save', [UserController::class, 'profileSave'])->name('profile-save');
    Route::put('/profile/changPassword', [UserController::class, 'changePassword'])->name('password-change');
    Route::get('/article/status/{id}', [ArticleController::class, 'setStatus'])->name('article.status');
});


//Public pages
Route::controller(HomeController::class)
    ->name('public.')
    ->group(function () {
        Route::get('/home', 'index')->name('home');
        Route::get('/contact', 'contact')->name('contact');
    });

Route::controller(PagesArticleController::class)
    ->name('public.')
    ->group(function () {
        Route::get('/article/{slug}', 'show')->name('article.show');
        Route::get('/category/{slug:slug}', 'getArticlesByCategory')->name('category.index');
        Route::get('/tag/{slug}', 'getArticlesByTag')->name('tag.article');
        Route::get('/search', 'searchArticles')->name('search');
        Route::get('/tag', 'tag')->name('tag');
    });
