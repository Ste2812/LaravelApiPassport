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
         //Game::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
/*
        $faker = Factory::create();

        DB::table('game')->insert([
            'dice_one' => $this->$faker->numberBetween($min = 1, $max = 6),
            'dice_two' => $this->$faker->numberBetween($min = 1, $max = 6),
            'user_id' => $this->$faker->numberBetween(1, 10),
            //$result= 'result' => $diceOne+$diceTwo,
            //$result= 'result' => $this->faker->numberBetween(10, 100),
            'result'=> $this->$faker->numberBetween(10, 100),
            //'points' => $result==7?true:false,
            'points'=> $this->$faker->numberBetween(0, 1),
            'ranking' => $this->$faker->numberBetween(10, 100),
            'ranking_value' => $this->$faker->numberBetween(10, 100),
            //'lowest_ranking' => $this->faker->rand()<=100,
          //  'highest_ranking' => $this->faker->rand()>=100,
            'lowest_ranking' => $this->$faker->numberBetween(10, 100),
            'highest_ranking' => $this->$faker->numberBetween(10, 100),
        ]);*/
    }
}
