<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;

class RegisterUserTest extends TestCase
{
	use RefreshDatabase;

	public function testRegisterNewUserAndRedirectToHomepage()
    {
        $response = $this->post('/register', [
            'name' => 'New Person',
            'email' => 'new@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/');
    }

    public function testRegisterNewUserAndSeeItInTheDatabase()
    {
        $response = $this->post('/register', [
            'name' => 'New Person',
            'email' => 'new@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertDatabaseHas('users', [
        	'email' => 'new@gmail.com'
        ]);
    }

    public function testRegisterWithKnownEmailShouldShowValidationErrors()
    {
        $user = factory(User::class)->create([
            'email' => 'register@gmail.com',
        ]);

        $response = $this->post('/register', [
            'name' => 'My Name',
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }
}
