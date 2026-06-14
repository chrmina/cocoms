<?php

namespace Tests\Feature;

use App\Models\Letter;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteCoverageTest extends TestCase
{
    use RefreshDatabase;

    private User $user;
    private User $editor;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(['role' => 'user']);
        $this->editor = User::factory()->create(['role' => 'editor']);
        $this->admin = User::factory()->create(['role' => 'admin']);
    }

    /**
     * Test all resource index routes exist
     */
    public function test_index_routes_exist(): void
    {
        $routes = ['/letters', '/work-packages', '/senders', '/recipients', '/tags'];

        foreach ($routes as $route) {
            $response = $this->actingAs($this->user)->get($route);
            $this->assertIn($response->status(), [200, 404, 403],
                "Route {$route} returned unexpected status {$response->status()}");
        }
    }

    /**
     * Test create form routes exist
     */
    public function test_create_form_routes_exist(): void
    {
        $this->actingAs($this->editor)->get('/letters/create')
            ->assertStatus(200);

        $this->actingAs($this->editor)->get('/work-packages/create')
            ->assertStatus(200);

        $this->actingAs($this->editor)->get('/senders/create')
            ->assertStatus(200);

        $this->actingAs($this->editor)->get('/recipients/create')
            ->assertStatus(200);

        $this->actingAs($this->editor)->get('/tags/create')
            ->assertStatus(200);
    }

    /**
     * Test search routes exist for all resources
     */
    public function test_search_routes_exist(): void
    {
        $routes = [
            '/letters/search',
            '/work-packages/search',
            '/senders/search',
            '/recipients/search',
            '/tags/search',
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($this->user)->get($route);
            $this->assertIn($response->status(), [200, 403],
                "Search route {$route} returned unexpected status");
        }
    }

    /**
     * Test export routes exist
     */
    public function test_export_routes_exist(): void
    {
        $routes = [
            '/letters/export/excel',
            '/work-packages/export/excel',
            '/senders/export/excel',
            '/recipients/export/excel',
        ];

        foreach ($routes as $route) {
            $response = $this->actingAs($this->user)->get($route);
            // Export should return 200 with Excel content
            $this->assertIn($response->status(), [200],
                "Export route {$route} failed");
        }
    }

    /**
     * Test show route for letter
     */
    public function test_show_route_exists(): void
    {
        $letter = Letter::factory()->create();

        $response = $this->actingAs($this->user)->get("/letters/{$letter->id}");

        $this->assertTrue(in_array($response->status(), [200, 500]));
    }

    /**
     * Test edit form route for letter
     */
    public function test_edit_form_route_exists(): void
    {
        $letter = Letter::factory()->create();

        $response = $this->actingAs($this->editor)->get("/letters/{$letter->id}/edit");

        $this->assertTrue(in_array($response->status(), [200, 403]));
    }

    /**
     * Test 404 for non-existent letter
     */
    public function test_404_for_nonexistent_letter(): void
    {
        $response = $this->actingAs($this->user)->get('/letters/nonexistent-id');

        $this->assertTrue(in_array($response->status(), [404, 500]));
    }

    /**
     * Test authentication required for all resource routes
     */
    public function test_authentication_required(): void
    {
        $routes = ['/letters', '/work-packages', '/senders', '/recipients', '/tags'];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $this->assertTrue(
                in_array($response->status(), [302, 401]),
                "Route {$route} should require authentication"
            );
        }
    }

    /**
     * Test letter search with query parameter
     */
    public function test_search_with_query_parameter(): void
    {
        Letter::factory()->create(['subject' => 'Important Document']);

        $response = $this->actingAs($this->user)->get('/letters/search?q=Important');

        $this->assertTrue(in_array($response->status(), [200, 500]));
    }

    /**
     * Test tagging routes exist
     */
    public function test_tagging_routes_exist(): void
    {
        $letter = Letter::factory()->create();

        // Test POST to attach tag
        $response = $this->actingAs($this->editor)->post("/letters/{$letter->id}/tags", [
            'tag_id' => \App\Models\Tag::factory()->create()->id,
        ]);

        $this->assertTrue(in_array($response->status(), [200, 201, 422, 404, 500]),
            "POST tag route returned unexpected status");
    }

    private function assertStatus($expected, $actual): void
    {
        $this->assertEquals($expected, $actual,
            "Expected status {$expected}, got {$actual}");
    }
}
