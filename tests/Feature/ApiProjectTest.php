<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     /** @test */
     public function player_can_be_created()
     {

        $this->withoutExceptionHandling();
        
        $response = $this->post('api/users/players', [
            'id' => '1',
            'username' => 'Player200',
            'email' => 'player200@player.com',
            'password' => 'password200',
            'password_confirmation' => 'password200',
            ])->assignRole('user');

            $response->assertOk();
            $this->assertCount(1, User::all());

            $player= User::first();

            $this->assertEquals($player->username, 'Player200');
            $this->assertEquals($player->email, 'player200@player.com');
            $this->assertEquals($player->password, 'password200');
            $this->assertEquals($player->password_confirmation, 'password200');

     }
}
