<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        //$response = $this->get('/api/users/signup');
        $response = $this->get('/api/users/signup');

        //$response->assertStatus(200);
        response()->json([$response]);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/api/users/signup', [
            'username' => 'player01',
            'email' => 'player@player.com',
            'password' => 'password200',
            'password_confirmation' => 'password200',
        ]);

        //$this->assertAuthenticated();
        //$response->assertRedirect(RouteServiceProvider::HOME);
        return response("ok!")->json([$response]);
    }
}
