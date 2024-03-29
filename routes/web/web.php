<?php

use Illuminate\Support\Facades\Route;

// Auth::routes();
Auth::routes(['register' => false]); // DISABLE REGISTRATION

/**************************/
/* HOME */
/**************************/

Route::get('/', 'HomeController@index')->name('home');
Route::get('/kereses', 'HomeController@search')->name('home.search');

/**************************/
/* ADMIN */
/**************************/

Route::middleware('auth')->group(function(){
    Route::get('/admin', 'AdminsController@index')->name('admin.index');
});

/**************************/
/* POSTS */
/**************************/

Route::get('/lapszamok', 'PostController@posts')->name('post.posts');
Route::get('/lapszamok/{post_slug}', 'PostController@show')->name('post');

/**************************/
/* STORIES */
/**************************/

Route::get('/hirek', 'StoryController@stories')->name('story.stories');
Route::get('/hirek/{story_slug}', 'StoryController@show')->name('story');

/**************************/
/* CATEGORIES */
/**************************/

Route::get('/kategoriak', 'CategoryController@categories')->name('category.categories');

/**************************/
/* WORKS */
/**************************/

Route::get('/kategoriak/{category_slug}', 'WorkController@works')->name('work.works');
Route::get('/muvek/{work_slug}/mu-{work_id}', 'WorkController@show')->name('work');

/**************************/
/* USERS */
/**************************/

Route::get('/szerzok', 'UserController@authors')->name('user.authors');
Route::get('/szerzok/{username}', 'UserController@show')->name('user.show');

/**************************/
/* METAS */
/**************************/

Route::get('/szerzoink-figyelmebe', 'MetaController@szerzoknek')->name('meta.szerzoknek');

Route::get('/szerkesztosegi-nyilatkozat', 'MetaController@nyilatkozat')->name('meta.nyilatkozat');
Route::get('/szerkesztesi-elvek', 'MetaController@elvek')->name('meta.elvek');
Route::get('/szerzoi-jogok', 'MetaController@jogok')->name('meta.jogok');
Route::get('/impresszum', 'MetaController@impresszum')->name('meta.impresszum');
Route::get('/adatvedelmi-nyilatkozat', 'MetaController@gdpr')->name('meta.gdpr');

/**************************/
/* PARSER */
/**************************/

// Route::get('/parser/authors', 'ParserController@authors')->name('parser.authors');
// Route::get('/parser/links', 'ParserController@links')->name('parser.links');
// Route::get('/parser/categories', 'ParserController@categories')->name('parser.categories');
// Route::get('/parser', 'ParserController@parser')->name('parser');

/**************************/
/* OTHER */
/**************************/

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// MIDDLEWARE CAN VIEW POLICY EXAMPLE
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
