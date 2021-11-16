<?php

Route::get('/metas', 'MetaController@index')->name('meta.index');
Route::post('/metas', 'MetaController@store')->name('meta.store');
