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
    public function edit(Category $category){
        return view('admin.categories.edit', [
            'category'=>$category
        ]);
    }
    public function store(){
        request()->validate([
            'name'=>['required']
        ]);

        Category::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);
        return back();
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
