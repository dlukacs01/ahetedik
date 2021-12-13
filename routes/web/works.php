<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:Editor','role:Admin','auth'])->group(function(){
    Route::get('/works', 'WorkController@index')->name('work.index');
    Route::get('/works/create', 'WorkController@create')->name('work.create');
    Route::post('/works', 'WorkController@store')->name('work.store');
    Route::get('/works/{work}/edit', 'WorkController@edit')->name('work.edit');
    Route::delete('/works/{work}/destroy', 'WorkController@destroy')->name('work.destroy');
    Route::patch('/works/{work}/update', 'WorkController@update')->name('work.update');
});
