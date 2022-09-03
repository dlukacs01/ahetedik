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

    // ***** LAPSZAMOK *****

    public function posts() {
        Carbon::setLocale('hu');
        $posts = Post::where('active',0)->orderBy('id', 'desc')->paginate(10);
        return view('posts', ['posts' => $posts]);
    }

    public function show($post_slug) {
        Carbon::setLocale('hu');
        $post = Post::where('slug', $post_slug)->first();
        return view('blog-post', ['post' => $post]);
    }

    public function index() {
        Carbon::setLocale('hu');
        $posts = Post::orderBy('id','DESC')->get();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create() {

        // POLICY
        $this->authorize('create', Post::class);

        return view('admin.posts.create');
    }

    public function store() {

        // POLICY
        $this->authorize('create', Post::class);

        // VALIDATION
        request()->validate([
            'title' => ['required', 'string', 'max:30'],
            'post_image' => ['required', 'image'],
            'active' => ['required', 'integer']
        ]);

        // VALUES
        $inputs['title'] = request('title');
        $inputs['slug'] = Str::of(Str::lower(request('title')))->slug('-');

        if(request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }

        $inputs['active'] = request('active');

        // SAVE, SESSION, REDIRECT
        auth()->user()->posts()->create($inputs);
        session()->flash('created', 'A lapszám létrehozása sikeres.');
        return redirect()->route('post.index');
    }

    public function edit(Post $post) {

        // POLICY
        $this->authorize('view', $post);

        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) {

        // POLICY
        $this->authorize('update', $post);

        // VALIDATION
        request()->validate([
            'title' => ['required', 'string', 'max:30'],
            'post_image' => ['required', 'image'],
            'active' => ['required', 'integer']
        ]);

        // VALUES
        $post->title = request('title');
        $post->slug = Str::of(Str::lower(request('title')))->slug('-');

        if(request('post_image')){
            $post->post_image = request('post_image')->store('images');
        }

        $post->active = request('active');

        // SAVE, SESSION, REDIRECT
        if($post->isDirty()) {
            session()->flash('updated', 'A lapszám frissítése sikeres.');
        } else {
            session()->flash('updated', 'Nem történt módosítás.');
        }

        $post->save(); // must be after session
        return redirect()->route('post.index');
    }

    public function destroy(Post $post) {

        // POLICY
        $this->authorize('delete', $post);

        // SAVE, SESSION, REDIRECT
        $post->delete();
        session()->flash('deleted', 'A lapszám törlése sikeres.');
        return back();
    }
}
