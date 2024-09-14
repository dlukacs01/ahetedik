<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

// Auth::routes();
Auth::routes(['register' => false]); // DISABLE REGISTRATION

/**************************/
/* HOME */
/**************************/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kereses', [HomeController::class, 'search'])->name('home.search');

/**************************/
/* ADMIN */
/**************************/

Route::middleware('auth')->group(function(){
    Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');
});

/**************************/
/* POSTS */
/**************************/

Route::get('/lapszamok', [PostController::class, 'posts'])->name('post.posts');
Route::get('/lapszamok/{post_slug}', [PostController::class, 'show'])->name('post');

/**************************/
/* STORIES */
/**************************/

Route::get('/hirek', [StoryController::class, 'stories'])->name('story.stories');
Route::get('/hirek/{story_slug}', [StoryController::class, 'show'])->name('story');

/**************************/
/* CATEGORIES */
/**************************/

Route::get('/kategoriak', [CategoryController::class, 'categories'])->name('category.categories');

/**************************/
/* WORKS */
/**************************/

Route::get('/kategoriak/{category_slug}', [WorkController::class, 'works'])->name('work.works');
Route::get('/muvek/{work_slug}/mu-{work_id}', [WorkController::class, 'show'])->name('work');

/**************************/
/* USERS */
/**************************/

Route::get('/szerzok', [UserController::class, 'authors'])->name('user.authors');
Route::get('/szerzok/{username}', [UserController::class, 'show'])->name('user.show');

/**************************/
/* METAS */
/**************************/

Route::get('/szerzoink-figyelmebe', [MetaController::class, 'szerzoknek'])->name('meta.szerzoknek');

Route::get('/szerkesztosegi-nyilatkozat', [MetaController::class, 'nyilatkozat'])->name('meta.nyilatkozat');
Route::get('/szerkesztesi-elvek', [MetaController::class, 'elvek'])->name('meta.elvek');
Route::get('/szerzoi-jogok', [MetaController::class, 'jogok'])->name('meta.jogok');
Route::get('/impresszum', [MetaController::class, 'impresszum'])->name('meta.impresszum');
Route::get('/adatvedelmi-nyilatkozat', [MetaController::class, 'gdpr'])->name('meta.gdpr');

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
    Lfm::routes();
});

// MIDDLEWARE CAN VIEW POLICY EXAMPLE
// Route::get('/admin/posts/{post}/edit', 'PostController@edit')->middleware('can:view,post')->name('post.edit');
