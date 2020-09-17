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
          DB::table('users')->insert([
            'name' => 'Aamen',
            'email' => 'Amenyousri@email.com',
            'password' => Hash::make('password'),
            'role' => 'admin',

        ]);
    }
}
