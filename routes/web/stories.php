<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;

Route::get('/stories', [StoryController::class, 'index'])->name('story.index');
Route::get('/stories/create', [StoryController::class, 'create'])->name('story.create');
Route::post('/stories', [StoryController::class, 'store'])->name('story.store');
Route::get('/stories/{story}/edit', [StoryController::class, 'edit'])->name('story.edit');
Route::patch('/stories/{story}/update', [StoryController::class, 'update'])->name('story.update');
Route::delete('/stories/{story}/destroy', [StoryController::class, 'destroy'])->name('story.destroy');
