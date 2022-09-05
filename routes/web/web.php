<?php

use Illuminate\Support\Facades\Route;

// Auth::routes();
Auth::routes(['register' => true]); // DISABLE REGISTRATION

Route::get('/', 'HomeController@index')->name('home');
Route::get('/lapszamok', 'PostController@posts')->name('home.all');
Route::get('/hirek', 'StoryController@stories')->name('home.all.stories');
Route::get('/kereses', 'HomeController@search')->name('home.search');
Route::get('/szerzoink-figyelmebe', 'MetaController@szerzoknek')->name('home.szerzoknek');

Route::get('/szerkesztosegi-nyilatkozat', 'MetaController@nyilatkozat')->name('home.nyilatkozat');
Route::get('/szerkesztesi-elvek', 'MetaController@elvek')->name('home.elvek');
Route::get('/szerzoi-jogok', 'MetaController@jogok')->name('home.jogok');
Route::get('/impresszum', 'MetaController@impresszum')->name('home.impresszum');
Route::get('/adatvedelmi-nyilatkozat', 'MetaController@gdpr')->name('home.gdpr');

Route::get('/kategoriak', 'CategoryController@categories')->name('category.front.index');
Route::get('/kategoriak/{category_slug}', 'WorkController@works')->name('work.category');
Route::get('/lapszamok/{post_slug}', 'PostController@show')->name('post'); // route model binding (post instead of post id)
Route::get('/muvek/{work_slug}/mu-{work_id}', 'WorkController@show')->name('work');
Route::get('/hirek/{story_slug}', 'StoryController@show')->name('story');
Route::get('/szerzok', 'UserController@authors')->name('user.authors'); // view all users in front
Route::get('/szerzok/{username}', 'UserController@show')->name('user.profile.show'); // user profile page in front

Route::middleware('auth')->group(function(){
    Route::get('/admin', 'AdminsController@index')->name('admin.index');
});

// POLICY
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
