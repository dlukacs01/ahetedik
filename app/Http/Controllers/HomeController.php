<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
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
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Carbon::setLocale('hu');

        // $posts = Post::all();
        $posts = Post::orderBy('id', 'desc')->paginate(3);

        return view('home', ['posts'=>$posts]);
    }
    public function szerzoknek()
    {
        return view('szerzoknek');
    }
}
