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

    /**
     * Test all admin pages return 200 OK when authenticated (No 500 Server Internal Error).
     */
    public function test_all_admin_pages_load_successfully(): void
    {
        $this->seed(DatabaseSeeder::class);
        $user = \App\Models\User::first();

        $adminRoutes = [
            '/admin',
            '/admin/berita',
            '/admin/landing',
            '/admin/banner-logo',
            '/admin/profil',
            '/admin/kurikulum',
            '/admin/kemahasiswaan',
            '/admin/link',
            '/admin/pengaturan',
        ];

        foreach ($adminRoutes as $route) {
            $response = $this->actingAs($user)->get($route);
            $response->assertStatus(200);
        }
    }

    /**
     * Test updating leadership profile and settings propagates without 500 error.
     */
    public function test_updating_leadership_profile_and_settings(): void
    {
        $this->seed(DatabaseSeeder::class);
        $user = \App\Models\User::first();

        // 1. Update existing leadership item (Kaprodi)
        $kaprodi = \App\Models\ProfileItem::where('kategori', 'Tata Kelola & Pimpinan')
            ->where('label', 'Ketua Program Studi')
            ->first();

        $updateResponse = $this->actingAs($user)->put("/admin/profil/{$kaprodi->id}", [
            'kategori' => 'Tata Kelola & Pimpinan',
            'label' => 'Ketua Program Studi',
            'isi' => 'Eka Mariyanti, S.E., M.M., M.Par., Ph.D. (Updated)',
            'keterangan' => 'Wisudawati Terbaik Magister Pariwisata',
        ]);
        $updateResponse->assertRedirect('/admin/profil');

        // Check in public profil page
        $publicProfil = $this->get('/profil');
        $publicProfil->assertStatus(200);
        $publicProfil->assertSee('Eka Mariyanti, S.E., M.M., M.Par., Ph.D. (Updated)');

        // 2. Update leadership section header via settings
        $settingsResponse = $this->actingAs($user)->post('/admin/pengaturan', [
            'pimpinan_eyebrow' => 'Tata Kelola Baru',
            'pimpinan_title' => 'Pimpinan & Pengajar Resmi',
            'pimpinan_desc' => 'Deskripsi pimpinan yang telah diubah.',
        ]);
        $settingsResponse->assertRedirect('/admin/pengaturan');

        $publicProfilAfterSetting = $this->get('/profil');
        $publicProfilAfterSetting->assertStatus(200);
        $publicProfilAfterSetting->assertSee('Tata Kelola Baru');
        $publicProfilAfterSetting->assertSee('Pimpinan & Pengajar Resmi');
    }
}
