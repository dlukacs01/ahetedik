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
        $headings = Heading::paginate(5);
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
            'title'=>'required|min:8|max:255'
        ]);

        $post = Post::findOrFail(request('post_id'));
        $post->headings()->create($inputs);

        session()->flash('heading-created-message', 'Az új rovat létrehozása sikeres volt ('.$inputs['title'].')');

        return redirect()->route('heading.index');
    }
}
