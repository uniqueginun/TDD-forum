<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PublicArticleController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::middleware(['auth'])->group(function() {
   Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
   Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store');
   Route::post('articles/{article}/vote', [ArticleController::class, 'vote'])->name('articles.vote');
});

Route::get('articles/{article}', PublicArticleController::class)->name('articles.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
