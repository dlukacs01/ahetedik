<?php

Route::get('/categories', 'CategoryController@index')->name('category.index');
Route::get('/categories/create', 'CategoryController@create')->name('category.create');
Route::post('/categories', 'CategoryController@store')->name('category.store');
Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('category.edit');
Route::patch('/categories/{category}/update', 'CategoryController@update')->name('category.update');
Route::delete('/categories/{category}/destroy', 'CategoryController@destroy')->name('category.destroy');
