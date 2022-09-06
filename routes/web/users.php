<?php

Route::get('/users', 'UserController@index')->name('user.index');
Route::get('/users/create', 'UserController@create')->name('user.create');
Route::post('/users', 'UserController@store')->name('user.store');
Route::get('/users/{user}/profile', 'UserController@edit')->name('user.profile.edit');
Route::put('/users/{user}/update', 'UserController@update')->name('user.profile.update');
Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('user.destroy');

Route::put('/users/{user}/attach', 'UserController@attach')->name('user.role.attach');
Route::put('/users/{user}/detach', 'UserController@detach')->name('user.role.detach');
