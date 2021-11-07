<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(){
        // $posts = Post::all();
        $posts = auth()->user()->posts()->paginate(5);
        return view('admin.posts.index', ['posts'=>$posts]);
    }
    // route model binding (getting the post directly, instead of post id)
    public function show(Post $post){
        return view('blog-post', ['post'=>$post]);
    }
    public function create(){
        $this->authorize('create', Post::class); // POLICY
        return view('admin.posts.create');
    }
    public function store(){
        $this->authorize('create', Post::class); // POLICY

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-created-message', 'Post with title '.$inputs['title'].' was created');

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
        $request->session()->flash('message', 'Post was deleted');
        return back();
    }
    public function update(Post $post){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'post_image'=>'file',
            'body'=>'required'
        ]);

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        $this->authorize('update', $post); // POLICY

        $post->save();

        session()->flash('post-updated-message', 'Post with title '.$inputs['title'].' was updated');

        return redirect()->route('post.index');
    }
}
