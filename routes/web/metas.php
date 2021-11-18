<?php

Route::get('/metas', 'MetaController@index')->name('meta.index');
Route::put('/metas/{meta}/update', 'MetaController@update')->name('meta.update');
