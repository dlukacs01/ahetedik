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
        $works = $category->works;
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
        $works = Work::paginate(30);
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
            'title'=>'required|min:8|max:255',
            'category_id'=>'required|integer',
            'user_id'=>'required|integer',
            'work_image'=>'file',
            'body'=>'required'
        ]);

        $inputs['slug'] = Str::of(Str::lower(request('title')))->slug('-');

        if(request('work_image')){
            $inputs['work_image'] = request('work_image')->store('images');
        }

        // auth()->user()->works()->create($inputs);
        Work::create($inputs);

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
            'title'=>'required|min:8|max:255',
            'category_id'=>'required|integer',
            'user_id'=>'required|integer',
            'body'=>'required'
        ]);

        if(request('work_image')){
            $inputs['work_image'] = request('work_image')->store('images');
            $work->work_image = $inputs['work_image'];
        }

        $work->title = $inputs['title'];
        $work->category_id = $inputs['category_id'];
        $work->user_id = $inputs['user_id'];
        $work->body = $inputs['body'];

        // $this->authorize('update', $work); // POLICY

        $work->save();

        session()->flash('work-updated-message', 'A mű frissítése sikeres volt ('.$inputs['title'].')');

        return redirect()->route('work.index');
    }
}
