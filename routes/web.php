<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlockController;
use App\Http\Controllers\DocController;
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
Route::redirect('/', '/ru');
Route::group(['prefix' => '{language}'], function () {
    Route::resource('articles', ArticleController::class) -> only('show');
    Route::get('/', [PageController::class, 'home']) -> name('home.page');
    Route::get('/category/{category}', [PageController::class, 'category']) -> name('category.page');
    Route::get('/section/{section}', [PageController::class, 'section']) -> name('section.page');
    Route::get('/videos', [PageController::class, 'videos']) -> name('video.page');
    Route::get('/authors/{author}', [PageController::class, 'author']) -> name('author.page');

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'login'])->name('admin.login.page');
        Route::post('/auth', [AdminController::class, 'auth'])->name('admin.auth');
        Route::middleware(['route.guard'])->group(function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard.page');
            Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
            Route::resource('articles', ArticleController::class)->except('show');
            Route::resource('authors', AuthorController::class)->except('show');
            Route::resource('blocks', BlockController::class)->except('show');
            Route::resource('docs', DocController::class)->only('store', 'destroy');
            // TODO: custom route
            Route::post('/set-article-categories/{article}', [ArticleController::class, 'setArticleCategories'])->name('setArticleCategories');
            Route::get('/delete-article-categories/{article}/{category}', [ArticleController::class, 'deleteArticleCategories'])->name('deleteArticleCategories');
            Route::post('/set-article-author/{article}', [ArticleController::class, 'setArticleAuthor'])->name('setArticleAuthor');
        });
    });
});


