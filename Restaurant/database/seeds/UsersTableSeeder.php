<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Aamen',
            'email' => 'Amenyousri@email.com',
            'password' => 'AmenAmenAmen',
            'role' => 'admin',

        ]);
    }
}
