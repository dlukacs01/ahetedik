<?php

use Illuminate\Support\Facades\Route;

Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');

Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::middleware('role:Admin','auth')->group(function(){
    Route::get('/users', 'UserController@index')->name('user.index');
    Route::get('/users/create', 'UserController@create')->name('user.create');
    Route::post('/users', 'UserController@store')->name('user.store');
    Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
    Route::put('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');
});

// only the admin or the owner of the profile can access
// auth middleware ide nem kell, ellenoriztem, anelkul is mukodik
Route::middleware('can:view,user')->group(function(){
    Route::get('/users/{user}/profile', 'UserController@show')->name('user.profile.edit');
});
