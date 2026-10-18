<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Database\Seeders\DatabaseSeeder;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example for public homepage.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed(DatabaseSeeder::class);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('S1 Pariwisata');
    }

    /**
     * Test public pages load successfully.
     */
    public function test_public_pages_load_successfully(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->get('/profil')->assertStatus(200);
        $this->get('/akademik')->assertStatus(200);
        $this->get('/berita')->assertStatus(200);
        $this->get('/kontak')->assertStatus(200);
        $this->get('/kemahasiswaan')->assertStatus(200);
        $this->get('/spmb-2026')->assertStatus(200);
    }

    /**
     * Test admin dashboard authentication guard.
     */
    public function test_admin_is_redirected_to_login_when_unauthenticated(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/login');
    }
}
