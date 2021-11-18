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
    public function update(Meta $meta){
        $meta->szerzoknek = request('szerzoknek');
        $meta->nyilatkozat = request('nyilatkozat');
        $meta->elvek = request('elvek');
        $meta->jogok = request('jogok');
        $meta->impresszum = request('impresszum');
        $meta->gdpr = request('gdpr');

        $meta->save();
        session()->flash('meta-updated-message', 'A leírások frissítése sikeres volt');
        return back();
    }
}
