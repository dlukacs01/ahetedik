<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['role:Editor','role:Admin','auth'])->group(function(){
    Route::get('/stories', 'StoryController@index')->name('story.index');
    Route::get('/stories/create', 'StoryController@create')->name('story.create');
    Route::post('/stories', 'StoryController@store')->name('story.store');
    Route::get('/stories/{story}/edit', 'StoryController@edit')->name('story.edit');
    Route::delete('/stories/{story}/destroy', 'StoryController@destroy')->name('story.destroy');
    Route::patch('/stories/{story}/update', 'StoryController@update')->name('story.update');
});
