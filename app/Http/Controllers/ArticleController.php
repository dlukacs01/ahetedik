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
        $articles = Article::paginate(5);
        return view('admin.articles.index', ['articles'=>$articles]);
    }
    public function create(Request $request){
        $this->authorize('create', Article::class); // POLICY

        // displaying headings based on selected post
        if($request->ajax()) {

            $headings = Heading::where('post_id','=',$request->post_id)->get();

            return view('partials.admin.headings', ['headings'=>$headings]);

        } else {
            $posts = Post::all();
            $headings = Heading::all();
            $users = User::all();
            return view('admin.articles.create', [
                'posts'=>$posts,
                'headings'=>$headings,
                'users'=>$users
            ]);
        }
    }
    public function store(){
        $this->authorize('create', Article::class); // POLICY

        $inputs = request()->validate([
            'heading_id'=>'integer',
            'title'=>'required|min:4|max:255',
            'user_id'=>'integer',
            'body'=>'required'
        ]);

        $heading = Heading::findOrFail(request('heading_id'));
        $heading->articles()->create($inputs);

        session()->flash('article-created-message', 'Az új cikk létrehozása sikeres volt ('.$inputs['title'].')');

        return redirect()->route('article.index');
    }
}
