<?php

namespace App\Http\Controllers;

use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use KubAT\PhpSimple\HtmlDomParser;

class ParserController extends Controller
{
    //

    // AUTHOR
    // echo $document->find('meta[name=author]',0)->content."<br>";

    // TITLE
    // echo $document->find('meta[name=title]',0)->content."<br>";

    // BODY
    // echo $document->find('div.itemFullText', 0)->innertext;

    public function authors() {
        $files = glob(public_path() . '/web/parser/versek/*html');
        foreach($files as $file) {
            $document = HtmlDomParser::file_get_html($file);
            echo $document->find('meta[name=author]',0)->content."<br>";
        }
    }

    public function categories() {

        // get all works for a specific category (e.g. 'versek')
        $works = Work::where('category','vers')->get();

        // bulk insert
        $data = [];
        foreach ($works as $work) {
            $data[] = [
                'work_id' => $work->id,
                'category_id' => 1, // id of the specific category we insert to
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // bulk insert
        $data_collection = collect($data);
        $data_chunks = $data_collection->chunk(50);
        foreach ($data_chunks as $data_chunk) {
            DB::table('category_work')->insert($data_chunk->toArray());
        }
        echo "done";
    }

    public function parser() {

        // user_ids
        $counter = 0;
        $user_ids = file(public_path() . '/web/parser/metas/2023.08.16._user_ids.txt');

        // list all html files
        $files = glob(public_path() . '/web/parser/versek/*html');
        foreach(array_chunk($files, 2) as $filesChunk) {

            $data = [];
            foreach($filesChunk as $fileChunk) {

                // echo $file."<br>";
                $document = HtmlDomParser::file_get_html($fileChunk);

                // parse file
                $title = $document->find('meta[name=title]',0)->content;
                $user_id = $user_ids[$counter];
                $body = $document->find('div.itemFullText', 0)->innertext;

                // bulk insert
                $data[] = [
                    'user_id' => $user_id, // 1, for local
                    'title' => $title,
                    'slug' =>  Str::of(Str::lower($title))->slug('-'),
                    'release_date' => '2023-01-01',
                    'body' => $body,
                    'active' => 1,
                    'category' => 'vers',
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // counter
                echo $counter."<br>";
                $counter++;
            }

            // bulk insert
            $data_collection = collect($data);
            $data_chunks = $data_collection->chunk(50);
            foreach ($data_chunks as $data_chunk) {
                Work::insert($data_chunk->toArray());
            }
        }
        echo "done";
    }
}
