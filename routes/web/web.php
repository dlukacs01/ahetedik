<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/szerzoknek', 'HomeController@szerzoknek')->name('home.szerzoknek');
Route::get('/categories', 'CategoryController@index_front')->name('category.front.index');
Route::get('/categories/{category_slug}', 'WorkController@work_category')->name('work.category');
Route::get('/cikkek/{post_slug}', 'PostController@show')->name('post'); // route model binding (post instead of post id)
Route::get('/work/{work_slug}', 'WorkController@show')->name('work');
Route::get('/szerzok', 'UserController@index_front')->name('user.front.index'); // view all users in front
Route::get('/szerzok/{username}', 'UserController@show')->name('user.profile.show'); // user profile page in front

Route::middleware('auth')->group(function(){
    Route::get('/admin', 'AdminsController@index')->name('admin.index');
});

// POLICY
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
