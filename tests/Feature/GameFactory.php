<?php

namespace Tests\Feature\database\factories;

use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class GameFactory extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function run_gameFactory()
    {
        //$games= factory(Game::class)->create();


        //return response("ok!")->json([$games]);

    }
}
