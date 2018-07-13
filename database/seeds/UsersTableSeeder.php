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
            #---------Admin seeder

            'name' => 'Artemis Fowl',
            'email' => 'a@ya.com',
            'is_admin' =>1,
            'status' => 1,
            'avatar' =>'/img/no-image.png',
            'password' => bcrypt('123456'),

        ]);

    }
}
