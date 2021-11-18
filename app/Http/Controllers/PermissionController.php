<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PermissionController extends Controller
{
    //
    public function index(){
        return view('admin.permissions.index', [
            'permissions'=>Permission::all()
        ]);
    }
    public function store(){
        request()->validate([
            'name'=>['required']
        ]);

        Permission::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);
        session()->flash('permission-created', 'Az új jogosultság létrehozása sikeres volt ('.request('name').')');
        return back();
    }
    public function edit(Permission $permission){
        return view('admin.permissions.edit', ['permission'=>$permission]);
    }
    public function update(Permission $permission){
        $permission->name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(request('name'))->slug('-');
        if($permission->isDirty('name')){
            session()->flash('permission-updated', 'A jogosultság frissítése sikeres volt ('.request('name').')');
            $permission->save();
        } else {
            session()->flash('permission-updated', 'Nem történt módosítás');
        }
        // return back();
        return redirect()->route('permission.index');
    }
    public function destroy(Permission $permission){
        $permission->delete();
        session()->flash('permission-deleted', 'A jogosultság törlése sikeres volt: '.$permission->name);
        return back();
    }
}
