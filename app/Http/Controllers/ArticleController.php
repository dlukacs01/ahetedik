<?php

namespace App\Http\Controllers;

use App\Article;
use App\Heading;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    // ***** CIKKEK *****

    public function index(){
        $articles = Article::orderBy('id', 'desc')->get();
        return view('admin.articles.index', ['articles' => $articles]);
    }

    public function create(Request $request){

        // POLICY
        $this->authorize('create', Article::class);

        if($request->ajax()) {

            // Displaying headings ('rovatok') based on selected post ('lapszam')
            if($request->post_id) {

                $headings = Heading::where('post_id','=',$request->post_id)->get();
                return view('partials.admin.articles.create.headings', ['headings' => $headings]);
            }

            // Displaying 'cim' or 'szerzok' field based on selected heading-type ('rovat-tipus')
            if($request->heading_id) {

                $heading = Heading::findOrFail($request->heading_id);

                if($heading->type == 'egyeb') {
                    return view('partials.admin.articles.create.cim');
                }

                if($heading->type == 'muvek') {
                    $users = User::all();
                    return view('partials.admin.articles.create.szerzok', ['users' => $users]);
                }
            }
        } else {

            $posts = Post::all();
            return view('admin.articles.create', ['posts' => $posts]);
        }
    }

    public function store(){

        // POLICY
        $this->authorize('create', Article::class);

        // VALIDATION
        request()->validate([
            'heading_id' => ['required', 'integer'],
            'title' => ['nullable', 'string', 'max:200'],
            'user_id' => ['nullable', 'integer'],
            'body' => ['required', 'string', 'max:100000']
        ]);

        // VALUES
        $inputs['heading_id'] = request('heading_id');
        $inputs['body'] = request('body');

        if(request('title')){
            $inputs['title'] = request('title');
        }

        if(request('user_id')){
            $inputs['user_id'] = request('user_id');
        }

        // SAVE, SESSION, REDIRECT
        $heading = Heading::findOrFail(request('heading_id'));
        $heading->articles()->create($inputs);
        session()->flash('created', 'A cikk létrehozása sikeres.');
        return redirect()->route('article.index');
    }

    public function edit(Article $article, Request $request){

        // POLICY
        // $this->authorize('view', $article);

        if($request->ajax()) {

            // Displaying headings ('rovatok') based on selected post ('lapszam')
            if($request->post_id) {

                $headings = Heading::where('post_id','=',$request->post_id)->get();
                $article = Article::findOrFail($request->article_id);

                return view('partials.admin.articles.edit.headings', [
                    'headings' => $headings,
                    'article' => $article
                ]);
            }

            // Displaying 'cim' or 'szerzok' field based on selected heading-type ('rovat-tipus')
            if($request->heading_id) {

                $heading = Heading::findOrFail($request->heading_id);

                if($heading->type == 'egyeb') {

                    $article = Article::findOrFail($request->article_id);
                    return view('partials.admin.articles.edit.cim', ['article' => $article]);
                }

                if($heading->type == 'muvek') {

                    $article = Article::findOrFail($request->article_id);
                    $users = User::all();

                    return view('partials.admin.articles.edit.szerzok', [
                        'article' => $article,
                        'users' => $users
                    ]);
                }
            }
        } else {

            $posts = Post::all();

            return view('admin.articles.edit', [
                'article' => $article,
                'posts' => $posts
            ]);
        }
    }

    public function update(Article $article){

        // POLICY
        // $this->authorize('update', $article);

        // VALIDATION
        request()->validate([
            'heading_id' => ['required', 'integer'],
            'user_id' => ['nullable', 'integer'],
            'title' => ['nullable', 'string', 'max:200'],
            'body' => ['required', 'string', 'max:100000']
        ]);

        // VALUES
        $article->heading_id = request('heading_id');

        if(request('title')){
            $article->title = request('title');
        }

        if(request('user_id')){
            $article->user_id = request('user_id');
        }

        $article->body = request('body');

        // SAVE, SESSION, REDIRECT
        if($article->isDirty()) {
            session()->flash('updated', 'A cikk frissítése sikeres.');
        } else {
            session()->flash('updated', 'Nem történt módosítás.');
        }

        $article->save(); // must be after session
        return redirect()->route('article.index');
    }

    public function destroy(Article $article){

        // POLICY
        $this->authorize('delete', $article);

        // SAVE, SESSION, REDIRECT
        $article->delete();
        session()->flash('deleted', 'A cikk törlése sikeres.');
        return back();
    }
}
