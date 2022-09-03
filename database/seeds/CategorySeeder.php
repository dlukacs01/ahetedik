<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('categories')->insert([
            ['name' => 'Versek', 'slug' => 'versek'],
            ['name' => 'Kritika, recenzió', 'slug' => 'kritika-recenzió'],
            ['name' => 'Pályázat', 'slug' => 'palyazat'],
            ['name' => 'Novellák és kisprózák', 'slug' => 'novellak-es-kisprozak'],
            ['name' => 'Szerkesztőségi cikk', 'slug' => 'szerkesztosegi-cikk'],
            ['name' => 'Gyászhír', 'slug' => 'gyaszhir'],
            ['name' => 'Dráma, színmű', 'slug' => 'drama-szinmu'],
            ['name' => 'Tárcák, tanulmányok', 'slug' => 'tarcak-tanulmanyok'],
            ['name' => 'Interjúk, riportok', 'slug' => 'interjuk-riportok'],
            ['name' => 'Nekrológ', 'slug' => 'nekrolog'],
            ['name' => 'Audio', 'slug' => 'audio'],
            ['name' => 'Video', 'slug' => 'video'],
            ['name' => 'Fordítások', 'slug' => 'forditasok']
        ]);
    }
}
