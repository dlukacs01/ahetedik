<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/categories/{category}/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
