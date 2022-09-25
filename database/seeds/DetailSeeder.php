<?php

use Illuminate\Database\Seeder;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('details')->insert([

            [
                'home_view_count' => 0,
                'created_at' => now()
            ]
        ]);
    }
}
