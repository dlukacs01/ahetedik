<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //

    public function index(){
        Carbon::setLocale('hu');
        // $posts = Post::all();
        $posts = auth()->user()->posts()->orderBy('id','DESC')->paginate(10);
        return view('admin.posts.index', ['posts'=>$posts]);
    }
    // route model binding (getting the post directly, instead of post id)
    public function show($post_slug){
        Carbon::setLocale('hu');
        $post = Post::where('slug', $post_slug)->first();
        return view('blog-post', ['post'=>$post]);
    }
    public function create(){
        $this->authorize('create', Post::class); // POLICY
        return view('admin.posts.create');
    }
    public function store(){
        $this->authorize('create', Post::class); // POLICY

        // body => required
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'active'=>'integer'
        ]);

        $inputs['slug'] = Str::of(Str::lower(request('title')))->slug('-');

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Az új lapszám létrehozása sikeres volt ('.$inputs['title'].')');

        return redirect()->route('post.index');
    }
    public function edit(Post $post){
        $this->authorize('view', $post); // POLICY
//        if(auth()->user()->can('view', $post)) {
//
//        }
        return view('admin.posts.edit', ['post'=>$post]);
    }
    public function destroy(Post $post, Request $request){
        $this->authorize('delete', $post); // POLICY
        $post->delete();
        $request->session()->flash('message', 'A lapszám törlése sikeres volt');
        return back();
    }
    public function update(Post $post){
        // body => required
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'active'=>'integer'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        // $post->body = $inputs['body'];
        $post->active = $inputs['active'];

        $this->authorize('update', $post); // POLICY

        $post->save();

        session()->flash('post-updated-message', 'A lapszám frissítése sikeres volt ('.$inputs['title'].')');

        return redirect()->route('post.index');
    }
}
