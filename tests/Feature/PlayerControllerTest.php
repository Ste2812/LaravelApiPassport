<?php

namespace Tests\Feature;

use App\Models\Game;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerControllerTest extends TestCase
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

    /** @test */
    public function player_update()
    {
        //$this->withoutExceptionHandling();

        $player = User::factory(1)->create();

        $this->put(route("/api/users/players/{$player[0]->id}"), [
            'username' => 'PlayerRogueOne',
            ]);

            $player= User::findOrFail($player->username);

            $this->assertEquals($player->username, 'PlayerRogueOne');
            $this->assertEquals($player->email, 'player#02@player.com');

            $response = $this->get("/api/users/players/{$player->id}");
            $response->assertStatus(200);
    }

    /** @test */
    public function games_can_be_retrieved()
    {
        $play= Game::factory(1)->create();

        $response= $this->get(route("api/users/players/{$play[0]->id}/games"));

        //response()->json([$play->id]);

        $response->assertOk();

        //$play= Game::first();

    }

    /** @test */
    public function games_can_be_deleted()
    {
        $game= Game::factory(1)->create();

        $response= $this->delete("/api/users/players/{$game[0]->user_id}/games");

        $this->assertCount(0, Game::all());

        $response->assertOk();

    }
}
