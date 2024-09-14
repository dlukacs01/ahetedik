<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('article.store');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::patch('/articles/{article}/update', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/articles/{article}/destroy', [ArticleController::class, 'destroy'])->name('article.destroy');

