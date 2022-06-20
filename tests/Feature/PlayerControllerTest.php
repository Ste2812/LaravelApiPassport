<?php

namespace Tests\Feature;

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

        $this->put("/api/users/players/{$player[0]}", [
            'username' => 'PlayerRogueOne',
            ]);

            $player= User::findOrFail($player->username);

            $this->assertEquals($player->username, 'PlayerRogueOne');
            $this->assertEquals($player->email, 'player#02@player.com');

            $response = $this->get("/api/users/players/{$player->id}");
            $response->assertStatus(200);


    }
}
