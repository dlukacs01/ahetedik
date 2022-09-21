<?php

namespace App\Http\Controllers;

use App\Heading;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    //

    // ***** ROVATOK *****

    public function index(){
        $headings = Heading::orderBy('id', 'desc')->get();
        return view('admin.headings.index', ['headings' => $headings]);
    }

    public function create(){

        // POLICY
        $this->authorize('create', Heading::class);

        $posts = Post::all();
        return view('admin.headings.create', ['posts' => $posts]);
    }

    public function store(){

        // POLICY
        $this->authorize('create', Heading::class);

        // VALIDATION
        request()->validate([
            'post_id' => ['required', 'integer'],
            'type' => ['required', 'string', 'max:30'],
            'title' => ['required', 'string', 'max:30']
        ]);

        // VALUES
        $inputs['post_id'] = request('post_id');
        $inputs['type'] = request('type');
        $inputs['title'] = request('title');

        // SAVE, SESSION, REDIRECT
        $post = Post::findOrFail(request('post_id'));
        $post->headings()->create($inputs);
        session()->flash('created', 'A rovat létrehozása sikeres.');
        return redirect()->route('heading.index');
    }

    public function edit(Heading $heading){

        // POLICY
        $this->authorize('view', $heading);

        $posts = Post::all();
        return view('admin.headings.edit', [
            'heading' => $heading,
            'posts' => $posts
        ]);
    }

    public function update(Heading $heading){

        // POLICY
        $this->authorize('update', $heading);

        // VALIDATION
        request()->validate([
            'post_id' => ['required', 'integer'],
            'type' => ['required', 'string', 'max:30'],
            'title' => ['required', 'string', 'max:30']
        ]);

        // VALUES
        $heading->post_id = request('post_id');
        $heading->type = request('type');
        $heading->title = request('title');

        // SAVE, SESSION, REDIRECT
        if($heading->isDirty()) {
            session()->flash('updated', 'A rovat frissítése sikeres.');
        } else {
            session()->flash('updated', 'Nem történt módosítás.');
        }

        $heading->save(); // must be after session
        return redirect()->route('heading.index');
    }

    public function destroy(Heading $heading, Request $request){

        // POLICY
        $this->authorize('delete', $heading);

        // SAVE, SESSION, REDIRECT
        $heading->delete();
        session()->flash('deleted', 'A rovat törlése sikeres.');
        return back();
    }
}
