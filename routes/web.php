<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Site\HomeController;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('article/{id}', function(Article $article) {
    return view('site.pages.article.index', compact('article'));
})->name('article');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('/home');
    Route::resource('articles', ArticleController::class)->parameters(['id' => 'article']);
    Route::resource('categories', CategoryController::class)->except('show')->parameters(['id' => 'category']);
    Route::resource('tags', TagController::class)->except('show')->parameters(['id' => 'tag']);
});

// Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
