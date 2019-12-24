<?php

use App\User;
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
        User::create([
            'name'      => 'Guillermo Sanchez',
            'email'     => 'test@test.com',
            'password'	=> bcrypt('12345678'),
        ]);
    }
}
