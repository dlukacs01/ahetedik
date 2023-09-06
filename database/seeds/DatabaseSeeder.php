<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class); // admin
        $this->call(RoleSeeder::class);
        $this->call(RoleUserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(MetaSeeder::class);
        $this->call(DetailSeeder::class);

        // factory(\App\User::class, 300)->create(); // koltok
        // factory(\App\Post::class, 300)->create();
        factory(\App\Work::class, 300)->create();
    }
}
