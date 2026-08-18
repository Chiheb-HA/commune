<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProfileRouteTest extends TestCase
{
    public function test_profile_route_redirects_guests_to_login(): void
    {
        $response = $this->get('/profile');

        $response->assertRedirect('/connexion');
    }
}
