<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Work;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    public function works($category_slug) {

        $category = Category::where('slug', $category_slug)->first();
        $title = config('app.name') . " &mdash; " . $category->name;
        $works = $category->works()
            ->whereDate('release_date', '<=', date('Y-m-d'))
            ->orderBy('release_date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(config('custom.home.works.pagination.items_per_page'));

        return view('works', [
            'category' => $category,
            'title' => $title,
            'works' => $works
        ]);
    }

    public function show($work_slug, $work_id) {

        $work = Work::findOrFail($work_id);
        $title = config('app.name') . " &mdash; " . $work->title;

        // check rls date
        if($work->release_date > date('Y-m-d')) {
            return view('errors.before_rls_date', ['title' => $title]);
        } else {
            // increment view_count
            $work->view_count++;
            $work->save();

            return view('work', [
                'work' => $work,
                'title' => $title
            ]);
        }
    }

    public function index() {
        // $works = Work::orderBy('id', 'desc')->get(); DATA-TABLES PLUGIN
        $works = Work::orderBy('id', 'desc')->paginate(config('custom.admin.tables.pagination.items_per_page'));
        return view('admin.works.index', ['works' => $works]);
    }

    public function create() {

        // POLICY
        $this->authorize('create', Work::class);

        $categories = Category::all();
        $users = User::all();

        return view('admin.works.create', [
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function store() {

        // POLICY
        $this->authorize('create', Work::class);

        // VALIDATION
        request()->validate([
            'title' => ['required', 'string', 'max:200'],
            'release_date' => ['required', 'date'],
            'user_id' => ['required', 'integer'],
            'work_image' => ['nullable', 'image'],
            'active' => ['required', 'integer'],
            'body' => ['required', 'string', 'max:100000']
        ]);

        // VALUES
        $inputs['title'] = request('title');
        $inputs['slug'] = Str::of(Str::lower(request('title')))->slug('-');

        $inputs['release_date'] = request('release_date');
        $inputs['user_id'] = request('user_id');

        if(request('work_image')){
            $inputs['work_image'] = request('work_image')->store('images/works');
        }

        $inputs['active'] = request('active');
        $inputs['body'] = request('body');

        // Check for duplicate work for same author
        $user = User::findOrFail(request('user_id'));
        $user_works = $user->works;
        foreach($user_works as $user_work){
            if($user_work->slug == $inputs['slug']) {
                session()->flash('duplicated', 'Ehhez a szerzőhőz ezzel a címmel már tartozik mű.');
                return back();
            }
        }

        // SAVE, SESSION, REDIRECT
        $work = Work::create($inputs);

        // Multiple categories
        $categories = request('categories');
        foreach ($categories as $category) {
            $work->categories()->attach($category);
        }

        session()->flash('created', 'A mű létrehozása sikeres.');
        return redirect()->route('work.index');
    }

    public function edit(Work $work) {

        // POLICY

        $categories = Category::all();
        $users = User::all();

        return view('admin.works.edit', [
            'work' => $work,
            'categories' => $categories,
            'users' => $users
        ]);
    }

    public function update(Work $work) {

        // POLICY

        // VALIDATION
        request()->validate([
            'title' => ['required', 'string', 'max:200'],
            'release_date' => ['required', 'date'],
            'user_id' => ['required', 'integer'],
            'work_image' => ['nullable', 'image'],
            'active' => ['required', 'integer'],
            'body' => ['required', 'string', 'max:100000']
        ]);

        // VALUES
        $work->title = request('title');
        $work->slug = Str::of(Str::lower(request('title')))->slug('-');

        $work->release_date = request('release_date');
        $work->user_id = request('user_id');

        if(request('work_image')){
            $work->work_image = request('work_image')->store('images/works');
        }

        $work->active = request('active');
        $work->body = request('body');

        // SAVE, SESSION, REDIRECT
        if($work->isDirty()) {
            session()->flash('updated', 'A mű frissítése sikeres.');
        } else {
            session()->flash('updated', 'Nem történt módosítás.');
        }

        $work->save(); // must be after session

        // Multiple categories
        $categories = request('categories');
        $work->categories()->sync($categories);

        return redirect()->route('work.index');
    }

    public function destroy(Work $work) {

        // POLICY

        // SAVE, SESSION, REDIRECT
        $work->delete();
        session()->flash('deleted', 'A mű törlése sikeres.');
        return back();
    }
}
