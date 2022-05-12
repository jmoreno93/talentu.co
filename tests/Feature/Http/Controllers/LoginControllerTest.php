<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testLogin()
    {
        $user = User::factory()->create();
        $this->post('api/login', [
            'email' => $user->email,
            'password' => 'password',
            ])
            ->assertStatus(200);
        $this->post('api/login', [
            'email' => 'no@existe.com',
            'password' => 'falso',
            ])
            ->assertStatus(401);
    }
    public function testLoginValidate()
    {
        $this->post('api/login', [
            'email' => '',
            'password' => ''
        ])->assertSessionHasErrors('email')
        ->assertSessionHasErrors('password');
    }
    
}
