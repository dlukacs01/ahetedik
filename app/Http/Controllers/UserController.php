<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function poets(Request $request) {

        if($request->ajax()) {
            $users = User::where('name','LIKE',$request->search."%")->orderBy('name')->paginate(10);
            return view('partials.home.users', ['users' => $users]);
        } else {
            $users = User::orderBy('name')->paginate(10);
            return view('users', ['users' => $users]);
        }
    }

    public function show($username) {
        Carbon::setLocale('hu');
        $user = User::where('username', $username)->first();
        $works = $user->works;

        return view('profile', [
            'user'=>$user,
            'works'=>$works
        ]);
    }

    public function index() {
        Carbon::setLocale('hu');
        $users = User::orderBy('name')->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create() {

        // POLICY
        $this->authorize('create', User::class);

        return view('admin.users.create');
    }

    public function store() {

        // POLICY
        $this->authorize('create', User::class);

        // VALIDATION
        request()->validate([
            'username' => ['required', 'string', 'alpha_dash', 'max:30', 'unique:users'],
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'cv' => ['required', 'string', 'max:100000'],
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'avatar' => ['required', 'image']
        ]);

        // VALUES
        $inputs['username'] = request('username');
        $inputs['name'] = request('name');
        $inputs['email'] = request('email');
        $inputs['cv'] = request('cv');
        $inputs['password'] = request('password');

        if(request('avatar')) {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        // SAVE, SESSION, REDIRECT
        User::create($inputs);
        session()->flash('created', 'A felhasználó létrehozása sikeres.');
        return redirect()->route('user.index');
    }

    public function edit(User $user) {

        // POLICY

        return view('admin.users.profile', [
            'user'=>$user,
            'roles'=>Role::all()
        ]);
    }

    public function update(User $user) {

        // POLICY

        // VALIDATIONS
        request()->validate([
            'username' => ['required', 'string', 'alpha_dash', 'max:30', 'unique:users'],
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'cv' => ['required', 'string', 'max:100000'],
            'password' => [
                'required',
                'string',
                'confirmed',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'avatar' => ['required', 'image']
        ]);

        // VALUES
        $user->username = request('username');
        $user->name = request('name');
        $user->email = request('email');
        $user->cv = request('cv');

        if(request('password')) {
            $user->password = request('password');
        }

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        // SAVE, SESSION, REDIRECT
        if($user->isDirty()) {
            session()->flash('updated', 'A felhasználó frissítése sikeres.');
        } else {
            session()->flash('updated', 'Nem történt módosítás.');
        }

        $user->save(); // must be after session
        return redirect()->route('user.edit', $user);
    }

    public function attach(User $user) {
        $user->roles()->attach(request('role'));
        return back();
    }

    public function detach(User $user) {
        $user->roles()->detach(request('role'));
        return back();
    }

    public function destroy(User $user) {

        // POLICY

        // SAVE, SESSION, REDIRECT
        $user->delete();
        session()->flash('deleted', 'A felhasználó törlése sikeres.');
        return back();
    }
}
