<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GameSeeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(UserSeeder::class);
        //$this->call(PlayerSeeder::class);

        \App\Models\User::factory(10)->create()->each(function($user){
            $user->assignRole('user');
        });
        
    }
}
