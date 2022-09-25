<?php

namespace App\Http\Controllers;

use App\Detail;
use App\Post;
use App\User;
use App\Work;

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

        $title = config('app.name') . " &mdash; Független Irodalmi, Kulturális Folyóirat és Alkotóközösség";

        $posts = Post::where('active', 1)
                ->orderBy('status', 'desc')
                ->orderBy('release_date', 'desc')
                ->get();

        // increment home_view_count
        $detail = Detail::findOrFail(1);
        $detail->home_view_count++;
        $detail->save();

        return view('home', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    public function search() {

        // Get the search value from the request
        $search = request('search');

        $title = "Találatok a következőre: " . $search ." &mdash; " . config('app.name');

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
            'title' => $title,
            'users' => $users,
            'works' => $works
        ]);
    }
}
