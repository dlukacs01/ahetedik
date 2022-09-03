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
            ['name' => 'Versek', 'slug' => 'versek', 'created_at' => now()],
            ['name' => 'Kritika, recenzió', 'slug' => 'kritika-recenzió', 'created_at' => now()],
            ['name' => 'Pályázat', 'slug' => 'palyazat', 'created_at' => now()],
            ['name' => 'Novellák és kisprózák', 'slug' => 'novellak-es-kisprozak', 'created_at' => now()],
            ['name' => 'Szerkesztőségi cikk', 'slug' => 'szerkesztosegi-cikk', 'created_at' => now()],
            ['name' => 'Gyászhír', 'slug' => 'gyaszhir', 'created_at' => now()],
            ['name' => 'Dráma, színmű', 'slug' => 'drama-szinmu', 'created_at' => now()],
            ['name' => 'Tárcák, tanulmányok', 'slug' => 'tarcak-tanulmanyok', 'created_at' => now()],
            ['name' => 'Interjúk, riportok', 'slug' => 'interjuk-riportok', 'created_at' => now()],
            ['name' => 'Nekrológ', 'slug' => 'nekrolog', 'created_at' => now()],
            ['name' => 'Audio', 'slug' => 'audio', 'created_at' => now()],
            ['name' => 'Video', 'slug' => 'video', 'created_at' => now()],
            ['name' => 'Fordítások', 'slug' => 'forditasok', 'created_at' => now()]
        ]);
    }
}
