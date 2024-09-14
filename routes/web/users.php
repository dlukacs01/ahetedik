<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{user}/profile', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

Route::put('/users/{user}/attach', [UserController::class, 'attach'])->name('user.role.attach');
Route::put('/users/{user}/detach', [UserController::class, 'detach'])->name('user.role.detach');
