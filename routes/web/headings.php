<?php

use App\Http\Controllers\HeadingController;
use Illuminate\Support\Facades\Route;

Route::get('/headings', [HeadingController::class, 'index'])->name('heading.index');
Route::get('/headings/create', [HeadingController::class, 'create'])->name('heading.create');
Route::post('/headings', [HeadingController::class, 'store'])->name('heading.store');
Route::get('/headings/{heading}/edit', [HeadingController::class, 'edit'])->name('heading.edit');
Route::patch('/headings/{heading}/update', [HeadingController::class, 'update'])->name('heading.update');
Route::delete('/headings/{heading}/destroy', [HeadingController::class, 'destroy'])->name('heading.destroy');
