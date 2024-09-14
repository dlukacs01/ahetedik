<?php

use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('/works', [WorkController::class, 'index'])->name('work.index');
Route::get('/works/create', [WorkController::class, 'create'])->name('work.create');
Route::post('/works', [WorkController::class, 'store'])->name('work.store');
Route::get('/works/{work}/edit', [WorkController::class, 'edit'])->name('work.edit');
Route::patch('/works/{work}/update', [WorkController::class, 'update'])->name('work.update');
Route::delete('/works/{work}/destroy', [WorkController::class, 'destroy'])->name('work.destroy');

Route::get('/search', [WorkController::class, 'search'])->name('work.search');
