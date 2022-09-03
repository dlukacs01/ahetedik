<?php

namespace App\Http\Controllers;

use App\Category;
use App\Meta;
use App\Post;
use App\Story;
use App\User;
use App\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth'); // preventing to reach home page by login
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        Carbon::setLocale('hu');
        $posts = Post::where('active',1)->orderBy('id', 'desc')->get();
        return view('home', ['posts' => $posts]);
    }

    public function search() {

        Carbon::setLocale('hu');

        // Get the search value from the request
        $search = request('search');

        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();

        $works = Work::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orwhereHas('user', function($q) use($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            })->get();

        return view('search', [
            'search' => $search,
            'users' => $users,
            'works' => $works
        ]);
    }
}
