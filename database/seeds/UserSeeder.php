<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([

            // ADMIN
            [
                'username' => 'lukacsdavid',
                'name' => 'Lukács Dávid',
                'email' => 'lukacs.dvid@gmail.com',
                'password' => '$2y$10$uuzZ6C8FcameysV60sIaYOTTGZJaCWtGBhcSuwYtFT2H9SCKP10My', // Ahetedik0123!?#
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
