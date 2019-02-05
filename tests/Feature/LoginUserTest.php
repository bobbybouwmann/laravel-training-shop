<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginUserTest extends TestCase
{
    public function testLoginUserUsingLoginForm()
    {
        $user = factory(User::class)->create([
        	'name' => 'Bobby',
        	'email' => 'login@gmail.com',
        ]);

        $response = $this->post('/login', [
        	'email' => $user->email,
        	'password' => 'secret', // Default password in UserFactory
        ]);

        $response->assertRedirect('/');
    }
}
