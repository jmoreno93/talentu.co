<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testUserList()
    {
        $this->withoutMiddleware();
        $response = $this->get('api/v1/user');
        $response->assertStatus(200);
    }
    public function testUser()
    {
        $user = User::factory()->create();
        $this->withoutMiddleware();
        $response = $this->get("api/v1/user/$user->id");
        $response->assertStatus(200);
    }
    public function testUserValidation()
    {
        $this->withoutMiddleware();
        //Create
        $this->post("api/v1/user", [
            'document_type' => 'DNI',
            'document_number' => '00157294',
            'email' => 'testing@hola.com',
            'password' => '123456789',
        ])->assertStatus(200);
        
        //Duplicate
        $this->post("api/v1/user", [
            'document_type' => 'DNI',
            'document_number' => '00157294',
            'email' => 'testing@hola.com',
            'password' => '123456789',
        ])->assertStatus(422);
        
        //Empty
        $this->post("api/v1/user", [
            'document_type' => '',
            'document_number' => '',
            'email' => '',
            'password' => '',
        ])
        ->assertSessionHasErrors('document_type')
        ->assertSessionHasErrors('document_number')
        ->assertSessionHasErrors('email')
        ->assertSessionHasErrors('password');
    }
    public function testUserDestroy()
    {
        $user = User::factory()->create();
        $this->withoutMiddleware();
        $response = $this->delete("api/v1/user/$user->id");
        $response->assertStatus(200);
    }
}
