<?php

Route::get('/metas', 'MetaController@index')->name('meta.index');
Route::patch('/metas/{meta}/update', 'MetaController@update')->name('meta.update');
