<?php

use App\Http\Controllers\MetaController;
use Illuminate\Support\Facades\Route;

Route::get('/metas', [MetaController::class, 'index'])->name('meta.index');
Route::patch('/metas/{meta}/update', [MetaController::class, 'update'])->name('meta.update');
