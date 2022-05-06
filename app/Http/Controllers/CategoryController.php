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
            'categories'=>Category::orderBy('name')->paginate(10)
        ]);
    }

    // KATEGÓRIÁK >>> ABC sorrend, 10 kategória / oldal
    public function index_front(){
        return view('categories', [
            'categories'=>Category::orderBy('name')->paginate(10)
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
            'name'=>'required|string',
            'category_image'=>'required|file'
        ]);

        $inputs['name'] = Str::ucfirst(request('name'));
        $inputs['slug'] = Str::of(Str::lower(request('name')))->slug('-');

        if(request('category_image')){
            $inputs['category_image'] = request('category_image')->store('images');
        }

        Category::create($inputs);

        session()->flash('category-created-message', 'Az új kategória létrehozása sikeres volt ('.$inputs['name'].')');

        return redirect()->route('category.index');
    }
    public function update(Category $category){
        $inputs = request()->validate([
            'name'=>'required|string'
        ]);

        if(request('category_image')){
            $inputs['category_image'] = request('category_image')->store('images');
            $category->category_image = $inputs['category_image'];
        }

        $category->name = Str::ucfirst(request('name'));
        $category->slug = Str::of(request('name'))->slug('-');
        if($category->isDirty('name') || $category->isDirty('category_image')){
            session()->flash('category-updated', 'A kategória frissítése sikeres volt ('.request('name').')');
            $category->save();
        } else {
            session()->flash('category-updated', 'Nem történt módosítás');
        }
        return redirect()->route('category.index');
    }
    public function destroy(Category $category){
        $category->delete();
        session()->flash('category-deleted', 'A kategória törlése sikeres volt: '.$category->name);
        return back();
    }
}
