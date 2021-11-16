<?php

Route::get('/metas', 'MetaController@index')->name('meta.index');
Route::post('/metas', 'MetaController@store')->name('meta.store');

Route::get('/szerzoink-figyelmebe', 'MetaController@szerzoknek')->name('meta.szerzoknek');
Route::get('/szerkesztosegi-nyilatkozat', 'MetaController@nyilatkozat')->name('meta.nyilatkozat');
Route::get('/szerkesztesi-elvek', 'MetaController@elvek')->name('meta.elvek');
Route::get('/szerzoi-jogok', 'MetaController@jogok')->name('meta.jogok');
Route::get('/impresszum', 'MetaController@impresszum')->name('meta.impresszum');
Route::get('/adatvedelmi-nyilatkozat', 'MetaController@gdpr')->name('meta.gdpr');
