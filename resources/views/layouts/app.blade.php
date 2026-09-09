<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <title>@yield('title', 'Destinara — Menghidupkan Ruang Belajar Nyata di Tapak Nusantara')</title>
  <meta name="description" content="@yield('meta_description', 'Inisiatif pendidikan lapangan dan riset berbasis komunitas yang menjembatani kurikulum institusi dengan kearifan tapak dan pengetahuan lokal di seluruh Nusantara.')"/>

  <!-- Favicon Configuration -->
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}"/>
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}"/>
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}"/>
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}"/>
  <link rel="manifest" href="{{ asset('site.webmanifest') }}"/>
  <meta name="theme-color" content="#703a3a"/>

  <!-- Preconnect & Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin=""/>
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;1,6..72,400&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..24,400,0..1,0" rel="stylesheet"/>

  <!-- Tailwind CDN & Configuration for Destinara Design System -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#703a3a",
            "primary-container": "#8c5151",
            "on-primary": "#ffffff",
            "on-primary-container": "#ffd3d2",
            "primary-fixed": "#ffdad9",
            "primary-fixed-dim": "#ffb3b2",
            "secondary": "#51634b",
            "secondary-container": "#d4e9ca",
            "on-secondary": "#ffffff",
            "on-secondary-container": "#576951",
            "secondary-fixed": "#d4e9ca",
            "secondary-fixed-dim": "#b8ccaf",
            "tertiary": "#684200",
            "tertiary-container": "#86580d",
            "on-tertiary": "#ffffff",
            "on-tertiary-container": "#ffd7a7",
            "tertiary-fixed": "#ffddb5",
            "tertiary-fixed-dim": "#f8bb6a",
            "surface": "#fff8f6",
            "surface-dim": "#e8d6d1",
            "surface-bright": "#fff8f6",
            "surface-container-lowest": "#ffffff",
            "surface-container-low": "#fff1ed",
            "surface-container": "#fdeae5",
            "surface-container-high": "#f7e4df",
            "surface-container-highest": "#f1dfd9",
            "on-surface": "#231917",
            "on-surface-variant": "#524343",
            "inverse-surface": "#392e2b",
            "inverse-on-surface": "#ffede8",
            "outline": "#847372",
            "outline-variant": "#d7c2c1",
            "background": "#fff8f6",
            "on-background": "#231917"
          },
          borderRadius: {
            DEFAULT: "0.25rem",
            sm: "0.125rem",
            md: "0.375rem",
            lg: "0.5rem",
            xl: "0.75rem",
            full: "9999px"
          },
          spacing: {
            "space-2xs": "0.25rem",
            "space-xs": "0.5rem",
            "space-sm": "0.75rem",
            "space-md": "1rem",
            "space-lg": "1.5rem",
            "space-xl": "2rem",
            "space-2xl": "3rem",
            "space-3xl": "4.5rem",
            "space-4xl": "6.5rem",
            "gutter-desktop": "2rem",
            "gutter-mobile": "1.25rem"
          },
          fontFamily: {
            "display-hero": ["Newsreader", "Georgia", "serif"],
            "headline-lg": ["Newsreader", "Georgia", "serif"],
            "headline-md": ["Newsreader", "Georgia", "serif"],
            "headline-sm": ["Newsreader", "Georgia", "serif"],
            "caption-fieldnote": ["Newsreader", "Georgia", "serif"],
            "body-lead": ["Work Sans", "sans-serif"],
            "body-default": ["Work Sans", "sans-serif"],
            "body-sm": ["Work Sans", "sans-serif"],
            "label-action": ["Work Sans", "sans-serif"],
            "label-tag": ["Work Sans", "sans-serif"]
          },
          fontSize: {
            "display-hero": ["56px", { lineHeight: "64px", letterSpacing: "-0.02em", fontWeight: "400" }],
            "headline-lg": ["40px", { lineHeight: "48px", letterSpacing: "-0.015em", fontWeight: "400" }],
            "headline-md": ["28px", { lineHeight: "36px", fontWeight: "400" }],
            "headline-sm": ["22px", { lineHeight: "30px", fontWeight: "500" }],
            "body-lead": ["19px", { lineHeight: "30px", fontWeight: "400" }],
            "body-default": ["17px", { lineHeight: "28px", fontWeight: "400" }],
            "body-sm": ["15px", { lineHeight: "24px", fontWeight: "400" }],
            "caption-fieldnote": ["15px", { lineHeight: "22px", fontWeight: "400" }],
            "label-action": ["15px", { lineHeight: "20px", letterSpacing: "0.01em", fontWeight: "600" }],
            "label-tag": ["13px", { lineHeight: "18px", letterSpacing: "0.02em", fontWeight: "500" }]
          }
        }
      }
    };
  </script>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-surface font-body-default text-body-default text-on-surface">

  <!-- ==================== HEADER ==================== -->
  <header class="fixed top-0 w-full z-50 bg-surface/90 backdrop-blur-md shadow-[0_1px_8px_rgba(0,0,0,0.04)] border-b border-outline-variant/30">
    <div class="h-14 md:h-[58px] max-w-[1440px] mx-auto px-gutter-mobile md:px-gutter-desktop flex items-center justify-between">
      <!-- Brand Logo -->
      <a href="{{ route('home') }}" class="flex items-center gap-space-sm group flex-shrink-0">
        <img alt="Destinara Logo" class="h-7 md:h-[30px] w-auto object-contain transition-transform group-hover:scale-105" src="{{ asset('assets/img/logo-horizontal.png') }}"/>
      </a>

      <!-- Right Nav & Actions Group -->
      <div class="flex items-center gap-4 xl:gap-6">
        <!-- Desktop Nav -->
        <nav class="hidden lg:flex items-center gap-3.5 xl:gap-5 flex-shrink-0">
          <a href="{{ route('home') }}" class="relative py-1 font-body-sm text-[14px] xl:text-body-sm transition-colors group {{ request()->routeIs('home') ? 'text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}">
            <span>Beranda</span>
            <span class="absolute bottom-0 left-0 h-[2px] bg-primary rounded-full transition-all duration-300 {{ request()->routeIs('home') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
          </a>
          <a href="{{ route('about') }}" class="relative py-1 font-body-sm text-[14px] xl:text-body-sm transition-colors group {{ request()->routeIs('about') ? 'text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}">
            <span>Tentang Kami</span>
            <span class="absolute bottom-0 left-0 h-[2px] bg-primary rounded-full transition-all duration-300 {{ request()->routeIs('about') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
          </a>
          <a href="{{ route('for-schools') }}" class="relative py-1 font-body-sm text-[14px] xl:text-body-sm transition-colors group {{ request()->routeIs('for-schools') ? 'text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}">
            <span>Untuk Sekolah</span>
            <span class="absolute bottom-0 left-0 h-[2px] bg-primary rounded-full transition-all duration-300 {{ request()->routeIs('for-schools') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
          </a>
          <a href="{{ route('for-researchers') }}" class="relative py-1 font-body-sm text-[14px] xl:text-body-sm transition-colors group {{ request()->routeIs('for-researchers') ? 'text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}">
            <span>Untuk Peneliti</span>
            <span class="absolute bottom-0 left-0 h-[2px] bg-primary rounded-full transition-all duration-300 {{ request()->routeIs('for-researchers') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
          </a>
          <a href="{{ route('for-villages') }}" class="relative py-1 font-body-sm text-[14px] xl:text-body-sm transition-colors group {{ request()->routeIs('for-villages') ? 'text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}">
            <span>Untuk Pengelola Destinasi</span>
            <span class="absolute bottom-0 left-0 h-[2px] bg-primary rounded-full transition-all duration-300 {{ request()->routeIs('for-villages') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
          </a>
          <a href="{{ route('stories.index') }}" class="relative py-1 font-body-sm text-[14px] xl:text-body-sm transition-colors group {{ request()->routeIs('stories.*') ? 'text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}">
            <span>Cerita</span>
            <span class="absolute bottom-0 left-0 h-[2px] bg-primary rounded-full transition-all duration-300 {{ request()->routeIs('stories.*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
          </a>
          <a href="{{ route('contact.index') }}" class="relative py-1 font-body-sm text-[14px] xl:text-body-sm transition-colors group {{ request()->routeIs('contact.index') ? 'text-primary font-semibold' : 'text-on-surface-variant hover:text-primary' }}">
            <span>Kontak</span>
            <span class="absolute bottom-0 left-0 h-[2px] bg-primary rounded-full transition-all duration-300 {{ request()->routeIs('contact.index') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
          </a>
        </nav>

        <!-- Header Actions -->
        <div class="flex items-center gap-space-xs sm:gap-space-sm">
          <a href="{{ route('destinations.index') }}" class="hidden lg:inline-flex bg-primary-container text-on-primary font-label-action text-xs sm:text-[13px] md:text-sm px-3 sm:px-4 md:px-5 py-1.5 md:py-2 rounded-lg hover:bg-primary transition-colors items-center justify-center shadow-sm whitespace-nowrap">
            <span>Jelajahi Destinasi</span>
          </a>
          <!-- Mobile Toggle Button -->
          <button id="mobileMenuBtn" aria-label="Buka Menu Navigasi" class="lg:hidden p-2 text-on-surface hover:text-primary hover:bg-surface-container rounded-lg transition-colors flex items-center justify-center min-h-[40px] min-w-[40px]">
            <span class="material-symbols-outlined text-[24px]">menu</span>
          </button>
        </div>
      </div>
    </div>
  </header>

  <!-- Mobile Drawer Overlay -->
  <div id="mobileMenuOverlay" class="fixed inset-0 bg-inverse-surface/50 backdrop-blur-sm z-40 hidden opacity-0 transition-opacity duration-300 lg:hidden"></div>

  <!-- Mobile Fullscreen Menu (Slide Up dari Bawah — Persis JADISATU) -->
  <div id="mobileMenuDrawer" class="fixed inset-0 z-50 bg-surface flex flex-col justify-between p-6 sm:p-8 overflow-y-auto lg:hidden" aria-modal="true" role="dialog">
    <div>
      <!-- Header with Brand & Close Button -->
      <div class="flex items-center justify-between pb-5 mb-5 border-b border-outline-variant/30">
        <div class="flex items-center gap-3">
          <img class="h-8 sm:h-9 w-auto object-contain" src="{{ asset('assets/img/logo-horizontal.png') }}" alt="Destinara Logo"/>
        </div>
        <button id="mobileMenuCloseBtn" aria-label="Tutup Menu" class="w-10 h-10 rounded-xl bg-surface-container hover:bg-surface-container-high text-on-surface-variant hover:text-primary flex items-center justify-center transition-colors shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
      
      <!-- Navigation Links -->
      <nav class="space-y-1.5">
        <a href="{{ route('home') }}" class="mobile-nav-link flex items-center justify-between px-4 py-3.5 rounded-2xl text-base font-semibold transition-all border border-transparent hover:border-outline-variant/30 {{ request()->routeIs('home') ? 'bg-surface-container text-primary font-bold border-outline-variant/40' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
          <span>Beranda</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('about') }}" class="mobile-nav-link flex items-center justify-between px-4 py-3.5 rounded-2xl text-base font-semibold transition-all border border-transparent hover:border-outline-variant/30 {{ request()->routeIs('about') ? 'bg-surface-container text-primary font-bold border-outline-variant/40' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
          <span>Tentang Kami</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('for-schools') }}" class="mobile-nav-link flex items-center justify-between px-4 py-3.5 rounded-2xl text-base font-semibold transition-all border border-transparent hover:border-outline-variant/30 {{ request()->routeIs('for-schools') ? 'bg-surface-container text-primary font-bold border-outline-variant/40' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
          <span>Untuk Sekolah</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('for-researchers') }}" class="mobile-nav-link flex items-center justify-between px-4 py-3.5 rounded-2xl text-base font-semibold transition-all border border-transparent hover:border-outline-variant/30 {{ request()->routeIs('for-researchers') ? 'bg-surface-container text-primary font-bold border-outline-variant/40' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
          <span>Untuk Peneliti</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('for-villages') }}" class="mobile-nav-link flex items-center justify-between px-4 py-3.5 rounded-2xl text-base font-semibold transition-all border border-transparent hover:border-outline-variant/30 {{ request()->routeIs('for-villages') ? 'bg-surface-container text-primary font-bold border-outline-variant/40' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
          <span>Untuk Pengelola Destinasi</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('stories.index') }}" class="mobile-nav-link flex items-center justify-between px-4 py-3.5 rounded-2xl text-base font-semibold transition-all border border-transparent hover:border-outline-variant/30 {{ request()->routeIs('stories.*') ? 'bg-surface-container text-primary font-bold border-outline-variant/40' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
          <span>Cerita Lapangan</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('contact.index') }}" class="mobile-nav-link flex items-center justify-between px-4 py-3.5 rounded-2xl text-base font-semibold transition-all border border-transparent hover:border-outline-variant/30 {{ request()->routeIs('contact.index') ? 'bg-surface-container text-primary font-bold border-outline-variant/40' : 'text-on-surface-variant hover:text-primary hover:bg-surface-container' }}">
          <span>Kontak &amp; Kemitraan</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
      </nav>
    </div>

    <!-- Footer Action inside Fullscreen Menu (Persis JADISATU) -->
    <div class="mt-8 pt-5 border-t border-outline-variant/30 space-y-3">
      <!-- Tombol Jelajahi Destinasi (Dipindahkan dari Header ke Popup) -->
      <a href="{{ route('destinations.index') }}" class="w-full bg-primary-container hover:bg-primary text-on-primary font-bold py-3.5 px-6 rounded-2xl flex items-center justify-center gap-2.5 transition-all text-sm active:scale-98 shadow-sm">
        <span>Jelajahi Destinasi</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
        </svg>
      </a>
      <a href="{{ route('contact.index') }}" class="w-full border border-outline-variant/60 hover:border-primary text-on-surface-variant hover:text-primary font-medium py-3 px-6 rounded-2xl flex items-center justify-center gap-2 transition-all text-sm">
        <span>Konsultasikan Program</span>
      </a>
      <div class="text-center text-xs text-outline italic pt-1">
        Pendidikan lapangan kontekstual &amp; riset kearifan lokal
      </div>
    </div>
  </div>

  <!-- ==================== MAIN CONTENT ==================== -->
  @yield('content')

  <!-- ==================== FOOTER ==================== -->
  <footer class="w-full bg-surface-container-low py-space-3xl mt-space-3xl shadow-[0_-1px_8px_rgba(0,0,0,0.02)] border-t border-outline-variant/30">
    <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-space-lg md:gap-space-2xl pb-space-xl md:pb-space-2xl">
        <!-- Kolom 1: Perusahaan -->
        <div class="flex flex-col gap-space-sm">
          <h4 class="font-headline-sm text-headline-sm text-on-surface">Perusahaan</h4>
          <ul class="flex flex-col gap-space-xs">
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('about') }}">Tentang Destinara</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('about') }}#filosofi">Filosofi Pendidikan</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('about') }}#rekam-jejak">Rekam Jejak Lapangan</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('destinations.index') }}">Sanggar Lapangan Terpilih</a></li>
          </ul>
        </div>
        <!-- Kolom 2: Untuk Pengguna -->
        <div class="flex flex-col gap-space-sm">
          <h4 class="font-headline-sm text-headline-sm text-on-surface">Untuk Pengguna</h4>
          <ul class="flex flex-col gap-space-xs">
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('for-schools') }}">Program Sekolah &amp; Study Tour</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('for-researchers') }}">Riset &amp; Kolaborasi Kampus</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('for-villages') }}">Kemitraan Pengelola Desa</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('about') }}#fpic">Etika Persetujuan FPIC</a></li>
          </ul>
        </div>
        <!-- Kolom 3: Publikasi & Warta -->
        <div class="flex flex-col gap-space-sm">
          <h4 class="font-headline-sm text-headline-sm text-on-surface">Publikasi &amp; Warta</h4>
          <ul class="flex flex-col gap-space-xs">
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('stories.index') }}">Cerita Lapangan Terbaru</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('stories.show', 'zat-pewarna-alami-sikka') }}">Monograf: Zat Pewarna Alami Sikka</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('stories.index') }}#newsletter-form">Buletin Korespondensi</a></li>
            <li class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-colors"><a href="{{ route('for-schools') }}#silabus">Panduan Silabus &amp; Asesmen</a></li>
          </ul>
        </div>
        <!-- Kolom 4: Narahubung -->
        <div class="flex flex-col gap-space-sm">
          <h4 class="font-headline-sm text-headline-sm text-on-surface">Narahubung &amp; Sekretariat</h4>
          <div class="flex flex-col gap-space-xs">
            <p class="font-body-sm text-body-sm text-on-surface-variant">Sleman: {{ \App\Models\SiteSetting::get('address_sleman', 'Jl. Kaliurang KM 14, Sinduharjo, Ngaglik') }}</p>
            <p class="font-body-sm text-body-sm text-on-surface-variant">Menteng: {{ \App\Models\SiteSetting::get('address_jakarta', 'Jl. Teuku Umar No. 12, Jakarta Pusat') }}</p>
            <p class="font-body-sm text-body-sm text-secondary font-medium">
              <a href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp', '6281288904411') }}" target="_blank" rel="noopener noreferrer" class="hover:underline">WhatsApp: {{ \App\Models\SiteSetting::get('contact_phone', '+62 812-8890-4411') }}</a>
            </p>
            <p class="font-body-sm text-body-sm text-secondary font-medium">
              <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email', 'kemitraan@destinara.id') }}" class="hover:underline">Surel: {{ \App\Models\SiteSetting::get('contact_email', 'kemitraan@destinara.id') }}</a>
            </p>
          </div>
        </div>
      </div>

      <div class="pt-space-xl flex flex-col md:flex-row items-center justify-between gap-space-md text-on-surface-variant font-body-sm text-body-sm border-t border-outline-variant/30 text-center md:text-left">
        <p>© {{ date('Y') }} {{ \App\Models\SiteSetting::get('company_legal_name', 'PT DESTINARA CHAKRAWAL ARTHA') }}. All rights reserved. | Developed by RZ Digital Creative</p>
        <p class="font-caption-fieldnote text-caption-fieldnote italic text-secondary">Menghubungkan ruang kelas dengan kearifan tapak dan pengetahuan lokal.</p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ asset('js/main.js') }}"></script>

  @if(session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#703a3a',
        borderRadius: '8px'
      });
    </script>
  @endif

  @if(session('error'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Perhatian',
        text: "{{ session('error') }}",
        confirmButtonColor: '#703a3a',
        borderRadius: '8px'
      });
    </script>
  @endif
</body>
</html>