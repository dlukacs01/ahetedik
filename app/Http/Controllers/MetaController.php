<?php

namespace App\Http\Controllers;

use App\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    //

    public function szerzoknek() {

        $title = config('app.name') . " &mdash; Szerzőink figyelmébe";
        $meta = Meta::findOrFail(1);

        return view('metas.szerzoknek', [
            'title' => $title,
            'meta' => $meta
        ]);
    }

    public function nyilatkozat() {

        $title = config('app.name') . " &mdash; Szerkesztőségi nyilatkozat";
        $meta = Meta::findOrFail(1);

        return view('metas.nyilatkozat', [
            'title' => $title,
            'meta' => $meta
        ]);
    }

    public function elvek() {

        $title = config('app.name') . " &mdash; Szerkesztési elvek";
        $meta = Meta::findOrFail(1);

        return view('metas.elvek', [
            'title' => $title,
            'meta' => $meta
        ]);
    }

    public function jogok() {

        $title = config('app.name') . " &mdash; Szerzői jogok";
        $meta = Meta::findOrFail(1);

        return view('metas.jogok', [
            'title' => $title,
            'meta' => $meta
        ]);
    }

    public function impresszum() {

        $title = config('app.name') . " &mdash; Impresszum";
        $meta = Meta::findOrFail(1);

        return view('metas.impresszum', [
            'title' => $title,
            'meta' => $meta
        ]);
    }

    public function gdpr() {

        $title = config('app.name') . " &mdash; Általános Adatvédelmi Nyilatkozat";
        $meta = Meta::findOrFail(1);

        return view('metas.gdpr', [
            'title' => $title,
            'meta' => $meta
        ]);
    }

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
