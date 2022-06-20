<?php

namespace Tests\Unit\database\seeders;

use App\Models\Game;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    /** @test */
    public function run_gameSeeder()
    {
        $arraySeed= Game::factory(Game::class)->create();

        //$this->withoutExceptionHandling();

        echo response([$arraySeed])->json();
    }
}
