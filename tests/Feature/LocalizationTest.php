<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocalizationTest extends TestCase
{
    /**
     * Test language switcher endpoint.
     */
    public function test_language_switch_endpoint(): void
    {
        $locales = ['id', 'en', 'zh', 'ja', 'de', 'fr', 'nl'];
        foreach ($locales as $locale) {
            $response = $this->get('/lang/' . $locale);
            $response->assertRedirect();
            $response->assertSessionHas('locale', $locale);
            $response->assertCookie('destinara_locale', $locale);
        }
    }

    /**
     * Test all primary pages render 200 OK in all 7 languages.
     */
    public function test_pages_render_in_all_locales(): void
    {
        $locales = ['id', 'en', 'zh', 'ja', 'de', 'fr', 'nl'];
        $routes = [
            '/',
            '/' . 'tentang-kami',
            '/' . 'untuk-sekolah',
            '/' . 'untuk-peneliti',
            '/' . 'mitra-desa',
            '/' . 'destinasi',
            '/' . 'cerita',
            '/' . 'kontak',
            '/' . 'syarat-ketentuan',
            '/' . 'kebijakan-privasi',
            '/' . 'login',
        ];

        foreach ($locales as $locale) {
            foreach ($routes as $route) {
                $response = $this->withSession(['locale' => $locale])
                    ->withUnencryptedCookies(['destinara_locale' => $locale])
                    ->get($route);

                $this->assertEquals(
                    200,
                    $response->getStatusCode(),
                    "Route {$route} failed for locale {$locale}"
                );
            }
        }
    }

    /**
     * Test specific translation phrases appear based on active locale.
     */
    public function test_translations_render_properly(): void
    {
        // English Home
        $resEn = $this->withSession(['locale' => 'en'])->get('/');
        $resEn->assertSee('Curated Sanctuaries');
        $resEn->assertSee('Field Researchers');

        // Chinese Home
        $resZh = $this->withSession(['locale' => 'zh'])->get('/');
        $resZh->assertSee('探索目的地');

        // Japanese Home
        $resJa = $this->withSession(['locale' => 'ja'])->get('/');
        $resJa->assertSee('厳選された自然環境');

        // German Home
        $resDe = $this->withSession(['locale' => 'de'])->get('/');
        $resDe->assertSee('Kuratierte Schutzgebiete');

        // French Home
        $resFr = $this->withSession(['locale' => 'fr'])->get('/');
        $resFr->assertSee('Sanctuaires');

        // Dutch Home
        $resNl = $this->withSession(['locale' => 'nl'])->get('/');
        $resNl->assertSee('Gecureerde Reservaten');

        // Indonesian Home
        $resId = $this->withSession(['locale' => 'id'])->get('/');
        $resId->assertSee('Tapak Terkurasi');
        $resId->assertSee('Peneliti Lapangan');
    }
}
