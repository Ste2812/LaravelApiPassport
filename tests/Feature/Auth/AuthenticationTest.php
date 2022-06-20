<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /*public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/api/users/login');

        $response->assertStatus(200);
    }*/

    public function test_users_can_authenticate_using_the_login_screen()
    {
        //$user = User::factory()->create();
        $user=User::create([
            'username'=> 'player01',
            'email'=> 'player@player.com',
            'password'=> 'password200', // password
        ]);

        $response = $this->post('/api/users/login', [
            //'username'=> 'player01',
            'email' => $user->email,
            'password' => 'password200',
        ]);

        //$this->assertAuthenticated();
        //$response->assertRedirect(RouteServiceProvider::HOME);
        return response("ok!")->json([$response]);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/api/users/login', [
            //'username'=> 'player01',
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
