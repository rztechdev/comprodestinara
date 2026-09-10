<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <meta name="csrf-token" content="{{ csrf_token() }}"/>

  <!-- Anti-FOUC Theme Script: Instant Theme Apply before DOM paint -->
  <script>
    (function() {
      try {
        var storedTheme = localStorage.getItem('destinara-theme');
        var systemPrefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (storedTheme === 'dark' || (!storedTheme && systemPrefersDark)) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      } catch (e) {}
    })();
  </script>

  <title>@yield('title', 'Destinara — Menghidupkan Ruang Belajar Nyata di Tapak Nusantara')</title>
  <meta name="description" content="@yield('meta_description', 'Inisiatif pendidikan lapangan dan riset berbasis komunitas yang menjembatani kurikulum institusi dengan kearifan tapak dan pengetahuan lokal di seluruh Nusantara.')"/>

  <!-- Canonical & Search Engine Directives -->
  <link rel="canonical" href="@yield('canonical_url', url()->current())"/>
  <meta name="robots" content="@yield('robots', 'index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1')"/>
  <meta name="keywords" content="@yield('meta_keywords', 'destinara, wisata edukasi, study tour resmi, riset antropologi, penelitian tapak, live in desa nusantara, kearifan lokal, kemitraan pengelola desa, kurikulum lapangan, etnobotani nusantara, layanan destinara')"/>
  <meta name="author" content="Destinara"/>
  <meta name="publisher" content="PT DESTINARA CHAKRAWAL ARTHA"/>

  <!-- Google Search Console & Bing Webmaster Verification -->
  @if($gsc = \App\Models\SiteSetting::get('google_site_verification'))
  <meta name="google-site-verification" content="{{ $gsc }}"/>
  @endif
  @if($bing = \App\Models\SiteSetting::get('bing_site_verification'))
  <meta name="msvalidate.01" content="{{ $bing }}"/>
  @endif

  <!-- Open Graph / Social Media Metadata (Facebook, WhatsApp, LinkedIn) -->
  <meta property="og:site_name" content="Destinara"/>
  <meta property="og:type" content="@yield('og_type', 'website')"/>
  <meta property="og:title" content="@yield('og_title', View::yieldContent('title', 'Destinara — Menghidupkan Ruang Belajar Nyata di Tapak Nusantara'))"/>
  <meta property="og:description" content="@yield('og_description', View::yieldContent('meta_description', 'Inisiatif pendidikan lapangan dan riset berbasis komunitas yang menjembatani kurikulum institusi dengan kearifan tapak dan pengetahuan lokal di seluruh Nusantara.'))"/>
  <meta property="og:url" content="@yield('canonical_url', url()->current())"/>
  <meta property="og:image" content="@yield('og_image', asset('assets/img/hd/hero-home.jpg'))"/>
  <meta property="og:image:alt" content="Destinara — Ruang Belajar Nyata di Tapak Nusantara"/>
  <meta property="og:locale" content="id_ID"/>

  <!-- Twitter Card Metadata -->
  <meta name="twitter:card" content="summary_large_image"/>
  <meta name="twitter:title" content="@yield('og_title', View::yieldContent('title', 'Destinara — Menghidupkan Ruang Belajar Nyata di Tapak Nusantara'))"/>
  <meta name="twitter:description" content="@yield('og_description', View::yieldContent('meta_description', 'Inisiatif pendidikan lapangan dan riset berbasis komunitas yang menjembatani kurikulum institusi dengan kearifan tapak dan pengetahuan lokal di seluruh Nusantara.'))"/>
  <meta name="twitter:image" content="@yield('og_image', asset('assets/img/hd/hero-home.jpg'))"/>

  <!-- Google Analytics 4 (GA4) -->
  @if($gaId = \App\Models\SiteSetting::get('google_analytics_id'))
  <script async src="https://www.googletagmanager.com/gtag/js?id={{ $gaId }}"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ $gaId }}');
  </script>
  @endif

  <!-- Schema.org JSON-LD Structured Data: WebSite, Organization, & Google Sitelinks Navigation Hierarchy -->
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "{{ url('/') }}/#website",
        "url": "{{ url('/') }}",
        "name": "Destinara",
        "alternateName": ["Destinara Nusantara", "Layanan Destinara", "PT DESTINARA CHAKRAWAL ARTHA"],
        "description": "Inisiatif pendidikan lapangan dan riset berbasis komunitas yang menjembatani kurikulum institusi dengan kearifan tapak di seluruh Nusantara.",
        "inLanguage": "id-ID",
        "publisher": {
          "@id": "{{ url('/') }}/#organization"
        },
        "potentialAction": {
          "@type": "SearchAction",
          "target": {
            "@type": "EntryPoint",
            "urlTemplate": "{{ route('destinations.index') }}?q={search_term_string}"
          },
          "query-input": "required name=search_term_string"
        }
      },
      {
        "@type": "Organization",
        "@id": "{{ url('/') }}/#organization",
        "name": "Destinara",
        "legalName": "{{ \App\Models\SiteSetting::get('company_legal_name', 'PT DESTINARA CHAKRAWAL ARTHA') }}",
        "url": "{{ url('/') }}",
        "logo": {
          "@type": "ImageObject",
          "url": "{{ asset('assets/img/logo-horizontal.png') }}",
          "width": 300,
          "height": 80
        },
        "description": "Inisiatif pendidikan lapangan dan riset berbasis komunitas yang menjembatani kurikulum institusi dengan kearifan tapak dan pengetahuan lokal di seluruh Nusantara.",
        "email": "{{ \App\Models\SiteSetting::get('contact_email_partnership', 'partnership@destinara.id') }}",
        "telephone": "+{{ \App\Models\SiteSetting::get('contact_whatsapp', '6282116200363') }}",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "{{ \App\Models\SiteSetting::get('address_sleman', 'Sleman, D.I. Yogyakarta') }}",
          "addressCountry": "ID"
        },
        "sameAs": [
          "https://layanan.destinara.id"
        ]
      },
      {
        "@type": "SiteNavigationElement",
        "@id": "{{ url('/') }}/#navigation",
        "name": "Daftar Layanan & Portal Destinara",
        "description": "Struktur navigasi layanan utama Destinara untuk sekolah, akademisi, dan mitra desa di seluruh Indonesia.",
        "hasPart": [
          {
            "@type": "WebPage",
            "name": "Portal Layanan Destinara",
            "description": "Pusat akun dan akses layanan pendaftaran kemitraan, program, dan akun pengelola.",
            "url": "https://layanan.destinara.id"
          },
          {
            "@type": "WebPage",
            "name": "Program Untuk Sekolah",
            "description": "Panduan resmi study tour, live-in edukatif, dan field trip berdokumen legal untuk institusi pendidikan.",
            "url": "{{ route('for-schools') }}"
          },
          {
            "@type": "WebPage",
            "name": "Layanan Untuk Peneliti",
            "description": "Fasilitasi riset lapangan kredibel, kliring etik adat (FPIC), dan akses data primer etnografi.",
            "url": "{{ route('for-researchers') }}"
          },
          {
            "@type": "WebPage",
            "name": "Kemitraan Mitra Desa",
            "description": "Panduan bergabung bagi pengelola desa wisata, homestay warga, dan balai adat nusantara.",
            "url": "{{ route('for-villages') }}"
          },
          {
            "@type": "WebPage",
            "name": "Katalog Destinasi Tapak",
            "description": "Inventaris dan direktori desa adat serta tapak pembelajaran terkurasi di seluruh Nusantara.",
            "url": "{{ route('destinations.index') }}"
          },
          {
            "@type": "WebPage",
            "name": "Cerita & Warta Lapangan",
            "description": "Catatan lapangan, monograf etnobotani, dan refleksi pedagogis dari garda depan komunitas.",
            "url": "{{ route('stories.index') }}"
          },
          {
            "@type": "WebPage",
            "name": "Tentang Destinara",
            "description": "Jejak cerita pendiri, visi pelestarian budaya, dan nilai dasar inisiatif Destinara.",
            "url": "{{ route('about') }}"
          },
          {
            "@type": "WebPage",
            "name": "Kontak & Konsultasi",
            "description": "Ruang musyawarah terbuka dan narahubung resmi kemitraan pendidikan tapak.",
            "url": "{{ route('contact.index') }}"
          }
        ]
      },
      {
        "@type": "ItemList",
        "@id": "{{ url('/') }}/#sitelinks-list",
        "name": "Layanan Utama Destinara",
        "itemListElement": [
          {
            "@type": "ListItem",
            "position": 1,
            "name": "Portal Layanan Destinara (Subdomain)",
            "url": "https://layanan.destinara.id"
          },
          {
            "@type": "ListItem",
            "position": 2,
            "name": "Untuk Sekolah — Program Edukasi & Field Trip",
            "url": "{{ route('for-schools') }}"
          },
          {
            "@type": "ListItem",
            "position": 3,
            "name": "Untuk Peneliti — Riset Lapangan Kredibel",
            "url": "{{ route('for-researchers') }}"
          },
          {
            "@type": "ListItem",
            "position": 4,
            "name": "Mitra Desa — Kemitraan Pengelola Destinasi",
            "url": "{{ route('for-villages') }}"
          },
          {
            "@type": "ListItem",
            "position": 5,
            "name": "Destinasi Tapak — Katalog Desa Terkurasi",
            "url": "{{ route('destinations.index') }}"
          },
          {
            "@type": "ListItem",
            "position": 6,
            "name": "Cerita Tapak — Monograf & Warta Budaya",
            "url": "{{ route('stories.index') }}"
          },
          {
            "@type": "ListItem",
            "position": 7,
            "name": "Tentang Kami — Visi & Rekam Jejak",
            "url": "{{ route('about') }}"
          },
          {
            "@type": "ListItem",
            "position": 8,
            "name": "Hubungi Kami — Konsultasi & Narahubung",
            "url": "{{ route('contact.index') }}"
          }
        ]
      }
    ]
  }
  </script>

  @stack('schema')

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
  <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,400;0,6..72,500;0,6..72,600;0,6..72,700;1,6..72,400;1,6..72,700&family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..24,400,0..1,0" rel="stylesheet"/>

  <!-- Tailwind CDN & Configuration for Destinara Design System -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "rgb(var(--color-primary) / <alpha-value>)",
            "primary-container": "rgb(var(--color-primary-container) / <alpha-value>)",
            "on-primary": "rgb(var(--color-on-primary) / <alpha-value>)",
            "on-primary-container": "rgb(var(--color-on-primary-container) / <alpha-value>)",
            "primary-fixed": "rgb(var(--color-primary-fixed) / <alpha-value>)",
            "primary-fixed-dim": "rgb(var(--color-primary-fixed-dim) / <alpha-value>)",
            "secondary": "rgb(var(--color-secondary) / <alpha-value>)",
            "secondary-container": "rgb(var(--color-secondary-container) / <alpha-value>)",
            "on-secondary": "rgb(var(--color-on-secondary) / <alpha-value>)",
            "on-secondary-container": "rgb(var(--color-on-secondary-container) / <alpha-value>)",
            "secondary-fixed": "rgb(var(--color-secondary-fixed) / <alpha-value>)",
            "secondary-fixed-dim": "rgb(var(--color-secondary-fixed-dim) / <alpha-value>)",
            "tertiary": "rgb(var(--color-tertiary) / <alpha-value>)",
            "tertiary-container": "rgb(var(--color-tertiary-container) / <alpha-value>)",
            "on-tertiary": "rgb(var(--color-on-tertiary) / <alpha-value>)",
            "on-tertiary-container": "rgb(var(--color-on-tertiary-container) / <alpha-value>)",
            "tertiary-fixed": "rgb(var(--color-tertiary-fixed) / <alpha-value>)",
            "tertiary-fixed-dim": "rgb(var(--color-tertiary-fixed-dim) / <alpha-value>)",
            "surface": "rgb(var(--color-surface) / <alpha-value>)",
            "surface-dim": "rgb(var(--color-surface-dim) / <alpha-value>)",
            "surface-bright": "rgb(var(--color-surface-bright) / <alpha-value>)",
            "surface-container-lowest": "rgb(var(--color-surface-container-lowest) / <alpha-value>)",
            "surface-container-low": "rgb(var(--color-surface-container-low) / <alpha-value>)",
            "surface-container": "rgb(var(--color-surface-container) / <alpha-value>)",
            "surface-container-high": "rgb(var(--color-surface-container-high) / <alpha-value>)",
            "surface-container-highest": "rgb(var(--color-surface-container-highest) / <alpha-value>)",
            "on-surface": "rgb(var(--color-on-surface) / <alpha-value>)",
            "on-surface-variant": "rgb(var(--color-on-surface-variant) / <alpha-value>)",
            "inverse-surface": "rgb(var(--color-inverse-surface) / <alpha-value>)",
            "inverse-on-surface": "rgb(var(--color-inverse-on-surface) / <alpha-value>)",
            "outline": "rgb(var(--color-outline) / <alpha-value>)",
            "outline-variant": "rgb(var(--color-outline-variant) / <alpha-value>)",
            "background": "rgb(var(--color-background) / <alpha-value>)",
            "on-background": "rgb(var(--color-on-background) / <alpha-value>)"
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
            "display-hero": ["52px", { lineHeight: "60px", letterSpacing: "-0.02em", fontWeight: "400" }],
            "headline-lg": ["38px", { lineHeight: "46px", letterSpacing: "-0.015em", fontWeight: "400" }],
            "headline-md": ["28px", { lineHeight: "36px", fontWeight: "400" }],
            "headline-sm": ["22px", { lineHeight: "30px", fontWeight: "500" }],
            "body-lead": ["20px", { lineHeight: "32px", fontWeight: "400" }],
            "body-default": ["18px", { lineHeight: "30px", fontWeight: "400" }],
            "body-sm": ["16px", { lineHeight: "25px", fontWeight: "400" }],
            "caption-fieldnote": ["16px", { lineHeight: "24px", fontWeight: "400" }],
            "label-action": ["16px", { lineHeight: "22px", letterSpacing: "0.01em", fontWeight: "600" }],
            "label-tag": ["14px", { lineHeight: "20px", letterSpacing: "0.02em", fontWeight: "500" }]
          }
        }
      }
    };
  </script>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-surface font-body-default text-body-default text-on-surface">

  <!-- ==================== HEADER (Exact Royal Geographical Society Architecture) ==================== -->
  <header class="fixed top-0 w-full z-50 bg-[#fff8f6] dark:bg-[#181211] shadow-[0_2px_10px_rgba(43,33,30,0.06)] dark:shadow-[0_2px_14px_rgba(0,0,0,0.5)] border-b border-[#2B211E]/15 dark:border-outline-variant/30 transition-colors duration-200">
    <!-- Dark Top Accent Bar ala RGS -->
    <div class="w-full h-[4px] bg-[#2B211E] dark:bg-[#8C5151] transition-colors"></div>

    <div class="max-w-[1440px] mx-auto px-gutter-mobile md:px-gutter-desktop">
      
      <!-- Desktop & Tablet Container (Spacious & Balanced RGS Scale with Generous Vertical Gap) -->
      <div class="hidden lg:flex items-stretch justify-between min-h-[96px] xl:min-h-[104px] py-2 xl:py-2.5">
        
        <!-- Left: Brand / Logo Area with RGS Crosshair Accent -->
        <div class="flex items-center py-2 pr-8">
          <a href="{{ route('home') }}" class="flex items-center gap-4 group" aria-label="Destinara Beranda">
            <!-- Iconic RGS-Style Crosshair / Coordinate Line with Accent Dot -->
            <div class="relative flex items-center justify-center h-16 w-5 mr-1">
              <div class="w-[2px] h-full bg-[#2B211E]/75 dark:bg-white/60 absolute left-1/2 -translate-x-1/2 top-0 transition-colors"></div>
              <div class="w-3 h-3 rounded-full bg-primary absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 ring-2 ring-surface"></div>
            </div>
            
            <div class="flex flex-col justify-center">
              <img alt="Destinara Logo" class="destinara-logo h-9 xl:h-10 w-auto object-contain transition-transform group-hover:scale-102" src="{{ asset('assets/img/logo-horizontal.png') }}"/>
              <span class="text-[12px] xl:text-[13px] font-medium text-on-surface-variant/90 font-sans mt-1 tracking-tight">
                {{ __('site.brand_tagline') }}
              </span>
            </div>
          </a>
        </div>

        <!-- Right: Top Utility Bar + Bottom Main Nav Links -->
        <div class="flex flex-col justify-between flex-1 pl-6 py-1">
          
          <!-- Tier 1: Top Utility Strip (Hairline divider, Language Switcher, Theme Toggle, Login, Register) with generous bottom spacing -->
          <div class="flex items-center justify-end pb-2 xl:pb-2.5">
            
            <!-- Horizontal Hairline extending across the top strip (as seen in RGS) -->
            <div class="flex-1 h-[1px] bg-[#2B211E]/20 dark:bg-outline-variant/30 mr-6 self-center transition-colors"></div>

            <div class="flex items-center gap-3">

              <!-- Language Switcher Dropdown (Desktop) -->
              <div class="relative group" id="desktopLangDropdown">
                <button type="button" 
                        id="desktopLangBtn"
                        class="flex items-center gap-1.5 px-2.5 py-1 text-[13px] font-medium text-on-surface hover:text-primary hover:bg-surface-container border border-outline-variant/40 transition-all rounded-none cursor-pointer"
                        aria-expanded="false"
                        aria-haspopup="true"
                        title="{{ __('site.nav.choose_language') }}">
                  <span class="material-symbols-outlined text-[17px] text-on-surface-variant">translate</span>
                  <span class="text-[11px] xl:text-[12px] font-bold tracking-wider font-sans uppercase">
                    @if(app()->getLocale() === 'zh') 🇨🇳 中文
                    @elseif(app()->getLocale() === 'ja') 🇯🇵 日本語
                    @elseif(app()->getLocale() === 'de') 🇩🇪 DE
                    @elseif(app()->getLocale() === 'fr') 🇫🇷 FR
                    @elseif(app()->getLocale() === 'nl') 🇳🇱 NL
                    @elseif(app()->getLocale() === 'en') 🇬🇧 EN
                    @else 🇮🇩 ID
                    @endif
                  </span>
                  <svg class="w-3 h-3 text-on-surface-variant transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                  </svg>
                </button>
                <div class="absolute right-0 top-full mt-1 w-40 bg-surface dark:bg-[#1f1716] border border-outline-variant/40 shadow-xl py-1 z-50 hidden group-hover:block hover:block transition-all">
                  <a href="{{ route('lang.switch', 'id') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container hover:text-primary transition-colors {{ app()->getLocale() === 'id' ? 'bg-surface-container font-bold text-primary' : '' }}">
                    <span class="flex items-center gap-2"><span>🇮🇩</span><span>Indonesia</span></span>
                    @if(app()->getLocale() === 'id') <span class="material-symbols-outlined text-sm text-primary">check</span> @endif
                  </a>
                  <a href="{{ route('lang.switch', 'en') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container hover:text-primary transition-colors {{ app()->getLocale() === 'en' ? 'bg-surface-container font-bold text-primary' : '' }}">
                    <span class="flex items-center gap-2"><span>🇬🇧</span><span>English</span></span>
                    @if(app()->getLocale() === 'en') <span class="material-symbols-outlined text-sm text-primary">check</span> @endif
                  </a>
                  <a href="{{ route('lang.switch', 'zh') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container hover:text-primary transition-colors {{ app()->getLocale() === 'zh' ? 'bg-surface-container font-bold text-primary' : '' }}">
                    <span class="flex items-center gap-2"><span>🇨🇳</span><span>中文</span></span>
                    @if(app()->getLocale() === 'zh') <span class="material-symbols-outlined text-sm text-primary">check</span> @endif
                  </a>
                  <a href="{{ route('lang.switch', 'ja') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container hover:text-primary transition-colors {{ app()->getLocale() === 'ja' ? 'bg-surface-container font-bold text-primary' : '' }}">
                    <span class="flex items-center gap-2"><span>🇯🇵</span><span>日本語</span></span>
                    @if(app()->getLocale() === 'ja') <span class="material-symbols-outlined text-sm text-primary">check</span> @endif
                  </a>
                  <a href="{{ route('lang.switch', 'de') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container hover:text-primary transition-colors {{ app()->getLocale() === 'de' ? 'bg-surface-container font-bold text-primary' : '' }}">
                    <span class="flex items-center gap-2"><span>🇩🇪</span><span>Deutsch</span></span>
                    @if(app()->getLocale() === 'de') <span class="material-symbols-outlined text-sm text-primary">check</span> @endif
                  </a>
                  <a href="{{ route('lang.switch', 'fr') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container hover:text-primary transition-colors {{ app()->getLocale() === 'fr' ? 'bg-surface-container font-bold text-primary' : '' }}">
                    <span class="flex items-center gap-2"><span>🇫🇷</span><span>Français</span></span>
                    @if(app()->getLocale() === 'fr') <span class="material-symbols-outlined text-sm text-primary">check</span> @endif
                  </a>
                  <a href="{{ route('lang.switch', 'nl') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container hover:text-primary transition-colors {{ app()->getLocale() === 'nl' ? 'bg-surface-container font-bold text-primary' : '' }}">
                    <span class="flex items-center gap-2"><span>🇳🇱</span><span>Nederlands</span></span>
                    @if(app()->getLocale() === 'nl') <span class="material-symbols-outlined text-sm text-primary">check</span> @endif
                  </a>
                </div>
              </div>

              <!-- Light / Dark Mode Toggle Button (RGS Style) -->
              <button id="themeToggleBtn" 
                      type="button" 
                      aria-label="Ganti Tema Tampilan" 
                      title="Ganti Mode Tampilan" 
                      class="theme-toggle-btn flex items-center justify-center px-2 py-1 text-on-surface hover:text-primary hover:bg-surface-container border border-outline-variant/40 transition-all rounded-none cursor-pointer">
                <!-- Sun Icon for Light Mode -->
                <span class="theme-icon-light theme-toggle-icon material-symbols-outlined text-[18px] text-amber-600 dark:hidden">light_mode</span>
                <!-- Moon Icon for Dark Mode -->
                <span class="theme-icon-dark theme-toggle-icon material-symbols-outlined text-[18px] text-amber-200 hidden dark:inline-flex">dark_mode</span>
              </button>
              
              <!-- Login Link -> Directed to layanan.destinara.id -->
              <a href="https://layanan.destinara.id/login" target="_blank" rel="noopener noreferrer" class="flex items-center gap-1.5 px-3 py-1.5 text-[13px] xl:text-[14px] font-medium text-on-surface hover:text-primary transition-colors">
                <svg class="w-4 h-4 text-on-surface/80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <span>{{ __('site.nav.login') }}</span>
              </a>

              <!-- Register Block (Santai, proportional & elegant rectangular button) -> Directed to layanan.destinara.id -->
              <a href="https://layanan.destinara.id/register" target="_blank" rel="noopener noreferrer" class="bg-[#8C5151] hover:bg-[#703a3a] text-white font-medium text-[12px] xl:text-[13px] px-4 xl:px-5 py-1.5 transition-colors uppercase tracking-wider rounded-none inline-flex items-center justify-center">
                <span>{{ __('site.nav.register') }}</span>
              </a>

            </div>

          </div>

          <!-- Tier 2: Bottom Primary Navigation Links (Generous vertical breathing room with hover underline) -->
          <nav class="flex items-center justify-end gap-6 xl:gap-8 pt-3 xl:pt-3.5 pb-1 pr-1" aria-label="Navigasi Utama">
            <a href="{{ route('home') }}" class="font-bold text-[14px] xl:text-[15px] pb-1.5 border-b-2 transition-all duration-150 {{ request()->routeIs('home') ? 'border-primary text-primary' : 'border-transparent text-on-surface hover:border-primary hover:text-primary' }}">
              {{ __('site.nav.home') }}
            </a>
            <a href="{{ route('about') }}" class="font-bold text-[14px] xl:text-[15px] pb-1.5 border-b-2 transition-all duration-150 {{ request()->routeIs('about') ? 'border-primary text-primary' : 'border-transparent text-on-surface hover:border-primary hover:text-primary' }}">
              {{ __('site.nav.about') }}
            </a>
            <a href="{{ route('for-schools') }}" class="font-bold text-[14px] xl:text-[15px] pb-1.5 border-b-2 transition-all duration-150 {{ request()->routeIs('for-schools') ? 'border-primary text-primary' : 'border-transparent text-on-surface hover:border-primary hover:text-primary' }}">
              {{ __('site.nav.for_schools') }}
            </a>
            <a href="{{ route('for-researchers') }}" class="font-bold text-[14px] xl:text-[15px] pb-1.5 border-b-2 transition-all duration-150 {{ request()->routeIs('for-researchers') ? 'border-primary text-primary' : 'border-transparent text-on-surface hover:border-primary hover:text-primary' }}">
              {{ __('site.nav.for_researchers') }}
            </a>
            <a href="{{ route('for-villages') }}" class="font-bold text-[14px] xl:text-[15px] pb-1.5 border-b-2 transition-all duration-150 {{ request()->routeIs('for-villages') ? 'border-primary text-primary' : 'border-transparent text-on-surface hover:border-primary hover:text-primary' }}">
              {{ __('site.nav.for_villages') }}
            </a>
            <a href="{{ route('destinations.index') }}" class="font-bold text-[14px] xl:text-[15px] pb-1.5 border-b-2 transition-all duration-150 {{ request()->routeIs('destinations.*') ? 'border-primary text-primary' : 'border-transparent text-on-surface hover:border-primary hover:text-primary' }}">
              {{ __('site.nav.destinations') }}
            </a>
            <a href="{{ route('stories.index') }}" class="font-bold text-[14px] xl:text-[15px] pb-1.5 border-b-2 transition-all duration-150 {{ request()->routeIs('stories.*') ? 'border-primary text-primary' : 'border-transparent text-on-surface hover:border-primary hover:text-primary' }}">
              {{ __('site.nav.stories') }}
            </a>
            <a href="{{ route('contact.index') }}" class="font-bold text-[14px] xl:text-[15px] pb-1.5 border-b-2 transition-all duration-150 {{ request()->routeIs('contact.index') ? 'border-primary text-primary' : 'border-transparent text-on-surface hover:border-primary hover:text-primary' }}">
              {{ __('site.nav.contact') }}
            </a>
          </nav>

        </div>

      </div>

      <!-- Mobile Header View (Screens < 1024px) -->
      <div class="flex lg:hidden items-center justify-between py-2.5 sm:py-3">
        <!-- Brand & Needle: 100% Mathematically Aligned with Hero Vertical Line -->
        <div class="flex items-center">
          <div class="relative flex items-center justify-center h-10 w-5 mr-1 flex-shrink-0">
            <div class="w-[2px] h-full bg-[#2B211E]/75 dark:bg-white/60 absolute left-1/2 -translate-x-1/2 top-0 transition-colors"></div>
            <div class="w-2.5 h-2.5 rounded-full bg-primary absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 ring-2 ring-surface"></div>
          </div>
          <a href="{{ route('home') }}" class="flex flex-col justify-center ml-2" aria-label="Destinara Beranda">
            <img alt="Destinara Logo" class="destinara-logo h-7 sm:h-8 w-auto object-contain" src="{{ asset('assets/img/logo-horizontal.png') }}"/>
            <span class="hidden sm:block text-[10px] text-on-surface-variant font-medium mt-0.5 whitespace-nowrap tracking-tight">
              menghidupkan kembali cerita, budaya
            </span>
          </a>
        </div>

        <!-- Mobile Action Buttons: Clean, Uncluttered, Elegant -->
        <div class="flex items-center gap-1 sm:gap-2 flex-shrink-0">
          <!-- Mobile Language Switcher Dropdown (Compact) -->
          <div class="relative" id="mobileLangDropdown">
            <button type="button" 
                    id="mobileLangBtn"
                    onclick="var m=document.getElementById('mobileLangMenu'); m.classList.toggle('hidden');"
                    class="p-1.5 text-on-surface hover:text-primary hover:bg-surface-container transition-colors flex items-center gap-0.5 text-xs font-bold font-sans cursor-pointer"
                    title="{{ __('site.nav.choose_language') }}">
              <span class="material-symbols-outlined text-[19px]">translate</span>
              <span class="text-[10px] uppercase font-bold tracking-wider">
                {{ match(app()->getLocale()) { 'zh' => 'ZH', 'ja' => 'JA', 'de' => 'DE', 'fr' => 'FR', 'nl' => 'NL', 'en' => 'EN', default => 'ID' } }}
              </span>
            </button>
            <div id="mobileLangMenu" class="hidden absolute right-0 top-full mt-1 w-36 bg-surface dark:bg-[#1f1716] border border-outline-variant/40 shadow-xl py-1 z-50">
              <a href="{{ route('lang.switch', 'id') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container {{ app()->getLocale() === 'id' ? 'text-primary font-bold bg-surface-container' : '' }}">
                <span>🇮🇩 ID</span>
                @if(app()->getLocale() === 'id') <span class="material-symbols-outlined text-xs text-primary">check</span> @endif
              </a>
              <a href="{{ route('lang.switch', 'en') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container {{ app()->getLocale() === 'en' ? 'text-primary font-bold bg-surface-container' : '' }}">
                <span>🇬🇧 EN</span>
                @if(app()->getLocale() === 'en') <span class="material-symbols-outlined text-xs text-primary">check</span> @endif
              </a>
              <a href="{{ route('lang.switch', 'zh') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container {{ app()->getLocale() === 'zh' ? 'text-primary font-bold bg-surface-container' : '' }}">
                <span>🇨🇳 中文</span>
                @if(app()->getLocale() === 'zh') <span class="material-symbols-outlined text-xs text-primary">check</span> @endif
              </a>
              <a href="{{ route('lang.switch', 'ja') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container {{ app()->getLocale() === 'ja' ? 'text-primary font-bold bg-surface-container' : '' }}">
                <span>🇯🇵 日本語</span>
                @if(app()->getLocale() === 'ja') <span class="material-symbols-outlined text-xs text-primary">check</span> @endif
              </a>
              <a href="{{ route('lang.switch', 'de') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container {{ app()->getLocale() === 'de' ? 'text-primary font-bold bg-surface-container' : '' }}">
                <span>🇩🇪 Deutsch</span>
                @if(app()->getLocale() === 'de') <span class="material-symbols-outlined text-xs text-primary">check</span> @endif
              </a>
              <a href="{{ route('lang.switch', 'fr') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container {{ app()->getLocale() === 'fr' ? 'text-primary font-bold bg-surface-container' : '' }}">
                <span>🇫🇷 Français</span>
                @if(app()->getLocale() === 'fr') <span class="material-symbols-outlined text-xs text-primary">check</span> @endif
              </a>
              <a href="{{ route('lang.switch', 'nl') }}" class="flex items-center justify-between px-3 py-1.5 text-xs font-medium text-on-surface hover:bg-surface-container {{ app()->getLocale() === 'nl' ? 'text-primary font-bold bg-surface-container' : '' }}">
                <span>🇳🇱 Nederlands</span>
                @if(app()->getLocale() === 'nl') <span class="material-symbols-outlined text-xs text-primary">check</span> @endif
              </a>
            </div>
          </div>

          <!-- Mobile Theme Toggle Button -->
          <button id="mobileThemeToggleBtn" 
                  type="button" 
                  aria-label="Ganti Tema Tampilan" 
                  title="Ganti Mode Tampilan" 
                  class="theme-toggle-btn p-1.5 text-on-surface hover:text-primary hover:bg-surface-container transition-colors flex items-center justify-center cursor-pointer">
            <span class="theme-icon-light theme-toggle-icon material-symbols-outlined text-[20px] text-amber-600 dark:hidden">light_mode</span>
            <span class="theme-icon-dark theme-toggle-icon material-symbols-outlined text-[20px] text-amber-200 hidden dark:inline-flex">dark_mode</span>
          </button>

          <!-- Mobile Login (Icon Only with tooltip/aria-label) -->
          <a href="https://layanan.destinara.id/login" target="_blank" rel="noopener noreferrer" class="p-1.5 text-on-surface hover:text-primary transition-colors flex items-center justify-center" aria-label="Login ke Layanan Destinara" title="{{ __('site.nav.login') }}">
            <svg class="w-5 h-5 text-on-surface" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </a>

          <!-- Mobile Register (Crisp terracotta rectangular plinth) -->
          <a href="https://layanan.destinara.id/register" target="_blank" rel="noopener noreferrer" class="bg-[#8C5151] hover:bg-[#703a3a] text-white px-2.5 py-1 text-[11px] sm:text-xs font-bold uppercase tracking-wider rounded-none transition-colors">
            <span>{{ __('site.nav.register') }}</span>
          </a>

          <!-- Mobile Toggle Button (Sleek borderless icon) -->
          <button id="mobileMenuBtn" aria-label="{{ __('site.nav.open_menu') }}" class="p-1 text-on-surface hover:text-primary hover:bg-surface-container transition-colors flex items-center justify-center">
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
          <img class="destinara-logo h-8 sm:h-9 w-auto object-contain" src="{{ asset('assets/img/logo-horizontal.png') }}" alt="Destinara Logo"/>
        </div>
        <button id="mobileMenuCloseBtn" aria-label="{{ __('site.nav.close_menu') }}" class="w-10 h-10 border border-[#8C5151]/20 dark:border-outline-variant/30 bg-surface-container hover:bg-surface-container-high text-on-surface-variant hover:text-primary flex items-center justify-center transition-colors">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>

      <!-- Mobile Language Switcher Strip in Drawer -->
      <div class="mb-3">
        <div class="p-2.5 border border-[#8C5151]/20 dark:border-outline-variant/30 bg-surface-container flex flex-col gap-2">
          <div class="flex items-center justify-between text-xs font-semibold uppercase tracking-wider text-on-surface px-1">
            <span class="flex items-center gap-1.5">
              <span class="material-symbols-outlined text-[18px] text-primary">translate</span>
              <span>{{ __('site.nav.language') }}</span>
            </span>
            <span class="text-[11px] font-mono text-on-surface-variant font-normal">{{ __('site.nav.choose_language') }}</span>
          </div>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-1.5">
            <a href="{{ route('lang.switch', 'id') }}" class="py-1.5 px-2 text-center text-xs font-medium transition-colors border {{ app()->getLocale() === 'id' ? 'bg-primary text-white border-primary font-bold' : 'bg-surface text-on-surface border-outline-variant/30 hover:bg-surface-container-high' }}">
              🇮🇩 Indonesia
            </a>
            <a href="{{ route('lang.switch', 'en') }}" class="py-1.5 px-2 text-center text-xs font-medium transition-colors border {{ app()->getLocale() === 'en' ? 'bg-primary text-white border-primary font-bold' : 'bg-surface text-on-surface border-outline-variant/30 hover:bg-surface-container-high' }}">
              🇬🇧 English
            </a>
            <a href="{{ route('lang.switch', 'zh') }}" class="py-1.5 px-2 text-center text-xs font-medium transition-colors border {{ app()->getLocale() === 'zh' ? 'bg-primary text-white border-primary font-bold' : 'bg-surface text-on-surface border-outline-variant/30 hover:bg-surface-container-high' }}">
              🇨🇳 中文
            </a>
            <a href="{{ route('lang.switch', 'ja') }}" class="py-1.5 px-2 text-center text-xs font-medium transition-colors border {{ app()->getLocale() === 'ja' ? 'bg-primary text-white border-primary font-bold' : 'bg-surface text-on-surface border-outline-variant/30 hover:bg-surface-container-high' }}">
              🇯🇵 日本語
            </a>
            <a href="{{ route('lang.switch', 'de') }}" class="py-1.5 px-2 text-center text-xs font-medium transition-colors border {{ app()->getLocale() === 'de' ? 'bg-primary text-white border-primary font-bold' : 'bg-surface text-on-surface border-outline-variant/30 hover:bg-surface-container-high' }}">
              🇩🇪 Deutsch
            </a>
            <a href="{{ route('lang.switch', 'fr') }}" class="py-1.5 px-2 text-center text-xs font-medium transition-colors border {{ app()->getLocale() === 'fr' ? 'bg-primary text-white border-primary font-bold' : 'bg-surface text-on-surface border-outline-variant/30 hover:bg-surface-container-high' }}">
              🇫🇷 Français
            </a>
            <a href="{{ route('lang.switch', 'nl') }}" class="py-1.5 px-2 text-center text-xs font-medium transition-colors border {{ app()->getLocale() === 'nl' ? 'bg-primary text-white border-primary font-bold' : 'bg-surface text-on-surface border-outline-variant/30 hover:bg-surface-container-high' }}">
              🇳🇱 Nederlands
            </a>
          </div>
        </div>
      </div>

      <!-- Mobile Theme Toggle Bar in Drawer -->
      <div class="mb-4">
        <button id="drawerThemeToggleBtn" 
                type="button" 
                aria-label="Ganti Tema Tampilan" 
                class="theme-toggle-btn w-full py-2.5 px-3 border border-[#8C5151]/20 dark:border-outline-variant/30 bg-surface-container hover:bg-surface-container-high text-on-surface flex items-center justify-between transition-colors">
          <div class="flex items-center gap-2">
            <span class="theme-icon-light theme-toggle-icon material-symbols-outlined text-[20px] text-amber-600 dark:hidden">light_mode</span>
            <span class="theme-icon-dark theme-toggle-icon material-symbols-outlined text-[20px] text-amber-200 hidden dark:inline-flex">dark_mode</span>
            <span class="text-xs font-semibold uppercase tracking-wider">
              <span class="inline dark:hidden">{{ __('site.nav.theme_light_desc') }}</span>
              <span class="hidden dark:inline">{{ __('site.nav.theme_dark_desc') }}</span>
            </span>
          </div>
          <span class="text-[11px] font-mono text-on-surface-variant font-medium">Ubah</span>
        </button>
      </div>

      <!-- Mobile Account Action Strip (layanan.destinara.id) -->
      <div class="grid grid-cols-2 gap-2.5 mb-5 pb-4 border-b border-[#8C5151]/20 dark:border-outline-variant/30">
        <a href="https://layanan.destinara.id/login" target="_blank" rel="noopener noreferrer" class="rgs-btn rgs-btn-outline !py-2.5 !text-xs !tracking-wider flex items-center justify-center gap-1.5">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
          <span>{{ __('site.nav.login') }}</span>
        </a>
        <a href="https://layanan.destinara.id/register" target="_blank" rel="noopener noreferrer" class="rgs-btn rgs-btn-primary !py-2.5 !text-xs !tracking-wider flex items-center justify-center">
          <span>{{ __('site.nav.register') }}</span>
        </a>
      </div>

      <!-- Navigation Links -->
      <nav class="divide-y divide-[#8C5151]/10">
        <a href="{{ route('home') }}" class="mobile-nav-link flex items-center justify-between px-3 py-3.5 text-base font-semibold transition-all hover:bg-surface-container {{ request()->routeIs('home') ? 'bg-surface-container text-primary font-bold border-l-4 border-primary pl-4' : 'text-on-surface-variant hover:text-primary' }}">
          <span>{{ __('site.nav.home') }}</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('about') }}" class="mobile-nav-link flex items-center justify-between px-3 py-3.5 text-base font-semibold transition-all hover:bg-surface-container {{ request()->routeIs('about') ? 'bg-surface-container text-primary font-bold border-l-4 border-primary pl-4' : 'text-on-surface-variant hover:text-primary' }}">
          <span>{{ __('site.nav.about') }}</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('for-schools') }}" class="mobile-nav-link flex items-center justify-between px-3 py-3.5 text-base font-semibold transition-all hover:bg-surface-container {{ request()->routeIs('for-schools') ? 'bg-surface-container text-primary font-bold border-l-4 border-primary pl-4' : 'text-on-surface-variant hover:text-primary' }}">
          <span>{{ __('site.nav.for_schools_full') }}</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('for-researchers') }}" class="mobile-nav-link flex items-center justify-between px-3 py-3.5 text-base font-semibold transition-all hover:bg-surface-container {{ request()->routeIs('for-researchers') ? 'bg-surface-container text-primary font-bold border-l-4 border-primary pl-4' : 'text-on-surface-variant hover:text-primary' }}">
          <span>{{ __('site.nav.for_researchers_full') }}</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('for-villages') }}" class="mobile-nav-link flex items-center justify-between px-3 py-3.5 text-base font-semibold transition-all hover:bg-surface-container {{ request()->routeIs('for-villages') ? 'bg-surface-container text-primary font-bold border-l-4 border-primary pl-4' : 'text-on-surface-variant hover:text-primary' }}">
          <span>{{ __('site.nav.for_villages_full') }}</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('destinations.index') }}" class="mobile-nav-link flex items-center justify-between px-3 py-3.5 text-base font-semibold transition-all hover:bg-surface-container {{ request()->routeIs('destinations.*') ? 'bg-surface-container text-primary font-bold border-l-4 border-primary pl-4' : 'text-on-surface-variant hover:text-primary' }}">
          <span>{{ __('site.nav.destinations') }}</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('stories.index') }}" class="mobile-nav-link flex items-center justify-between px-3 py-3.5 text-base font-semibold transition-all hover:bg-surface-container {{ request()->routeIs('stories.*') ? 'bg-surface-container text-primary font-bold border-l-4 border-primary pl-4' : 'text-on-surface-variant hover:text-primary' }}">
          <span>{{ __('site.nav.stories_full') }}</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
        <a href="{{ route('contact.index') }}" class="mobile-nav-link flex items-center justify-between px-3 py-3.5 text-base font-semibold transition-all hover:bg-surface-container {{ request()->routeIs('contact.index') ? 'bg-surface-container text-primary font-bold border-l-4 border-primary pl-4' : 'text-on-surface-variant hover:text-primary' }}">
          <span>{{ __('site.nav.contact_full') }}</span>
          <svg class="w-4 h-4 text-on-surface-variant/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
        </a>
      </nav>
    </div>

    <!-- Footer Action inside Fullscreen Menu -->
    <div class="mt-8 pt-5 border-t border-[#8C5151]/20 space-y-3">
      <a href="{{ route('destinations.index') }}" class="w-full rgs-btn rgs-btn-primary text-center">
        <span>{{ __('site.nav.explore_destinations') }}</span>
      </a>
      <a href="{{ route('contact.index') }}" class="w-full rgs-btn rgs-btn-outline text-center">
        <span>{{ __('site.nav.consult_program') }}</span>
      </a>
      <div class="text-center text-xs font-caption-fieldnote italic text-on-surface-variant pt-1">
        {{ __('site.nav.field_pedagogy') }}
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
          <h4 class="font-headline-sm text-headline-sm text-on-surface">{{ __('site.footer.company') }}</h4>
          <ul class="flex flex-col gap-space-xs">
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('about') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.about_destinara') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('about') }}#filosofi" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.philosophy') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('about') }}#rekam-jejak" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.track_record') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('destinations.index') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.selected_sanctuaries') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('legal.terms') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.terms') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('legal.privacy') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.privacy') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('legal.privacy.en') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.privacy_en') }}</a>
            </li>
          </ul>
        </div>
        <!-- Kolom 2: Untuk Pengguna -->
        <div class="flex flex-col gap-space-sm">
          <h4 class="font-headline-sm text-headline-sm text-on-surface">{{ __('site.footer.for_users') }}</h4>
          <ul class="flex flex-col gap-space-xs">
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('for-schools') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.school_programs') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('for-researchers') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.research_collab') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('for-villages') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.village_partnership') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('about') }}#fpic" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.fpic_ethics') }}</a>
            </li>
          </ul>
        </div>
        <!-- Kolom 3: Publikasi & Warta -->
        <div class="flex flex-col gap-space-sm">
          <h4 class="font-headline-sm text-headline-sm text-on-surface">{{ __('site.footer.publications') }}</h4>
          <ul class="flex flex-col gap-space-xs">
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('stories.index') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.latest_stories') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('stories.show', 'zat-pewarna-alami-sikka') }}" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.monograph_sikka') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('stories.index') }}#newsletter-form" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.newsletter') }}</a>
            </li>
            <li class="font-body-sm text-body-sm">
              <a href="{{ route('for-schools') }}#silabus" class="w-fit inline-block pb-0.5 border-b-2 border-transparent text-on-surface-variant hover:text-primary hover:border-primary transition-all duration-150">{{ __('site.footer.syllabus_guide') }}</a>
            </li>
          </ul>
        </div>
        <!-- Kolom 4: Narahubung -->
        <div class="flex flex-col gap-space-sm">
          <h4 class="font-headline-sm text-headline-sm text-on-surface">{{ __('site.footer.secretariat') }}</h4>
          <div class="flex flex-col gap-space-xs">
            <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('site.footer.sleman_address') }}</p>
            <p class="font-body-sm text-body-sm text-on-surface-variant">{{ __('site.footer.menteng_address') }}</p>
            <div class="flex flex-col gap-1 pt-1 font-body-sm text-body-sm">
              <span class="text-on-surface font-semibold text-xs uppercase tracking-wider">{{ __('site.footer.whatsapp_contacts') }}</span>
              <a href="https://wa.me/6282116200363?text={{ urlencode(__('site.modal.maya_msg')) }}" target="_blank" rel="noopener noreferrer" class="text-secondary hover:text-primary flex items-center gap-1.5 group w-fit transition-colors">
                <span class="w-1.5 h-1.5 bg-secondary group-hover:bg-primary inline-block transition-colors"></span>
                <span class="pb-0.5 border-b-2 border-transparent group-hover:border-primary transition-all duration-150">Maya: +62 821-1620-0363</span>
              </a>
              <a href="https://wa.me/6285894860696?text={{ urlencode(__('site.modal.azki_msg')) }}" target="_blank" rel="noopener noreferrer" class="text-secondary hover:text-primary flex items-center gap-1.5 group w-fit transition-colors">
                <span class="w-1.5 h-1.5 bg-secondary group-hover:bg-primary inline-block transition-colors"></span>
                <span class="pb-0.5 border-b-2 border-transparent group-hover:border-primary transition-all duration-150">Azki: +62 858-9486-0696</span>
              </a>
              <a href="https://wa.me/6285774410978?text={{ urlencode(__('site.modal.ryan_msg')) }}" target="_blank" rel="noopener noreferrer" class="text-secondary hover:text-primary flex items-center gap-1.5 group w-fit transition-colors">
                <span class="w-1.5 h-1.5 bg-secondary group-hover:bg-primary inline-block transition-colors"></span>
                <span class="pb-0.5 border-b-2 border-transparent group-hover:border-primary transition-all duration-150">Ryan: +62 857-7441-0978</span>
              </a>
            </div>
            <div class="flex flex-col gap-1 pt-1 font-body-sm text-body-sm">
              <span class="text-on-surface font-semibold text-xs uppercase tracking-wider">{{ __('site.footer.official_emails') }}</span>
              <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email_partnership', 'partnership@destinara.id') }}" class="text-secondary hover:text-primary flex items-center gap-1.5 group w-fit transition-colors">
                <span class="w-1.5 h-1.5 bg-secondary group-hover:bg-primary inline-block transition-colors"></span>
                <span class="pb-0.5 border-b-2 border-transparent group-hover:border-primary transition-all duration-150">{{ __('site.footer.partnership_email') }} {{ \App\Models\SiteSetting::get('contact_email_partnership', 'partnership@destinara.id') }}</span>
              </a>
              <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email_hello', 'hello@destinara.id') }}" class="text-secondary hover:text-primary flex items-center gap-1.5 group w-fit transition-colors">
                <span class="w-1.5 h-1.5 bg-secondary group-hover:bg-primary inline-block transition-colors"></span>
                <span class="pb-0.5 border-b-2 border-transparent group-hover:border-primary transition-all duration-150">{{ __('site.footer.general_email') }} {{ \App\Models\SiteSetting::get('contact_email_hello', 'hello@destinara.id') }}</span>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="pt-space-xl flex flex-col md:flex-row items-center justify-between gap-space-md text-on-surface-variant font-body-sm text-body-sm border-t border-outline-variant/30 text-center md:text-left">
        <p>© {{ date('Y') }} {{ \App\Models\SiteSetting::get('company_legal_name', 'PT DESTINARA CHAKRAWAL ARTHA') }}. {{ __('site.footer.copyright') }}</p>
        <p class="font-caption-fieldnote text-caption-fieldnote italic text-secondary">{{ __('site.footer.motto') }}</p>
      </div>
    </div>
  </footer>

  <!-- ==================== MOBILE STICKY UTILITY BAR (RGS Style Direct Access) ==================== -->
  <div class="lg:hidden fixed bottom-0 inset-x-0 z-40 bg-surface/95 backdrop-blur-md border-t border-[#8C5151]/20 px-4 py-2.5 shadow-[0_-4px_16px_rgba(43,33,30,0.08)] mobile-sticky-action-bar">
    <div class="max-w-md mx-auto flex items-center gap-2">
      <button type="button" 
         onclick="document.getElementById('mobileWhatsAppModal').classList.remove('hidden');" 
         class="flex-1 rgs-btn rgs-btn-secondary !py-2.5 !px-2 !text-xs !tracking-wide flex items-center justify-center gap-1.5 text-center cursor-pointer">
        <span class="material-symbols-outlined text-[17px]">chat</span>
        <span>WhatsApp</span>
      </button>
      <a href="{{ route('destinations.index') }}" 
         class="flex-1 rgs-btn rgs-btn-primary !py-2.5 !px-2 !text-xs !tracking-wide flex items-center justify-center gap-1.5 text-center">
        <span class="material-symbols-outlined text-[17px]">travel_explore</span>
        <span>{{ __('site.common.explore_destinations') }}</span>
      </a>
    </div>
  </div>

  <!-- Mobile WhatsApp Contact Sheet Modal -->
  <div id="mobileWhatsAppModal" class="hidden fixed inset-0 z-50 flex items-end sm:items-center justify-center bg-black/50 backdrop-blur-xs p-0 sm:p-4">
    <div class="bg-surface w-full max-w-md p-6 border-t-4 border-[#8C5151] border-x border-b border-outline-variant/30 shadow-2xl flex flex-col gap-4">
      <div class="flex items-center justify-between pb-3 border-b border-outline-variant/20">
        <div>
          <span class="font-headline-sm text-lg font-bold text-on-surface">{{ __('site.modal.wa_title') }}</span>
          <p class="text-xs text-on-surface-variant">{{ __('site.modal.wa_subtitle') }}</p>
        </div>
        <button type="button" onclick="document.getElementById('mobileWhatsAppModal').classList.add('hidden');" class="p-1 text-on-surface-variant hover:text-primary">
          <span class="material-symbols-outlined text-[24px]">close</span>
        </button>
      </div>

      <div class="flex flex-col gap-3">
        <!-- Maya -->
        <a href="https://wa.me/6282116200363?text={{ urlencode(__('site.modal.maya_msg')) }}" target="_blank" rel="noopener noreferrer" class="p-3 bg-surface-container-low hover:bg-surface-container border-b-2 border-[#8C5151]/30 hover:border-[#8C5151] flex items-center justify-between transition-colors">
          <div>
            <span class="font-bold text-sm text-on-surface">{{ __('site.modal.maya_name') }}</span>
            <span class="text-[11px] text-secondary block">{{ __('site.modal.maya_role') }}</span>
            <span class="text-xs text-on-surface-variant font-mono mt-0.5 block">+62 821-1620-0363</span>
          </div>
          <span class="material-symbols-outlined text-primary text-[20px]">chat</span>
        </a>

        <!-- Azki -->
        <a href="https://wa.me/6285894860696?text={{ urlencode(__('site.modal.azki_msg')) }}" target="_blank" rel="noopener noreferrer" class="p-3 bg-surface-container-low hover:bg-surface-container border-b-2 border-[#8C5151]/30 hover:border-[#8C5151] flex items-center justify-between transition-colors">
          <div>
            <span class="font-bold text-sm text-on-surface">{{ __('site.modal.azki_name') }}</span>
            <span class="text-[11px] text-secondary block">{{ __('site.modal.azki_role') }}</span>
            <span class="text-xs text-on-surface-variant font-mono mt-0.5 block">+62 858-9486-0696</span>
          </div>
          <span class="material-symbols-outlined text-primary text-[20px]">chat</span>
        </a>

        <!-- Ryan -->
        <a href="https://wa.me/6285774410978?text={{ urlencode(__('site.modal.ryan_msg')) }}" target="_blank" rel="noopener noreferrer" class="p-3 bg-surface-container-low hover:bg-surface-container border-b-2 border-[#8C5151]/30 hover:border-[#8C5151] flex items-center justify-between transition-colors">
          <div>
            <span class="font-bold text-sm text-on-surface">{{ __('site.modal.ryan_name') }}</span>
            <span class="text-[11px] text-secondary block">{{ __('site.modal.ryan_role') }}</span>
            <span class="text-xs text-on-surface-variant font-mono mt-0.5 block">+62 857-7441-0978</span>
          </div>
          <span class="material-symbols-outlined text-primary text-[20px]">chat</span>
        </a>
      </div>

      <button type="button" onclick="document.getElementById('mobileWhatsAppModal').classList.add('hidden');" class="rgs-btn rgs-btn-outline w-full text-center !py-2 text-xs">
        <span>{{ __('site.modal.close') }}</span>
      </button>
    </div>
  </div>

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