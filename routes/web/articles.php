<?php

Route::get('/articles', 'ArticleController@index')->name('article.index');
Route::get('/articles/create', 'ArticleController@create')->name('article.create');
Route::post('/articles', 'ArticleController@store')->name('article.store');
Route::get('/articles/{article}/edit', 'ArticleController@edit')->name('article.edit');
Route::patch('/articles/{article}/update', 'ArticleController@update')->name('article.update');
Route::delete('/articles/{article}/destroy', 'ArticleController@destroy')->name('article.destroy');

