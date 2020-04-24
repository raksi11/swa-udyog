<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$DRO8kBVBYSgS2uujKx4VOevLM0XSvPXQqspcXM7HEM3d4PKtc.c4e',
                'remember_token' => null,
                'about'          => '',
                'upi'            => '',
            ],
        ];

        User::insert($users);

    }
}
