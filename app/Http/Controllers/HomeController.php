<?php

namespace App\Http\Controllers;

use App\Category;
use App\Meta;
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
    public function szerzoknek(){
        $meta = Meta::findOrFail(1);
        return view('metas.szerzoknek', ['meta'=>$meta]);
    }
    public function nyilatkozat(){
        $meta = Meta::findOrFail(1);
        return view('metas.nyilatkozat', ['meta'=>$meta]);
    }
    public function elvek(){
        $meta = Meta::findOrFail(1);
        return view('metas.elvek', ['meta'=>$meta]);
    }
    public function jogok(){
        $meta = Meta::findOrFail(1);
        return view('metas.jogok', ['meta'=>$meta]);
    }
    public function impresszum(){
        $meta = Meta::findOrFail(1);
        return view('metas.impresszum', ['meta'=>$meta]);
    }
    public function gdpr(){
        $meta = Meta::findOrFail(1);
        return view('metas.gdpr', ['meta'=>$meta]);
    }
}
