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
});

Route::get('/profile', [UserController::class, 'profile'])->middleware(['auth'])->name('profile');
Route::put('/profile/save', [UserController::class, 'profileSave'])->middleware(['auth'])->name('profile-save');
Route::put('/profile/changPassword', [UserController::class, 'changePassword'])->middleware(['auth'])->name('password-change');

Route::get('/admin/article/status/{id}', [ArticleController::class, 'setStatus'])->middleware(['auth']);

//Public pages
Route::get('/home', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/article/{id}', [PagesArticleController::class, 'show']);
Route::get('/category/{id}', [PagesArticleController::class, 'index']);
Route::get('/tag/{id}', [PagesArticleController::class, 'articleForTag']);
Route::post('/search', [PagesArticleController::class, 'search']);
Route::get('/tag', [PagesArticleController::class, 'tag']);
