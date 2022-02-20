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
        $users = User::orderBy('name')->paginate(10);
        return view('admin.users.index', ['users'=>$users]);
    }
    public function index_front(Request $request){
        if($request->ajax()) {

            $users = User::where('name','LIKE',$request->search."%")->get();

            return view('partials.home.users', ['users'=>$users]);

        } else {

            $users = User::all();

            return view('users', ['users'=>$users]);

        }
    }
    public function show($username){
        Carbon::setLocale('hu');
        $user = User::where('username', $username)->first();

        $works = $user->works; // TODO pagination, how many works we need here

        return view('profile', [
            'user'=>$user,
            'works'=>$works
        ]);
    }
    public function edit(User $user){
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
            'cv'=>'required',
            'password'=>'required',
            'avatar'=>'file',
        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        User::create($inputs);

        session()->flash('user-created', 'Az új felhasználó létrehozása sikeres volt ('.$inputs['name'].')');

        return redirect()->route('user.index');
    }
    public function update(User $user){

        $inputs = request()->validate([
           'username'=>['required', 'string', 'max:255', 'alpha_dash'],
            'name'=>['required', 'string', 'max:255'],
            'cv'=>['required', 'string'],
            'email'=>['required', 'email', 'max:255'],
            'avatar'=>['file']
        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        session()->flash('user-updated', 'A felhasználó frissítése sikeres volt ('.request('name').')');

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
        session()->flash('user-deleted', 'A felhasználó törlése sikeres volt');
        return back();
    }
}
