@extends('layouts.app')

@section('title', 'Destinara — Menghidupkan Ruang Belajar Nyata di Tapak Nusantara')
@section('meta_description', 'Destinara menghubungkan institusi pendidikan, sekolah, dan peneliti dengan desa adat di seluruh Nusantara melalui program field trip berizin, live-in kurikulum tapak, dan riset berbasis kedaulatan pengetahuan lokal.')
@section('meta_keywords', 'destinara, wisata edukasi nusantara, field trip sekolah, study tour berizin, live in desa, riset antropologi, penelitian tapak, kearifan lokal, kemitraan desa wisata, etnobotani, layanan destinara')
@section('og_image', asset('assets/img/hd/hero-home.jpg'))

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $intro = $sections['intro_story'] ?? null;
  $cta = $sections['cta_home'] ?? null;
@endphp

<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
  <div class="flex flex-col w-full">

    <!-- ==================== SECTION 1: HERO DOKUMENTER DENGAN RGS OVERLAPPING PANEL ==================== -->
    @if(!$hero || $hero->is_active)
    <section class="relative w-full bg-surface pb-0 mb-0">
      <!-- Container Media Hero (Full-width dengan tinggi sinematik ala RGS) -->
      <div class="relative w-full h-[420px] sm:h-[520px] md:h-[580px] lg:h-[640px] xl:h-[700px] overflow-hidden bg-[#231917]">
        <img src="{{ $hero?->image_url ?? asset('assets/img/hd/hero-home.jpg') }}" 
             alt="{{ $hero?->title ?? 'Dokumentasi Lapangan Destinara' }}" 
             class="w-full h-full object-cover object-[center_15%] brightness-95"/>
        <!-- Gradasi pencahayaan halus ala RGS di bagian bawah -->
        <div class="absolute inset-0 bg-gradient-to-t from-[#231917]/70 via-[#231917]/20 via-30% to-transparent pointer-events-none"></div>
        
        <!-- RGS Architectural Cartographic Lines (100% Sejajar dengan Needle & Margin Header) -->
        <div class="absolute inset-0 pointer-events-none z-10">
          <div class="max-w-[1440px] mx-auto px-gutter-mobile md:px-gutter-desktop h-full relative">
            <!-- Garis Vertikal: SEJAJAR PRESISI 100% DENGAN NEEDLE LOGO HEADER -->
            <div class="relative w-5 h-full mr-1">
              <div class="w-[2px] h-full bg-white/90 absolute left-1/2 -translate-x-1/2 top-0"></div>
            </div>
          </div>
        </div>

        <!-- Garis Horizontal Melintang Penuh dari Kiri ke Kanan Layar -->
        <div class="rgs-hero-grid-h pointer-events-none"></div>

        <!-- RGS Image Citation Badge (Pojok Kanan Bawah Foto ala RGS) -->
        <div class="absolute bottom-24 sm:bottom-32 lg:bottom-3 right-4 z-20 pointer-events-auto">
          <div class="inline-flex items-center gap-1.5 bg-[#231917]/70 backdrop-blur-sm text-white/80 hover:text-white px-2.5 py-1 text-[11px] font-sans transition-colors cursor-default" title="{{ $hero?->image_caption ?? 'Dokumentasi tapak aktif Sanggar Tarum Pewarna Alami, Kulon Progo, DIY' }}">
            <span class="w-4 h-4 rounded-full bg-white/20 inline-flex items-center justify-center text-[10px] font-bold italic font-serif">i</span>
            <span class="hidden sm:inline font-caption-fieldnote italic">{{ $hero?->image_caption ?? 'Sanggar Tarum, Kulon Progo' }}</span>
          </div>
        </div>
      </div>

      <!-- Content Area: Max-W 1440px Sejajar dengan Header & Garis Menyambung di Samping Card -->
      <div class="max-w-[1440px] mx-auto px-gutter-mobile md:px-gutter-desktop relative -mt-20 sm:-mt-28 lg:-mt-36 xl:-mt-42 z-20">
        <a href="{{ $hero?->button_link ?? route('destinations.index') }}" 
           class="rgs-hero-panel ml-auto lg:mr-16 xl:mr-24 w-full lg:max-w-[460px] xl:max-w-[490px] pt-5 sm:pt-7 px-5 sm:px-8 pb-12 sm:pb-14 block group text-decoration-none transition-transform hover:-translate-y-0.5">
          
          <!-- Judul Utama (Font Awal: Newsreader Serif tapi Tetap Tebal/Bold) -->
          <h1 class="font-display-hero font-bold text-lg sm:text-2xl lg:text-[26px] lg:leading-[34px] text-[#231917] tracking-tight mb-2 sm:mb-3">
            {{ $hero?->title ?? 'Menghidupkan Ruang Belajar Nyata di Balik Kehangatan Desa Nusantara' }}
          </h1>

          <!-- Narasi Pengantar (Work Sans Kompak & Elegan) -->
          <p class="font-body-default text-xs sm:text-[14px] text-[#2B211E]/80 leading-relaxed">
            {{ $hero?->subtitle ?? 'Menjembatani kurikulum institusi pendidikan dengan kearifan tapak, ekologi lokal, dan narasi hidup masyarakat adat di seluruh penjuru Indonesia.' }}
          </p>

          <!-- RGS Signature Circular Action Button (Pojok Kanan Bawah Kompak) -->
          <div class="absolute bottom-3.5 right-3.5 sm:bottom-5 sm:right-6 w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-[#8C5151] group-hover:bg-[#703a3a] text-white flex items-center justify-center transition-all duration-200 group-hover:scale-105 shadow-sm">
            <svg class="w-3.5 h-3.5 sm:w-4.5 sm:h-4.5 transition-transform duration-200 group-hover:translate-x-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
            </svg>
          </div>

        </a>
      </div>
    </section>
    @endif

    <!-- ==================== SECTION 2: THE THREE GATEWAYS (RGS ROLE CARDS DENGAN FLUSH TAGS) ==================== -->
    <section class="w-full pt-4 sm:pt-6 lg:pt-8 pb-12 sm:pb-16 lg:pb-20 bg-surface">
      <div class="max-w-[1360px] mx-auto px-gutter-mobile md:px-gutter-desktop">
        
        <!-- Section Header -->
        <div class="max-w-[800px] mb-8 sm:mb-10">
          <span class="text-xs font-bold uppercase tracking-widest text-primary block mb-2">
            PINTU AKSES BERDASARKAN KEBUTUHAN
          </span>
          <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface leading-snug">
            Dirancang Sesuai Tanggung Jawab &amp; Standar Institusi Anda
          </h2>
          <p class="mt-3 font-body-default text-on-surface-variant leading-relaxed">
            Setiap kelompok pemangku kepentingan memiliki kebutuhan, tata kelola, dan tolok ukur capaian yang berbeda. Pilih jalur yang relevan dengan mandat Anda:
          </p>
        </div>

        <!-- 3 Gateway Columns Grid (Format Editorial RGS: Tanpa Box Kartu, Flat dengan Garis Pembatas Bawah Menyambung) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10 items-stretch border-b-2 border-[#8C5151]/35 overflow-hidden">
          
          <!-- Gateway 1: Sekolah & Madrasah -->
          <div class="rgs-card flex flex-col justify-between">
            <div>
              <!-- Header Gambar dengan Category Tag Pinned di Kiri Atas -->
              <div class="relative w-full h-[220px] overflow-hidden bg-surface-container">
                <span class="rgs-category-tag bg-[#8C5151] absolute top-3 left-0 z-10">
                  Untuk Sekolah &amp; Madrasah
                </span>
                <img src="{{ asset('assets/img/hd/story-ulin.jpg') }}" 
                     alt="Program Sekolah Destinara" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-103"/>
                <div class="absolute inset-0 bg-[#231917]/20 pointer-events-none"></div>
              </div>

              <!-- Content (Flush, Flat & Editorial) -->
              <div class="pt-5 pb-3 flex flex-col gap-3">
                <h3 class="font-headline-sm text-xl sm:text-[22px] text-on-surface font-bold">
                  Ekskursi &amp; Live-in Siswa
                </h3>
                <p class="font-body-default text-[15px] sm:text-[16px] text-on-surface-variant leading-relaxed">
                  Pendidikan karakter kontekstual yang terhubung dengan silabus Kurikulum Merdeka (P5), dilengkapi rasio pendamping aman, SOP medis, dan perlindungan asuransi penuh.
                </p>

                <!-- Checklist Detail -->
                <div class="mt-2 pt-3 border-t border-[#2B211E]/10 space-y-2 text-sm text-on-surface font-body-sm">
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Modul tematik P5 &amp; kearifan lokal</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Rasio pendamping ketat 1 fasilitator : 8 siswa</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Lembar asesmen capaian belajar pasca-program</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Action Link / Button sitting directly on the bottom border -->
            <div class="pt-4">
              <a href="{{ route('for-schools') }}" 
                 class="rgs-btn rgs-btn-primary w-full text-center">
                <span>Pelajari Program Sekolah</span>
              </a>
            </div>
          </div>

          <!-- Gateway 2: Peneliti & Perguruan Tinggi -->
          <div class="rgs-card flex flex-col justify-between">
            <div>
              <!-- Header Gambar dengan Category Tag Pinned di Kiri Atas -->
              <div class="relative w-full h-[220px] overflow-hidden bg-surface-container">
                <span class="rgs-category-tag bg-[#51634b] absolute top-3 left-0 z-10">
                  Untuk Dosen &amp; Peneliti
                </span>
                <img src="{{ asset('assets/img/hd/story-sikka.jpg') }}" 
                     alt="Program Peneliti Destinara" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-103"/>
                <div class="absolute inset-0 bg-[#231917]/20 pointer-events-none"></div>
              </div>

              <!-- Content (Flush, Flat & Editorial) -->
              <div class="pt-5 pb-3 flex flex-col gap-3">
                <h3 class="font-headline-sm text-xl sm:text-[22px] text-on-surface font-bold">
                  Laboratorium Hidup &amp; KKL
                </h3>
                <p class="font-body-default text-[15px] sm:text-[16px] text-on-surface-variant leading-relaxed">
                  Stasiun riset tapak bagi dosen dan mahasiswa dengan protokol etika FPIC, akses ke narasumber tetua adat terverifikasi, dan akomodasi riset berbasis komunitas.
                </p>

                <!-- Checklist Detail -->
                <div class="mt-2 pt-3 border-t border-[#2B211E]/10 space-y-2 text-sm text-on-surface font-body-sm">
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Etika persetujuan awal masyarakat (FPIC 100%)</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Klaster etnobotani, kriya &amp; lanskap vernakular</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Fasilitasi izin riset &amp; publikasi bersama warga</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Action Link / Button sitting directly on the bottom border -->
            <div class="pt-4">
              <a href="{{ route('for-researchers') }}" 
                 class="rgs-btn rgs-btn-secondary w-full text-center">
                <span>Pelajari Kolaborasi Riset</span>
              </a>
            </div>
          </div>

          <!-- Gateway 3: Pengelola Tapak & Pokdarwis -->
          <div class="rgs-card flex flex-col justify-between">
            <div>
              <!-- Header Gambar dengan Category Tag Pinned di Kiri Atas -->
              <div class="relative w-full h-[220px] overflow-hidden bg-surface-container">
                <span class="rgs-category-tag bg-[#86580d] absolute top-3 left-0 z-10">
                  Untuk Pengelola Desa &amp; Adat
                </span>
                <img src="{{ asset('assets/img/hd/story-sasak.jpg') }}" 
                     alt="Program Desa Adat Destinara" 
                     class="w-full h-full object-cover transition-transform duration-500 hover:scale-103"/>
                <div class="absolute inset-0 bg-[#231917]/20 pointer-events-none"></div>
              </div>

              <!-- Content (Flush, Flat & Editorial) -->
              <div class="pt-5 pb-3 flex flex-col gap-3">
                <h3 class="font-headline-sm text-xl sm:text-[22px] text-on-surface font-bold">
                  Kemitraan Kedaulatan Tapak
                </h3>
                <p class="font-body-default text-[15px] sm:text-[16px] text-on-surface-variant leading-relaxed">
                  Kerjasama bermartabat yang menjaga tanah ulayat dan tatanan adat, transparansi bagi hasil langsung ke kas desa, serta pembinaan pemuda lokal sebagai narasumber.
                </p>

                <!-- Checklist Detail -->
                <div class="mt-2 pt-3 border-t border-[#2B211E]/10 space-y-2 text-sm text-on-surface font-body-sm">
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Kedaulatan narasi mutlak milik warga tapak</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Alokasi dana kas sanggar &amp; regenerasi pemuda</span>
                  </div>
                  <div class="flex items-start gap-2">
                    <span class="text-secondary font-bold">✓</span>
                    <span>Pendamping lapangan siaga dari sekretariat</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Action Link / Button sitting directly on the bottom border -->
            <div class="pt-4">
              <a href="{{ route('for-villages') }}" 
                 class="rgs-btn bg-[#86580d] hover:bg-[#684200] text-white w-full text-center">
                <span>Kemitraan Kedaulatan Desa</span>
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ==================== SECTION 3: REKAM JEJAK & METRIK INSTITUSIONAL (LEDGER) ==================== -->
    @if(isset($stats) && $stats->count() > 0)
    <section class="w-full py-10 sm:py-12 bg-surface-container-low border-y border-[#8C5151]/15">
      <div class="max-w-[1360px] mx-auto px-gutter-mobile md:px-gutter-desktop">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 divide-y sm:divide-y-0 sm:divide-x divide-[#8C5151]/15">
          @foreach($stats as $stat)
          <div class="flex flex-col items-center sm:items-start {{ $loop->index > 0 ? 'sm:pl-6 lg:pl-8' : '' }} {{ $loop->index > 1 ? 'pt-4 sm:pt-0' : '' }}">
            <span class="font-display-hero text-3xl sm:text-4xl lg:text-5xl text-primary font-normal tracking-tight">
              {{ $stat->value }}
            </span>
            <span class="mt-1 font-body-default text-sm sm:text-[16px] text-on-surface font-semibold text-center sm:text-left">
              {{ $stat->label }}
            </span>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    @endif

    <!-- ==================== SECTION 4: CERITA PEMBUKA & MANIFESTO ETIS (ASIMETRIS) ==================== -->
    @if(!$intro || $intro->is_active)
    <section class="w-full py-16 sm:py-20 lg:py-24 bg-surface">
      <div class="max-w-[1360px] mx-auto px-gutter-mobile md:px-gutter-desktop">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 items-center">
          
          <!-- Kolom Foto Dokumenter (7 Kolom) -->
          <div class="lg:col-span-7 flex flex-col gap-3">
            <div class="relative w-full aspect-[4/3] overflow-hidden bg-surface-container-high rounded-none border border-[#8C5151]/20">
              <img class="w-full h-full object-cover" 
                   alt="{{ $intro?->title ?? 'Tapak Studi Etnobotani Pewarnaan Alami' }}" 
                   src="{{ $intro?->image_url ?? asset('assets/img/hd/story-sikka.jpg') }}"/>
              <div class="absolute inset-0 bg-primary/10 mix-blend-color pointer-events-none"></div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between pt-1 text-on-surface-variant gap-1">
              <span class="font-caption-fieldnote text-caption-fieldnote italic text-xs sm:text-sm">
                {{ $intro?->image_caption ?? 'Arsip Lapangan: Tapak Studi Etnobotani Pewarnaan Alami, Sanggar Tarum, Kulon Progo' }}
              </span>
              <span class="font-label-tag text-xs font-bold text-secondary uppercase tracking-wider">
                {{ $intro?->badge ?? '[ ARSIP ETIS TAPAK ]' }}
              </span>
            </div>
          </div>

          <!-- Kolom Narasi Pembuka (5 Kolom) -->
          <div class="lg:col-span-5 flex flex-col justify-center gap-5 pl-0 lg:pl-4">
            <div class="w-12 h-[2px] bg-[#86580d]"></div>
            <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-[34px] lg:leading-[42px] text-on-surface leading-snug">
              {{ $intro?->title ?? 'Desa Bukan Sekadar Destinasi Singgah, Melainkan Buku Pengetahuan yang Terbuka' }}
            </h2>
            
            <div class="flex flex-col gap-4 font-body-default text-on-surface-variant leading-relaxed text-[17px] sm:text-body-default">
              @if($intro?->subtitle)
                <p class="font-medium text-on-surface">{{ $intro->subtitle }}</p>
              @endif
              @if($intro?->content)
                <div class="space-y-3">
                  {!! nl2br(e($intro->content)) !!}
                </div>
              @else
                <p>
                  Pendidikan sejati melampaui lembar buku teks dan ruang kuliah berpenyejuk udara. Ketika siswa dan peneliti duduk bersama penenun, tetua adat, dan penjaga mata air, ilmu pengetahuan menemukan kembali akar kemanusiaan dan ekologinya.
                </p>
                <p>
                  Melalui Destinara, setiap kunjungan dipersiapkan secara etis: menghormati batas daya dukung alam, menjaga tatanan nilai warga, dan meninggalkan manfaat nyata bagi kelestarian komunitas tapak.
                </p>
              @endif
            </div>

            <div class="pt-2">
              <a href="{{ $intro?->button_link ?? route('about') }}" 
                 class="rgs-btn rgs-btn-outline self-start">
                <span>{{ $intro?->button_text ?? 'Baca Jejak Pendiri & Piagam Etika Kami' }}</span>
              </a>
            </div>
          </div>

        </div>
      </div>
    </section>
    @endif

    <!-- ==================== SECTION 5: TAPAK STUDI PILIHAN (FIELD DOSSIERS ALA RGS) ==================== -->
    <section class="w-full py-16 sm:py-20 lg:py-24 bg-surface-container-low border-t border-[#8C5151]/15" id="destinasi">
      <div class="max-w-[1360px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col gap-10 sm:gap-14">
        
        <!-- Header Tapak -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-[#8C5151]/15 pb-6">
          <div class="max-w-[680px] flex flex-col gap-2">
            <span class="text-xs font-bold uppercase tracking-widest text-primary">
              INDEX STASIUN TAPAK AKTIF
            </span>
            <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface">
              Tapak Studi &amp; Stasiun Riset Pilihan
            </h2>
            <p class="font-body-default text-on-surface-variant">
              Lanskap pembelajaran terbuka yang telah lolos uji kelayakan etika adat, siap menyambut rombongan sekolah dan gugus riset dengan protokol budaya yang kokoh.
            </p>
          </div>
          <a href="{{ route('destinations.index') }}" 
             class="rgs-btn rgs-btn-outline self-start md:self-end">
            <span>Buka Seluruh Indeks Tapak</span>
          </a>
        </div>

        <!-- Grid Field Dossiers (Format RGS: Tanpa Box Kartu, Flat dengan Garis Pembatas Bawah Menyambung) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10 items-stretch border-b-2 border-[#8C5151]/35 overflow-hidden">
          @forelse($featuredDestinations as $dest)
            <div class="rgs-card flex flex-col justify-between">
              
              <!-- Item Top: Foto & Tag Wilayah Menempel -->
              <div>
                <div class="relative w-full aspect-[16/10] overflow-hidden bg-surface-container">
                  <!-- Pinned Category & Location Tags (Stacked vertically on left edge to prevent collision) -->
                  <div class="absolute top-3 left-0 z-10 flex flex-col items-start gap-1 max-w-[92%]">
                    <span class="rgs-category-tag bg-[#51634b] !py-1 !px-2.5 !text-xs tracking-wider shadow-sm">
                      {{ $dest->location }}
                    </span>
                    @if($dest->badge)
                    <span class="rgs-category-tag bg-[#8C5151] !py-1 !px-2.5 !text-xs tracking-wider shadow-sm">
                      {{ $dest->badge }}
                    </span>
                    @endif
                  </div>

                  <img src="{{ $dest->image_url }}" 
                       alt="{{ $dest->name }}" 
                       class="w-full h-full object-cover transition-transform duration-500 hover:scale-103"/>
                  <div class="absolute inset-0 bg-gradient-to-t from-[#231917]/85 via-[#231917]/25 to-transparent"></div>
                  
                  <!-- Title Overlay -->
                  <div class="absolute bottom-3 left-4 right-4">
                    <h3 class="font-headline-sm text-xl sm:text-headline-sm text-white drop-shadow-sm font-bold">
                      <a href="{{ route('destinations.show', $dest->slug) }}" class="hover:underline">
                        {{ $dest->name }}
                      </a>
                    </h3>
                  </div>
                </div>

                <!-- Item Body (Data Lapangan - Flush) -->
                <div class="pt-5 pb-3 flex flex-col gap-3.5">
                  <!-- Research Focus Badge -->
                  @if($dest->research_focus)
                  <span class="text-xs font-bold uppercase tracking-wider text-secondary bg-[#51634b]/10 px-2.5 py-1 self-start font-sans">
                    {{ $dest->research_focus }}
                  </span>
                  @endif

                  <p class="font-body-sm text-[15px] text-on-surface-variant leading-relaxed">
                    {{ $dest->lead ?? Str::limit(strip_tags($dest->description), 130) }}
                  </p>

                  <!-- Technical Metadata Box -->
                  <div class="bg-surface-container border border-[#2B211E]/10 p-3.5 text-xs sm:text-[14px] text-on-surface space-y-2 font-body-sm">
                    <div class="flex items-center justify-between">
                      <span class="text-on-surface-variant">Modul Silabus:</span>
                      <span class="font-bold text-on-surface">{{ $dest->module_name ?? 'Kurikulum Tapak Terpadu' }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                      <span class="text-on-surface-variant">Kapasitas Aman:</span>
                      <span class="font-bold text-secondary">{{ $dest->capacity ?? 'Maks. 20 Orang / Sesi' }}</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item Footer: Action Button Persegi di Atas Garis Bawah -->
              <div class="pt-4">
                <a href="{{ route('destinations.show', $dest->slug) }}" 
                   class="rgs-btn rgs-btn-outline w-full text-center">
                  <span>Buka Silabus Tapak</span>
                </a>
              </div>

            </div>
          @empty
            <p class="text-on-surface-variant col-span-3 text-center py-12">Belum ada tapak pilihan aktif.</p>
          @endforelse
        </div>

      </div>
    </section>

    <!-- ==================== SECTION 6: INSTITUTIONAL ASSURANCE & SAFETY MATRIX ==================== -->
    <section class="w-full py-16 sm:py-20 lg:py-24 bg-surface border-t border-[#8C5151]/15">
      <div class="max-w-[1360px] mx-auto px-gutter-mobile md:px-gutter-desktop">
        
        <!-- Header -->
        <div class="max-w-[800px] mb-12 sm:mb-16">
          <span class="text-xs font-bold uppercase tracking-widest text-secondary block mb-2">
            STANDAR KESELAMATAN &amp; ETIKA RESMI
          </span>
          <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface leading-snug">
            Mitigasi Risiko Terpadu &amp; Tanggung Jawab Moral Lapangan
          </h2>
          <p class="mt-3 font-body-default text-on-surface-variant leading-relaxed">
            Membawa rombongan siswa atau peneliti ke medan nyata menuntut kepastian standar operasional prosedur (SOP) yang teruji, bukan spekulasi wisata biasa:
          </p>
        </div>

        <!-- 4 Pillars Grid (Format RGS: Tanpa Box, Flat dengan Garis Pembatas Bawah Menyambung) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 items-stretch border-b-2 border-[#2B211E]/20 overflow-hidden">
          
          <div class="rgs-card-alt flex flex-col gap-3">
            <div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary">
              <span class="material-symbols-outlined text-[24px]">medical_services</span>
            </div>
            <h4 class="font-headline-sm text-lg text-on-surface font-bold">
              Mitigasi Medis &amp; Asuransi
            </h4>
            <p class="font-body-sm text-[15px] text-on-surface-variant leading-relaxed">
              Jaringan siaga bersama Puskesmas &amp; faskes rujukan terdekat, peralatan P3K bersertifikasi medan terbuka, dan asuransi rekanan resmi bagi seluruh rombongan.
            </p>
          </div>

          <div class="rgs-card-alt flex flex-col gap-3">
            <div class="w-10 h-10 bg-secondary/10 flex items-center justify-center text-secondary">
              <span class="material-symbols-outlined text-[24px]">verified_user</span>
            </div>
            <h4 class="font-headline-sm text-lg text-on-surface font-bold">
              Etika Persetujuan FPIC 100%
            </h4>
            <p class="font-body-sm text-[15px] text-on-surface-variant leading-relaxed">
              Persetujuan di muka tanpa paksaan (*Free, Prior, and Informed Consent*) bersama sesepuh adat demi menjaga privasi warga dan ritual sakral tapak.
            </p>
          </div>

          <div class="rgs-card-alt flex flex-col gap-3">
            <div class="w-10 h-10 bg-[#86580d]/10 flex items-center justify-center text-[#86580d]">
              <span class="material-symbols-outlined text-[24px]">badge</span>
            </div>
            <h4 class="font-headline-sm text-lg text-on-surface font-bold">
              Fasilitator Akademis Terlatih
            </h4>
            <p class="font-body-sm text-[15px] text-on-surface-variant leading-relaxed">
              Kolaborasi terpadu antara akademisi universitas dengan pemandu lokal tapak yang menguasai ekologi wilayah serta kearifan tutur sejarah lokal.
            </p>
          </div>

          <div class="rgs-card-alt flex flex-col gap-3">
            <div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary">
              <span class="material-symbols-outlined text-[24px]">fact_check</span>
            </div>
            <h4 class="font-headline-sm text-lg text-on-surface font-bold">
              Evaluasi &amp; Asesmen Silabus
            </h4>
            <p class="font-body-sm text-[15px] text-on-surface-variant leading-relaxed">
              Instrumen evaluasi terstruktur untuk mengukur pemahaman peserta didik pasca-kegiatan yang dapat langsung dilaporkan ke pihak sekolah/fakultas.
            </p>
          </div>

        </div>

      </div>
    </section>

    <!-- ==================== SECTION 7: OFFICIAL DOCUMENT HUB & CTA (RGS ARCHITECTURAL CALLOUT) ==================== -->
    <section class="w-full py-16 sm:py-20 lg:py-24 bg-surface-container-low border-t border-[#8C5151]/15">
      <div class="max-w-[1140px] mx-auto px-gutter-mobile md:px-gutter-desktop">
        <div class="bg-surface border-l-[8px] border-l-[#8C5151] border-y border-r border-[#2B211E]/15 p-8 sm:p-12 lg:p-14 flex flex-col md:flex-row md:items-center justify-between gap-8 shadow-xs">
          
          <div class="max-w-[640px] flex flex-col gap-3">
            <span class="text-xs font-bold uppercase tracking-widest text-primary">
              PUSAT KOORDINASI INSTITUSI
            </span>
            <h2 class="font-headline-lg text-2xl sm:text-3xl text-on-surface leading-tight font-normal">
              Butuh Dokumen Resmi untuk Rapat Dewan Guru, Yayasan, atau Senat Fakultas?
            </h2>
            <p class="font-body-default text-base text-on-surface-variant leading-relaxed">
              Kami menyediakan berkas Kerangka Acuan Kerja (KAK), proposal silabus P5, dan profil legalitas lengkap yang dapat Anda bawa langsung ke forum pertimbangan institusi Anda.
            </p>
          </div>

          <!-- Direct Action Buttons Tegas Persegi -->
          <div class="flex flex-col sm:flex-row md:flex-col gap-3 flex-shrink-0">
            <a href="{{ route('contact.index') }}" 
               class="rgs-btn rgs-btn-primary text-center">
              <span>Ajukan Audiensi / KAK</span>
            </a>
            <a href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_maya', '6282116200363') }}?text={{ urlencode('Halo Maya (Koordinator Program & Kurikulum Destinara), kami dari institusi pendidikan/riset ingin meminta berkas Kerangka Acuan Kerja (KAK) dan konsultasi jadwal.') }}" 
               target="_blank" 
               rel="noopener noreferrer"
               class="rgs-btn rgs-btn-secondary text-center">
              <span>WhatsApp Koordinator</span>
            </a>
          </div>

        </div>
      </div>
    </section>

  </div>
</main>
@endsection