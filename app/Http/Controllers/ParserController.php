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

    private static $category = "kitekinto"; // !!! CHANGE !!!

    public function authors() {
        $files = glob(public_path() . '/web/parser/works/' . ParserController::$category . '/*html');
        foreach($files as $file) {

            // echo $file . "<br>";

            $document = HtmlDomParser::file_get_html($file);
            $author = $document->find('meta[name=author]',0);
            echo !empty($author) ? $author->content : "HIANYZIK";
            echo "<br>";
        }
    }

    public function categories() {

        // get all works for a specific category (e.g. 'versek')
        $works = Work::where('category',ParserController::$category)->get();

        // bulk insert
        $data = [];
        foreach ($works as $work) {
            $data[] = [
                'work_id' => $work->id,
                'category_id' => 14, // id of the specific category we insert to !!! CHANGE !!!
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
        $user_ids = file(public_path() . '/web/parser/metas/2023.11.01._user_ids.txt'); // !!! CHANGE !!!

        // list all html files
        $files = glob(public_path() . '/web/parser/works/' . ParserController::$category . '/*html');
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
                    'user_id' => $user_id, // LOCAL: 1, PROD: $user_id !!! CHANGE !!!
                    'title' => $title,
                    'slug' =>  Str::of(Str::lower($title))->slug('-'),
                    'release_date' => '2023-01-01',
                    'body' => $body,
                    'active' => 1,
                    'category' => ParserController::$category,
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
