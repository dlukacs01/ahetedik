<?php

namespace App\Http\Controllers;

use App\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    //
    public function index(){
        $meta = Meta::findOrFail(1);
        return view('admin.metas.index', ['meta'=>$meta]);
    }
    public function store(){
        Meta::create([
            'szerzoknek'=>request('szerzoknek'),
            'nyilatkozat'=>request('nyilatkozat'),
            'elvek'=>request('elvek'),
            'jogok'=>request('jogok'),
            'impresszum'=>request('impresszum'),
            'gdpr'=>request('gdpr')
        ]);
        return back();
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
