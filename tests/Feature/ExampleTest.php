<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginScreenIsAvailable()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testGoingToTheHomePageRedirectsToLoginScreen()
    {
        $response = $this->get('/');

        $response->assertStatus(302)
            ->assertRedirect('/login');
    }
}
