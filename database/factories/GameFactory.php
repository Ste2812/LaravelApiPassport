<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'id' => $this->faker->numberBetween(1, 10),
            'dice_one' => $this->faker->numberBetween($min = 1, $max = 6),
            'dice_two' => $this->faker->numberBetween($min = 1, $max = 6),

            //$result= 'result' => $diceOne+$diceTwo,
            //$result= 'result' => $this->faker->numberBetween(10, 100),
            'result'=> $this->faker->numberBetween($min = 1, $max = 6),
            //'points' => $result==7?true:false,
            'points'=> $this->faker->numberBetween($min = 1, $max = 6),
            'ranking' => $this->faker->numberBetween($min = 1, $max = 6),
            'ranking_value' => $this->faker->numberBetween($min = 1, $max = 6),
            //'lowest_ranking' => $this->faker->rand()<=100,
          //  'highest_ranking' => $this->faker->rand()>=100,
            'lowest_ranking' => $this->faker->numberBetween($min = 1, $max = 6),
            'highest_ranking' => $this->faker->numberBetween($min = 1, $max = 6),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 6),
        ];
    }
}
