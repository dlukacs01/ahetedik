<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    //

    public function stories() {

        $title = config('app.name') . " &mdash; Hírek";
        $stories = Story::whereDate('expiration_date', '>=', date('Y-m-d'))
            ->orderBy('id', 'desc')
            ->paginate(config('custom.home.stories.pagination.items_per_page'));

        return view('stories', [
            'title' => $title,
            'stories' => $stories
        ]);
    }

    public function show($story_slug) {

        $story = Story::where('slug', $story_slug)->first();
        $title = config('app.name') . " &mdash; " . $story->title;

        return view('story', [
            'story' => $story,
            'title' => $title
        ]);
    }

    public function index() {
        $stories = Story::orderBy('id', 'desc')->get();
        return view('admin.stories.index', ['stories' => $stories]);
    }

    public function create() {

        // POLICY
        $this->authorize('create', Story::class);

        return view('admin.stories.create');
    }

    public function store() {

        // POLICY
        $this->authorize('create', Story::class);

        // VALIDATION
        request()->validate([
            'title' => ['required', 'string', 'max:200'],
            'expiration_date' => ['required', 'date'],
            'story_image' => ['required', 'image'],
            'body' => ['required', 'string', 'max:100000']
        ]);

        // VALUES
        $inputs['title'] = request('title');
        $inputs['slug'] = Str::of(Str::lower(request('title')))->slug('-');

        $inputs['expiration_date'] = request('expiration_date');

        if(request('story_image')){
            $inputs['story_image'] = request('story_image')->store('images/stories');
        }

        $inputs['body'] = request('body');

        // SAVE, SESSION, REDIRECT
        auth()->user()->stories()->create($inputs);
        session()->flash('created', 'A hír létrehozása sikeres.');
        return redirect()->route('story.index');
    }

    public function edit(Story $story) {

        // POLICY
        // $this->authorize('view', $story);

        return view('admin.stories.edit', ['story' => $story]);
    }

    public function update(Story $story) {

        // POLICY
        // $this->authorize('update', $story);

        // VALIDATION
        request()->validate([
            'title' => ['required', 'string', 'max:200'],
            'expiration_date' => ['required', 'date'],
            'story_image' => ['nullable', 'image'],
            'body' => ['required', 'string', 'max:100000']
        ]);

        // VALUES
        $story->title = request('title');
        $story->slug = Str::of(Str::lower(request('title')))->slug('-');

        $story->expiration_date = request('expiration_date');

        if(request('story_image')){
            $story->story_image = request('story_image')->store('images/stories');
        }

        $story->body = request('body');

        // SAVE, SESSION, REDIRECT
        if($story->isDirty()) {
            session()->flash('updated', 'A hír frissítése sikeres.');
        } else {
            session()->flash('updated', 'Nem történt módosítás.');
        }

        $story->save(); // must be after session
        return redirect()->route('story.index');
    }

    public function destroy(Story $story) {

        // POLICY
        $this->authorize('delete', $story);

        // SAVE, SESSION, REDIRECT
        $story->delete();
        session()->flash('deleted', 'A hír törlése sikeres.');
        return back();
    }
}
