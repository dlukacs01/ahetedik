<?php

namespace App\Http\Controllers;

use App\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    //
    public function index() {
        $meta = Meta::findOrFail(1);
        return view('admin.metas.index', ['meta' => $meta]);
    }

    public function update(Meta $meta) {

        // VALIDATION
        request()->validate([
            'szerzoknek' => ['required', 'string', 'max:100000'],
            'nyilatkozat' => ['required', 'string', 'max:100000'],
            'elvek' => ['required', 'string', 'max:100000'],
            'jogok' => ['required', 'string', 'max:100000'],
            'impresszum' => ['required', 'string', 'max:100000'],
            'gdpr' => ['required', 'string', 'max:100000']
        ]);

        // VALUES
        $meta->szerzoknek = request('szerzoknek');
        $meta->nyilatkozat = request('nyilatkozat');
        $meta->elvek = request('elvek');
        $meta->jogok = request('jogok');
        $meta->impresszum = request('impresszum');
        $meta->gdpr = request('gdpr');

        // SAVE, SESSION, REDIRECT
        if($meta->isDirty()) {
            session()->flash('updated', 'A meták frissítése sikeres.');
        } else {
            session()->flash('updated', 'Nem történt módosítás.');
        }

        $meta->save(); // must be after session
        return back();
    }
}
