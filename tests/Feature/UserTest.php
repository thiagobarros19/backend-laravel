<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\User;

class UserTest extends TestCase
{
    use WithFaker;

    private $password = "mypassword";

    public function testUserCreation()
    {

       	$name = $this->faker->name();
       	$username = $this->faker->email();

        $response = $this->postJson('/api/auth/signup', [
            'name' => $name,
            'username' => $username,
            'password' => $this->password,
            'password_confirmation' => $this->password
        ]);


        $response
            ->assertStatus(201)
            ->assertExactJson([
                'message' => "Successfully created user!",
            ]);
    }//testUserCreation
}
