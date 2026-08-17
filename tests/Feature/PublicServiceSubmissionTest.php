<?php

namespace Tests\Feature;

use App\Models\MunicipalService;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicServiceSubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_request_form_creates_a_citizen_request(): void
    {
        $user = User::create([
            'cin' => '12345678',
            'name' => 'Test Citizen',
            'email' => 'citizen@example.com',
            'password' => bcrypt('password'),
        ]);

        MunicipalService::create([
            'name_fr' => 'Service Test',
            'name_en' => 'Test Service',
            'name_ar' => 'خدمة اختبار',
            'slug' => 'test-service',
            'is_active' => true,
        ]);

        $response = $this->actingAs($user)->post('/services/request', [
            'service_id' => 1,
            'description' => 'Une demande de test suffisament détaillée.',
            'priority' => 'medium',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('citizen_requests', [
            'user_id' => '12345678',
            'service_id' => 1,
        ]);
    }

    public function test_complaint_form_creates_a_complaint(): void
    {
        $user = User::create([
            'cin' => '87654321',
            'name' => 'Another Citizen',
            'email' => 'another@example.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->actingAs($user)->post('/services/complaint', [
            'category' => 'services',
            'description' => 'Description de la plainte assez détaillée pour valider.',
            'email' => 'another@example.com',
            'phone' => '0600000000',
            'priority' => 'medium',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('complaints', [
            'user_id' => '87654321',
            'category' => 'services',
        ]);
    }

    public function test_contact_form_creates_a_contact_message(): void
    {
        $response = $this->post('/services/contact', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'subject' => 'Support',
            'message' => 'Bonjour, j’ai une question concernant votre service.',
        ]);

        $response->assertRedirect('/');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('contacts', [
            'email' => 'john@example.com',
            'service_fr' => 'Support',
        ]);
    }
}
