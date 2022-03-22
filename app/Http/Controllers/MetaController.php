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

        $inputs = request()->validate([
            'szerzoknek'=>'required|string',
            'nyilatkozat'=>'required|string',
            'elvek'=>'required|string',
            'jogok'=>'required|string',
            'impresszum'=>'required|string',
            'gdpr'=>'required|string'
        ]);

        $meta->szerzoknek = $inputs['szerzoknek'];
        $meta->nyilatkozat = $inputs['nyilatkozat'];
        $meta->elvek = $inputs['elvek'];
        $meta->jogok = $inputs['jogok'];
        $meta->impresszum = $inputs['impresszum'];
        $meta->gdpr = $inputs['gdpr'];

        $meta->save();
        session()->flash('meta-updated-message', 'A leírások frissítése sikeres volt');
        return back();
    }
}
