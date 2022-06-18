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
            $diceOne= 'dice_one' => $this->faker->rand(1, 6),
            $diceTwo='dice_two' => $this->faker->rand(1, 6),
            $result= 'result' => $this->$diceOne+$diceTwo,
            'success_result' => $result==7?true:false,
            'average' => $this->$result+=$result,
            'lowest_ranking' => $this->faker->rand()<=100,
            'highest_ranking' => $this->faker->rand()>=100,
        ];
    }
}
