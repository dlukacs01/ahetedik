<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    //
    public function index(){
        return view('admin.roles.index', [
            'roles'=>Role::all()
        ]);
    }
    public function edit(Role $role){
        return view('admin.roles.edit', [
            'role'=>$role,
            'permissions'=>Permission::all()
        ]);
    }
    public function store(){
        request()->validate([
            'name'=>['required']
        ]);

        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        ]);
        session()->flash('role-created', 'Az új szerepkör létrehozása sikeres volt ('.request('name').')');
        return back();
    }
    public function update(Role $role){
        $role->name = Str::ucfirst(request('name'));
        $role->slug = Str::of(request('name'))->slug('-');
        if($role->isDirty('name')){
            session()->flash('role-updated', 'A szerepkör frissítése sikeres volt ('.request('name').')');
            $role->save();
        } else {
            session()->flash('role-updated', 'Nem történt módosítás');
        }
        // return back();
        return redirect()->route('role.index');
    }
    public function attach_permission(Role $role){
        $role->permissions()->attach(request('permission'));
        return back();
    }
    public function detach_permission(Role $role){
        $role->permissions()->detach(request('permission'));
        return back();
    }
    public function destroy(Role $role){
        $role->delete();
        session()->flash('role-deleted', 'A szerepkör törlése sikeres volt: '.$role->name);
        return back();
    }
}
