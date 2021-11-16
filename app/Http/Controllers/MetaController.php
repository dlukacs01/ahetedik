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
}
