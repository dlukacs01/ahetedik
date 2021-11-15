<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index(){
        return view('admin.categories.index', [
            'categories'=>Category::all()
        ]);
    }
    public function index_front(){
        return view('categories', [
            'categories'=>Category::all()
        ]);
    }
    public function edit(Category $category){
        return view('admin.categories.edit', [
            'category'=>$category
        ]);
    }
    public function create(){
        return view('admin.categories.create');
    }
    public function store(){
        $this->authorize('create', Category::class); // POLICY

        $inputs = request()->validate([
            'name'=>'required',
            'category_image'=>'file'
        ]);

        $inputs['name'] = Str::ucfirst(request('name'));
        $inputs['slug'] = Str::of(Str::lower(request('name')))->slug('-');

        if(request('category_image')){
            $inputs['category_image'] = request('category_image')->store('images');
        }

        Category::create($inputs);

        session()->flash('category-created-message', 'Az új kategória: '.$inputs['name'].' elkészült');

        return redirect()->route('category.index');
    }
    public function update(Category $category){
        $category->name = Str::ucfirst(request('name'));
        $category->slug = Str::of(request('name'))->slug('-');
        if($category->isDirty('name')){
            session()->flash('category-updated', 'Category Updated: '.request('name'));
            $category->save();
        } else {
            session()->flash('category-updated', 'Nothing has been modified');
        }
        return back();
    }
    public function destroy(Category $category){
        $category->delete();
        session()->flash('category-deleted', 'Deleted Category '.$category->name);
        return back();
    }
}
