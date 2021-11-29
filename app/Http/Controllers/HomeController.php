<?php

namespace App\Http\Controllers;

use App\Category;
use App\Meta;
use App\Post;
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

        $post = Post::latest()->first();

        return view('home', ['post'=>$post]);
    }
    public function search(){
        Carbon::setLocale('hu');

        // Get the search value from the request
        $search = request('search');

        // Search in the title and body columns from the posts table
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();

        // Search in the title and body columns from the posts table
        $works = Work::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orwhereHas('user', function($q) use($search) {
                $q->where('name', 'LIKE', "%{$search}%");
            })->get();

        // Return the search view with the resluts compacted
        return view('search', [
            'search'=>$search,
            'users'=>$users,
            'works'=>$works
        ]);

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
