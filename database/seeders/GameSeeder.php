<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;




class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$user= User::class;
        //$user->get()->id();

        //Game::factory(10)->create();
       /* Game::create([
            'id'=>1,
            'dice_one' => 2,
            'dice_two' => 3,
            'result' => 100,
            'points' => 200,
            'ranking' => 10,
            'lowest_ranking' => 50,
            'highest_ranking' => 100,
            'user_id' => rand(1,20),
        ]);
        */



        Game::factory(10)->create();
    }
}
