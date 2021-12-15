<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/lapszamok', 'HomeController@index_all')->name('home.all');
Route::get('/kereses', 'HomeController@search')->name('home.search');
Route::get('/szerzoink-figyelmebe', 'HomeController@szerzoknek')->name('home.szerzoknek');

Route::get('/szerkesztosegi-nyilatkozat', 'HomeController@nyilatkozat')->name('home.nyilatkozat');
Route::get('/szerkesztesi-elvek', 'HomeController@elvek')->name('home.elvek');
Route::get('/szerzoi-jogok', 'HomeController@jogok')->name('home.jogok');
Route::get('/impresszum', 'HomeController@impresszum')->name('home.impresszum');
Route::get('/adatvedelmi-nyilatkozat', 'HomeController@gdpr')->name('home.gdpr');

Route::get('/kategoriak', 'CategoryController@index_front')->name('category.front.index');
Route::get('/kategoriak/{category_slug}', 'WorkController@work_category')->name('work.category');
Route::get('/lapszamok/{post_slug}', 'PostController@show')->name('post'); // route model binding (post instead of post id)
Route::get('/muvek/{work_slug}', 'WorkController@show')->name('work');
Route::get('/hirek/{story_slug}', 'StoryController@show')->name('story');
Route::get('/szerzok', 'UserController@index_front')->name('user.front.index'); // view all users in front
Route::get('/szerzok/{username}', 'UserController@show')->name('user.profile.show'); // user profile page in front

Route::middleware('auth')->group(function(){
    Route::get('/admin', 'AdminsController@index')->name('admin.index');
});

// POLICY
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
