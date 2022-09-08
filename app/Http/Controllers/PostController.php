<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //

    // ***** LAPSZAMOK *****

    public function posts() {

        $title = config('app.name') . " &mdash; Korábbi lapszámok";

        $posts = Post::where('active', 0)
            ->where('status', 'eles')
            ->orderBy('release_date', 'desc')
            ->paginate(config('custom.home.posts.pagination.items_per_page'));

        return view('posts', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    public function show($post_slug) {

        $post = Post::where('slug', $post_slug)->first();
        $title = config('app.name') . " &mdash; " . $post->title;

        return view('post', [
            'post' => $post,
            'title' => $title
        ]);
    }

    public function index() {
        $posts = Post::orderBy('status', 'desc')
            ->orderBy('release_date', 'desc')
            ->paginate(config('custom.admin.tables.pagination.items_per_page'));
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
            'release_date' => ['required', 'date'],
            'post_image' => ['required', 'image'],
            'active' => ['required', 'integer']
        ]);

        // VALUES
        $inputs['title'] = request('title');
        $inputs['slug'] = Str::of(Str::lower(request('title')))->slug('-');

        $inputs['release_date'] = request('release_date');

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
            'release_date' => ['required', 'date'],
            'post_image' => ['nullable', 'image'],
            'status' => ['required', 'string', 'max:30'],
            'active' => ['required', 'integer']
        ]);

        // VALUES
        $post->title = request('title');
        $post->slug = Str::of(Str::lower(request('title')))->slug('-');

        $post->release_date = request('release_date');

        if(request('post_image')){
            $post->post_image = request('post_image')->store('images');
        }

        $post->status = request('status');
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
