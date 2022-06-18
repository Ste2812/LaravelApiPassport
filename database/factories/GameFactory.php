<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            $diceOne='dice_one' => $this->faker->rand(1, 6),
            $diceTwo='dice_two' => $this->faker->rand(1, 6),
            'result' => $this->$diceOne + $this->$diceTwo,
            'user_id' => $this->user()->id,
            ''

        ];
    }
}
