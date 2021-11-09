<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        Carbon::setLocale('hu');
        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }
    public function show(User $user){
        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }
    public function create(){
        $this->authorize('create', User::class); // POLICY
        return view('admin.users.create');
    }
    public function store(){
        $this->authorize('create', User::class); // POLICY

        // TODO validation
        $inputs = request()->validate([
            'username'=>'required',
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'avatar'=>'file',
        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        User::create($inputs);

        session()->flash('user-created', 'Az új felhasználó: '.$inputs['name'].' elkészült');

        return redirect()->route('user.index');
    }
    public function update(User $user){

        $inputs = request()->validate([
           'username'=>['required', 'string', 'max:255', 'alpha_dash'],
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'email', 'max:255'],
            'avatar'=>['file']
        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        session()->flash('user-updated', 'A felhasználó: '.request('name').' frissült');

        // return back();
        return redirect()->route('user.index');
    }
    public function attach(User $user){
        $user->roles()->attach(request('role'));
        return back();
    }
    public function detach(User $user){
        $user->roles()->detach(request('role'));
        return back();
    }
    public function destroy(User $user){
        $user->delete();
        session()->flash('user-deleted', 'User has been deleted');
        return back();
    }
}
