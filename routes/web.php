<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DestinationController as AdminDestinationController;
use App\Http\Controllers\Admin\StoryController as AdminStoryController;
use App\Http\Controllers\Admin\ProgramController as AdminProgramController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\StatController as AdminStatController;
use App\Http\Controllers\Admin\ContactMessageController as AdminContactMessageController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\PageSectionController as AdminPageSectionController;
use App\Http\Controllers\Admin\TeamMemberController as AdminTeamMemberController;
use App\Models\Destination;
use App\Models\Story;
use Illuminate\Support\Facades\Route;

// ==================== HALAMAN PUBLIK ====================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');
Route::get('/destinasi', [DestinationController::class, 'index'])->name('destinations.index');
Route::get('/destinasi/{slug}', [DestinationController::class, 'show'])->name('destinations.show');
Route::get('/untuk-sekolah', [PageController::class, 'forSchools'])->name('for-schools');
Route::get('/untuk-peneliti', [PageController::class, 'forResearchers'])->name('for-researchers');
Route::get('/mitra-desa', [PageController::class, 'forVillages'])->name('for-villages');
Route::get('/cerita', [StoryController::class, 'index'])->name('stories.index');
Route::get('/cerita/{slug}', [StoryController::class, 'show'])->name('stories.show');
Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.send')->middleware('throttle:10,1');

// Fallback Route untuk melayani file gambar storage di hosting tanpa symlink (cPanel & Hostinger)
Route::get('/storage/{path}', function (string $path) {
    $paths = [
        storage_path('app/public/' . $path),
        public_path('storage/' . $path),
        base_path('storage/app/public/' . $path),
    ];
    foreach ($paths as $file) {
        if (file_exists($file) && !is_dir($file)) {
            $mime = mime_content_type($file) ?: 'application/octet-stream';
            return response()->file($file, ['Content-Type' => $mime]);
        }
    }
    abort(404);
})->where('path', '.*');

// Admin Cache Cleaner (hanya bisa diakses jika sudah login)
Route::middleware('auth')->get('/admin/clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return redirect()->route('admin.dashboard')->with('success', 'Semua cache aplikasi (Route, Config, View) berhasil dibersihkan!');
})->name('admin.clear-cache');

// SEO Sitemap Dinamis untuk Google Search Console
Route::get('/sitemap.xml', function () {
    $destinations = Destination::where('is_active', true)->get();
    $stories = Story::where('is_active', true)->get();

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    // Static pages
    $pages = [
        ['url' => url('/'), 'priority' => '1.0', 'freq' => 'weekly'],
        ['url' => route('about'), 'priority' => '0.8', 'freq' => 'monthly'],
        ['url' => route('destinations.index'), 'priority' => '0.9', 'freq' => 'weekly'],
        ['url' => route('for-schools'), 'priority' => '0.8', 'freq' => 'monthly'],
        ['url' => route('for-researchers'), 'priority' => '0.8', 'freq' => 'monthly'],
        ['url' => route('for-villages'), 'priority' => '0.8', 'freq' => 'monthly'],
        ['url' => route('stories.index'), 'priority' => '0.8', 'freq' => 'weekly'],
        ['url' => route('contact.index'), 'priority' => '0.8', 'freq' => 'monthly'],
    ];

    foreach ($pages as $p) {
        $xml .= "  <url>\n    <loc>{$p['url']}</loc>\n    <lastmod>" . date('Y-m-d') . "</lastmod>\n    <changefreq>{$p['freq']}</changefreq>\n    <priority>{$p['priority']}</priority>\n  </url>\n";
    }

    // Destinations
    foreach ($destinations as $d) {
        $loc = route('destinations.show', $d->slug);
        $date = $d->updated_at->format('Y-m-d');
        $xml .= "  <url>\n    <loc>{$loc}</loc>\n    <lastmod>{$date}</lastmod>\n    <changefreq>monthly</changefreq>\n    <priority>0.8</priority>\n  </url>\n";
    }

    // Stories
    foreach ($stories as $s) {
        $loc = route('stories.show', $s->slug);
        $date = ($s->published_at ?? $s->updated_at)->format('Y-m-d');
        $xml .= "  <url>\n    <loc>{$loc}</loc>\n    <lastmod>{$date}</lastmod>\n    <changefreq>monthly</changefreq>\n    <priority>0.7</priority>\n  </url>\n";
    }

    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'application/xml');
})->name('sitemap');

// Auth Routes (Laravel Breeze)
require __DIR__.'/auth.php';

// ==================== PANEL ADMIN DESTINARA ====================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('destinations', AdminDestinationController::class)->except(['show']);
    Route::resource('stories', AdminStoryController::class)->except(['show']);
    Route::resource('programs', AdminProgramController::class)->except(['show']);
    Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);
    Route::resource('stats', AdminStatController::class)->except(['show']);

    // Konten Halaman & Section (Full CMS)
    Route::get('pages', [AdminPageSectionController::class, 'index'])->name('pages.index');
    Route::get('pages/{page}/edit', [AdminPageSectionController::class, 'edit'])->name('pages.edit');
    Route::put('pages/{page}', [AdminPageSectionController::class, 'update'])->name('pages.update');
    Route::post('pages/{page}/toggle', [AdminPageSectionController::class, 'toggle'])->name('pages.toggle');

    // Dewan Kurator & Tim Lapangan
    Route::resource('team', AdminTeamMemberController::class)->except(['show']);

    // Pesan Masuk (Inbox)
    Route::get('messages', [AdminContactMessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [AdminContactMessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{message}/toggle-read', [AdminContactMessageController::class, 'toggleRead'])->name('messages.toggle-read');
    Route::post('messages/mark-all-read', [AdminContactMessageController::class, 'markAllRead'])->name('messages.mark-all-read');
    Route::delete('messages/{message}', [AdminContactMessageController::class, 'destroy'])->name('messages.destroy');

    // Pengaturan Website
    Route::get('settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::put('settings', [AdminSettingController::class, 'update'])->name('settings.update');
});