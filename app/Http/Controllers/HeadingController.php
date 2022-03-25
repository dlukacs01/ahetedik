<?php

namespace App\Http\Controllers;

use App\Heading;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    //

    public function index(){
        Carbon::setLocale('hu');
        // $headings = Heading::orderBy('id','DESC')->paginate(10);
        $headings = Heading::orderBy('id','DESC')->get();
        return view('admin.headings.index', ['headings'=>$headings]);
    }
    public function create(){
        $this->authorize('create', Heading::class); // POLICY
        $posts = Post::all();
        return view('admin.headings.create', ['posts'=>$posts]);
    }
    public function store(){
        $this->authorize('create', Heading::class); // POLICY

        $inputs = request()->validate([
            'post_id'=>'required|integer',
            'type'=>'required|string',
            'title'=>'required|string'
        ]);

        $post = Post::findOrFail(request('post_id'));
        $post->headings()->create($inputs);

        session()->flash('heading-created-message', 'Az új rovat létrehozása sikeres volt ('.$inputs['title'].')');

        return redirect()->route('heading.index');
    }
    public function edit(Heading $heading){
        // TODO check
        // $this->authorize('view', $heading); // POLICY

        $posts = Post::all();
        return view('admin.headings.edit', [
            'heading'=>$heading,
            'posts'=>$posts
        ]);
    }
    public function update(Heading $heading){
        $inputs = request()->validate([
            'post_id'=>'required|integer',
            'type'=>'required|string',
            'title'=>'required|string'
        ]);

        $heading->post_id = $inputs['post_id'];
        $heading->type = $inputs['type'];
        $heading->title = $inputs['title'];

        // TODO check
        // $this->authorize('update', $heading); // POLICY

        $heading->save();

        session()->flash('heading-updated-message', 'A rovat frissítése sikeres volt ('.$inputs['title'].')');

        return redirect()->route('heading.index');
    }
    public function destroy(Heading $heading, Request $request){
        // TODO check
        // $this->authorize('delete', $heading); // POLICY

        $heading->delete();
        $request->session()->flash('message', 'A rovat törlése sikeres volt');
        return back();
    }
}
