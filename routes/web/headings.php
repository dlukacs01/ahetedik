<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function(){
    Route::get('/headings', 'HeadingController@index')->name('heading.index');
    Route::get('/headings/create', 'HeadingController@create')->name('heading.create');
    Route::post('/headings', 'HeadingController@store')->name('heading.store');
    Route::get('/headings/{heading}/edit', 'HeadingController@edit')->name('heading.edit');
    Route::delete('/headings/{heading}/destroy', 'HeadingController@destroy')->name('heading.destroy');
    Route::patch('/headings/{heading}/update', 'HeadingController@update')->name('heading.update');
});
