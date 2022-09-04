<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //

    public function categories(){

        $title = config('app.name') . " &mdash; Kategóriák";
        $categories = Category::orderBy('name')->get();

        return view('categories', [
            'title' => $title,
            'categories' => $categories
        ]);
    }

    public function index(){
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create(){

        // POLICY
        $this->authorize('create', Category::class);

        return view('admin.categories.create');
    }

    public function store(){

        // POLICY
        $this->authorize('create', Category::class);

        // VALIDATION
        request()->validate([
            'name' => ['required', 'string', 'max:30'],
            'slug' => ['required', 'string', 'max:30'],
            'category_image' => ['required', 'image'],
        ]);

        // VALUES
        $inputs['name'] = Str::ucfirst(request('name'));
        $inputs['slug'] = Str::of(Str::lower(request('name')))->slug('-');

        if(request('category_image')) {
            $inputs['category_image'] = request('category_image')->store('images');
        }

        // SAVE, SESSION, REDIRECT
        Category::create($inputs);
        session()->flash('created', 'A kategória létrehozása sikeres.');
        return redirect()->route('category.index');
    }

    public function edit(Category $category){
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(Category $category){

        // VALIDATION
        request()->validate([
            'name' => ['required', 'string', 'max:30'],
            'slug' => ['required', 'string', 'max:30'],
            'category_image' => ['required', 'image'],
        ]);

        // VALUES
        $category->name = Str::ucfirst(request('name'));
        $category->slug = Str::of(request('name'))->slug('-');

        if(request('category_image')){
            $category->category_image = request('category_image')->store('images');
        }

        // SAVE, SESSION, REDIRECT
        if($category->isDirty()) {
            session()->flash('updated', 'A kategória frissítése sikeres.');
        } else {
            session()->flash('updated', 'Nem történt módosítás.');
        }

        $category->save(); // must be after session
        return redirect()->route('category.index');
    }

    public function destroy(Category $category){

        // SAVE, SESSION, REDIRECT
        $category->delete();
        session()->flash('deleted', 'A kategória törlése sikeres.');
        return back();
    }
}
