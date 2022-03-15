<?php

namespace App\Http\Controllers;

use App\Article;
use App\Heading;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    public function index(){
        Carbon::setLocale('hu');
        $articles = Article::orderBy('id','DESC')->paginate(10);
        return view('admin.articles.index', ['articles'=>$articles]);
    }
    public function create(Request $request){
        $this->authorize('create', Article::class); // POLICY

        // displaying headings based on selected post
        if($request->ajax()) {

            if($request->post_id) {
                $headings = Heading::where('post_id','=',$request->post_id)->get();
                return view('partials.admin.articles.create.headings', ['headings'=>$headings]);
            }
            if($request->heading_id) {
                $heading = Heading::findOrFail($request->heading_id);
                if($heading->type == 'egyeb') {
                    return view('partials.admin.articles.create.cim');
                }
                if($heading->type == 'muvek') {
                    $users = User::all();
                    return view('partials.admin.articles.create.szerzok', ['users'=>$users]);
                }
            }

        } else {
            $posts = Post::all();
            return view('admin.articles.create', ['posts'=>$posts]);
        }
    }
    public function store(){
        $this->authorize('create', Article::class); // POLICY

        // TODO user_id title
        $inputs = request()->validate([
            'heading_id'=>'required|integer',
            'body'=>'required|string'
        ]);

        if(request('title')){
            $inputs['title'] = request('title');
        }
        if(request('user_id')){
            $inputs['user_id'] = request('user_id');
        }

        $heading = Heading::findOrFail(request('heading_id'));
        $heading->articles()->create($inputs);

        session()->flash('article-created-message', 'Az új cikk létrehozása sikeres volt');

        return redirect()->route('article.index');
    }
    public function edit(Article $article, Request $request){
        // TODO check
        // $this->authorize('view', $article); // POLICY

        if($request->ajax()) {
            if($request->post_id) {
                $headings = Heading::where('post_id','=',$request->post_id)->get();
                $article = Article::findOrFail($request->article_id);
                return view('partials.admin.articles.edit.headings', [
                    'headings'=>$headings,
                    'article'=>$article
                ]);
            }
            if($request->heading_id) {
                $heading = Heading::findOrFail($request->heading_id);
                if($heading->type == 'egyeb') {
                    $article = Article::findOrFail($request->article_id);
                    return view('partials.admin.articles.edit.cim',['article'=>$article]);
                }
                if($heading->type == 'muvek') {
                    $article = Article::findOrFail($request->article_id);
                    $users = User::all();
                    return view('partials.admin.articles.edit.szerzok', [
                        'article'=>$article,
                        'users'=>$users
                    ]);
                }
            }
        } else {
            $posts = Post::all();
            return view('admin.articles.edit', [
                'article'=>$article,
                'posts'=>$posts
            ]);
        }
    }
    public function update(Article $article){
        // TODO user_id title
        $inputs = request()->validate([
            'heading_id'=>'required|integer',
            'body'=>'required|string'
        ]);

        $article->heading_id = $inputs['heading_id'];

        if(request('title')){
            $article->title = request('title');
        }
        if(request('user_id')){
            $article->user_id = request('user_id');
        }

        $article->body = $inputs['body'];

        // TODO check
        // $this->authorize('update', $article); // POLICY

        $article->save();

        session()->flash('article-updated-message', 'A cikk frissítése sikeres volt');

        return redirect()->route('article.index');
    }
    public function destroy(Article $article, Request $request){
        // TODO check
        // $this->authorize('delete', $article); // POLICY

        $article->delete();
        $request->session()->flash('message', 'A cikk törlése sikeres volt');
        return back();
    }
}
