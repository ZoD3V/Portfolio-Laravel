<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Administrator",
            'email' => "admin@gmail.com",
            'is_admin' => 1,
            'password' => bcrypt(123456789),
        ]);

        User::create([
            'name' => "User 1",
            'email' => "user1@gmail.com",
            'is_admin' => 0,
            'password' => bcrypt(123456789),
        ]);

        User::create([
            'name' => "User 2",
            'email' => "user2@gmail.com",
            'is_admin' => 0,
            'password' => bcrypt(123456789),
        ]);
    }
}
