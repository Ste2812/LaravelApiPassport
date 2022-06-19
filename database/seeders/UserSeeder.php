<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => 'MuyF4c1l', // password
            'remember_token' => Str::random(10),
        ])->assignRole('admin');

        User::create([
            'username' => 'player',
            'email' => 'player@player.com',
            'email_verified_at' => now(),
            'password' => 'MuyD1fic1l', // password
            'remember_token' => Str::random(10),
        ])->assignRole('user');






    }
}
