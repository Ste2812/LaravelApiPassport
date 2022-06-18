<?php

namespace Tests\Unit\database\seeders;

use App\Models\Game;
use PHPUnit\Framework\TestCase;

class GameSeeder extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function run_gameSeeder()
    {
        $arraySeed= Game::factory(Game::class)->create();
        echo response([$arraySeed])->json();
    }
}
