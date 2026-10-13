<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientsRouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_clients_index_route_returns_successful_response(): void
    {
        $response = $this->get('/clients');

        $response->assertStatus(200);
    }

    public function test_clients_create_route_returns_successful_response(): void
    {
        $response = $this->get('/clients/create');

        $response->assertStatus(200);
    }
}
