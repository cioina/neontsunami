<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        User::create([
        'first_name' => 'First',
        'last_name'  => 'Last',
        'email'      => 'admin@admin.com',
        'password'   =>  \Hash::make('password'),
        ]);

    }
}