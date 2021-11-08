<?php

namespace App\Http\Controllers;

use App\Category;
use App\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    //
    public function index(){
        Carbon::setLocale('hu');
        $works = auth()->user()->works()->paginate(5);
        return view('admin.works.index', ['works'=>$works]);
    }
    public function create(){
        $this->authorize('create', Work::class); // POLICY
        $categories = Category::all();
        return view('admin.works.create', ['categories'=>$categories]);
    }
    public function store(){
        $this->authorize('create', Work::class); // POLICY

        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'category_id'=>'required|integer',
            'work_image'=>'file',
            'body'=>'required'
        ]);

        if(request('work_image')){
            $inputs['work_image'] = request('work_image')->store('images');
        }

        auth()->user()->works()->create($inputs);

        session()->flash('work-created-message', 'Az új mű: '.$inputs['title'].' elkészült');

        return redirect()->route('work.index');
    }
    public function edit(Work $work){
        $this->authorize('view', $work); // POLICY
        $categories = Category::all();
        return view('admin.works.edit', ['work'=>$work,'categories'=>$categories]);
    }
    public function destroy(Work $work, Request $request){
        $this->authorize('delete', $work); // POLICY
        $work->delete();
        $request->session()->flash('message', 'Work was deleted');
        return back();
    }
    public function update(Work $work){
        $inputs = request()->validate([
            'title'=>'required|min:8|max:255',
            'category_id'=>'required|integer',
            'work_image'=>'file',
            'body'=>'required'
        ]);

        if(request('work_image')){
            $inputs['work_image'] = request('work_image')->store('images');
            $work->work_image = $inputs['work_image'];
        }

        $work->title = $inputs['title'];
        $work->category_id = $inputs['category_id'];
        $work->body = $inputs['body'];

        $this->authorize('update', $work); // POLICY

        $work->save();

        session()->flash('work-updated-message', 'Work with title '.$inputs['title'].' was updated');

        return redirect()->route('work.index');
    }
}
