<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('metas')->insert([

            [
                'szerzoknek' => '',
                'nyilatkozat' => '',
                'elvek' => '',
                'jogok' => '',
                'impresszum' => '',
                'gdpr' => '',
                'created_at' => now()
            ]
        ]);
    }
}
