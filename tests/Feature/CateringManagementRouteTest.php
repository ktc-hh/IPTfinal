<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CateringManagementRouteTest extends TestCase
{
    use RefreshDatabase;

    public function test_packages_routes_return_successful_responses(): void
    {
        $this->get('/packages')->assertStatus(200);
        $this->get('/packages/create')->assertStatus(200);
    }

    public function test_bookings_routes_return_successful_responses(): void
    {
        $this->get('/bookings')->assertStatus(200);
        $this->get('/bookings/create')->assertStatus(200);
    }
}
