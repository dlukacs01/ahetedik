<?php

namespace App\Http\Controllers;

use App\Story;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    //
    public function show($story_slug){
        Carbon::setLocale('hu');
        $story = Story::where('slug', $story_slug)->first();
        return view('story', ['story'=>$story]);
    }
    public function index(){
        Carbon::setLocale('hu');
        $stories = Story::paginate(30);
        return view('admin.stories.index', ['stories'=>$stories]);
    }
    public function create(){
        $this->authorize('create', Story::class); // POLICY
        return view('admin.stories.create');
    }
    public function store(){
        $this->authorize('create', Story::class); // POLICY

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'expiration_date'=>'required|date',
            'story_image'=>'file',
            'body'=>'required'
        ]);

        $inputs['slug'] = Str::of(Str::lower(request('title')))->slug('-');

        if(request('story_image')){
            $inputs['story_image'] = request('story_image')->store('images');
        }

        auth()->user()->stories()->create($inputs);

        session()->flash('story-created-message', 'Az új hír létrehozása sikeres volt ('.$inputs['title'].')');

        return redirect()->route('story.index');
    }
    public function edit(Story $story){
        $this->authorize('view', $story); // POLICY
        return view('admin.stories.edit', ['story'=>$story]);
    }
    public function update(Story $story){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'body'=>'required'
        ]);

        if(request('story_image')){
            $inputs['story_image'] = request('story_image')->store('images');
            $story->story_image = $inputs['story_image'];
        }

        $story->title = $inputs['title'];
        $story->body = $inputs['body'];

        $this->authorize('update', $story); // POLICY

        $story->save();

        session()->flash('story-updated-message', 'A hír frissítése sikeres volt ('.$inputs['title'].')');

        return redirect()->route('story.index');
    }
    public function destroy(Story $story, Request $request){
        $this->authorize('delete', $story); // POLICY
        $story->delete();
        $request->session()->flash('message', 'A hír törlése sikeres volt');
        return back();
    }
}
