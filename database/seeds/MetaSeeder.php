<?php

use Illuminate\Database\Seeder;

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
