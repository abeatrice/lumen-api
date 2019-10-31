<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => app('hash')->make('secret')
        ]);

        User::create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => app('hash')->make('secret')
        ]);
    }
}
