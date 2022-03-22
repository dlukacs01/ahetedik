<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use App\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkController extends Controller
{
    //
    public function work_category($category_slug){
        Carbon::setLocale('hu');
        $category = Category::where('slug', $category_slug)->first(); // needed for page title
        // $works = $category->works()->whereDate('release_date', '<=', date('Y-m-d'))->get();
        $works = $category->works()->whereDate('release_date', '<=', date('Y-m-d'))->orderBy('id','DESC')->paginate(10);
        return view('works', [
            'category'=>$category,
            'works'=>$works
        ]);
    }
    public function show($work_slug){
        Carbon::setLocale('hu');
        $work = Work::where('slug', $work_slug)->first();
        return view('work', ['work'=>$work]);
    }
    public function index(){
        Carbon::setLocale('hu');
        // $works = auth()->user()->works()->paginate(5);
        $works = Work::orderBy('id','DESC')->paginate(10);
        return view('admin.works.index', ['works'=>$works]);
    }
    public function create(){
        $this->authorize('create', Work::class); // POLICY
        $categories = Category::all();
        $users = User::all();
        return view('admin.works.create', [
            'categories'=>$categories,
            'users'=>$users
        ]);
    }
    public function store(){
        $this->authorize('create', Work::class); // POLICY

        $inputs = request()->validate([
            'title'=>'required|string',
            'release_date'=>'required|date',
            'user_id'=>'required|integer',
            'active'=>'required|integer',
            'body'=>'required|string'
        ]);

        $inputs['slug'] = Str::of(Str::lower(request('title')))->slug('-');

        // check for duplicate work for same author (user)
        $user = User::findOrFail(request('user_id'));
        $user_works = $user->works;
        foreach($user_works as $user_work){
            if($user_work->slug == $inputs['slug']) {
                session()->flash('work-duplicate-message', 'Ehhez a szerzőhőz ezzel a címmel már tartozik mű ('.$inputs['title'].')');
                return back();
            }
        }

        if(request('work_image')){
            $inputs['work_image'] = request('work_image')->store('images');
        }

        // auth()->user()->works()->create($inputs);
        $work = Work::create($inputs);

        // multiple categories
        $categories = request('categories');
        foreach ($categories as $category) {
            $work->categories()->attach($category);
        }

        session()->flash('work-created-message', 'Az új mű létrehozása sikeres volt ('.$inputs['title'].')');

        return redirect()->route('work.index');
    }
    public function edit(Work $work){
        // $this->authorize('view', $work); // POLICY
        $categories = Category::all();
        $users = User::all();
        return view('admin.works.edit', [
            'work'=>$work,
            'categories'=>$categories,
            'users'=>$users
        ]);
    }
    public function destroy(Work $work, Request $request){
        // $this->authorize('delete', $work); // POLICY
        $work->delete();
        $request->session()->flash('message', 'A mű törlése sikeres volt');
        return back();
    }
    public function update(Work $work){
        $inputs = request()->validate([
            'title'=>'required|string',
            'release_date'=>'required|date',
            'user_id'=>'required|integer',
            'active'=>'required|integer',
            'body'=>'required|string'
        ]);

        $work->title = $inputs['title'];
        $work->slug = Str::of(Str::lower(request('title')))->slug('-');

        // check for duplicate work for same author (user)
//        $user = User::findOrFail(request('user_id'));
//        $user_works = $user->works;
//        foreach($user_works as $user_work){
//            if($user_work->slug == $work->slug) {
//                session()->flash('work-duplicate-message', 'Ehhez a szerzőhőz ezzel a címmel már tartozik mű ('.$inputs['title'].')');
//                return back();
//            }
//        }

        if(request('work_image')){
            $inputs['work_image'] = request('work_image')->store('images');
            $work->work_image = $inputs['work_image'];
        }

        $work->release_date = $inputs['release_date'];

        // $work->category_id = $inputs['category_id'];

        // multiple categories
        $categories = request('categories');
        $work->categories()->sync($categories);

        $work->user_id = $inputs['user_id'];
        $work->active = $inputs['active'];
        $work->body = $inputs['body'];

        // $this->authorize('update', $work); // POLICY

        $work->save();

        session()->flash('work-updated-message', 'A mű frissítése sikeres volt ('.$inputs['title'].')');

        return redirect()->route('work.index');
    }
}
