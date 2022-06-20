<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
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
    public function player_can_be_registered()
    {
        //$this->withoutExceptionHandling();
        //$player = User::factory(1)->create();

        $response= $this->post("/api/users/players", [
            'username' => 'Player100',
            'email' => 'player#100@player.com',
            'password' => 'password100',
            'password_confirmation' => 'password100',
        ]);

        $response->assertStatus(200);

        $this->assertCount(1, User::all());

        $player = User::first();

        $this->assertEquals($player->username, 'Player100');
        $this->assertEquals($player->email, 'player#100@player.com');
        $this->assertEquals($player->password, 'password100');
        $this->assertEquals($player->password_confirmation, 'password100');

        $response->get("/api/users/players/{$player->id}");

    }

    /** @test */
    public function player_can_be_deleted()
    {
        //$this->withoutExceptionHandling();
        $player = User::factory(1)->create();
        $response= $this->delete("/api/users/players/{$player[0]->id}");
        //$users= User::all();


        $response= $this->delete($player[0]->id);

        $response->assertStatus(200);
    }
}
