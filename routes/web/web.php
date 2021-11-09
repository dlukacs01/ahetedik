<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/categories', 'CategoryController@index_front')->name('category.front.index');
Route::get('/categories/{category_slug}', 'WorkController@work_category')->name('work.category');
Route::get('/post/{post}', 'PostController@show')->name('post'); // route model binding (post instead of post id)
Route::get('/work/{work_slug}', 'WorkController@show')->name('work');

Route::middleware('auth')->group(function(){
    Route::get('/admin', 'AdminsController@index')->name('admin.index');
});

// POLICY
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
