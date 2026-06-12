<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_dashboard_user_route_returns_successful_response_for_authenticated_user(): void
    {
        $user = User::factory()->create([
            'nome' => 'Usuário Teste',
            'email' => 'teste@example.com',
            'tipo' => 'cliente',
        ]);

        $response = $this->actingAs($user)->get('/dashboard-user');

        $response->assertStatus(200);
    }
}
