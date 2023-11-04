<?php

Route::get('/works', 'WorkController@index')->name('work.index');
Route::get('/works/create', 'WorkController@create')->name('work.create');
Route::post('/works', 'WorkController@store')->name('work.store');
Route::get('/works/{work}/edit', 'WorkController@edit')->name('work.edit');
Route::patch('/works/{work}/update', 'WorkController@update')->name('work.update');
Route::delete('/works/{work}/destroy', 'WorkController@destroy')->name('work.destroy');

Route::get('/search', 'WorkController@search')->name('work.search');
