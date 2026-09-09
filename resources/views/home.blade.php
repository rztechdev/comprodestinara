@extends('layouts.app')

@section('title', 'Destinara — Menghidupkan Ruang Belajar Nyata di Tapak Nusantara')

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $intro = $sections['intro_story'] ?? null;
  $cta = $sections['cta_home'] ?? null;
@endphp
<main class="w-full pt-20 bg-surface">
  <div class="flex flex-col w-full">
    
    @if(!$hero || $hero->is_active)
    <!-- SECTION 1: HERO FULL-WIDTH -->
    <section class="relative w-full -mt-20 overflow-hidden bg-surface-container-low">
      <div class="relative w-full min-h-[540px] sm:min-h-[620px] lg:min-h-[700px] flex items-end bg-cover bg-center" style="background-image: url('{{ $hero?->image_url ?? asset('assets/img/hd/hero-home.jpg') }}')">
        <!-- Duotone warm wash overlay in deep terracotta and muted amber -->
        <div class="absolute inset-0 bg-gradient-to-t from-inverse-surface via-primary/60 to-primary/30 mix-blend-multiply pointer-events-none"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-inverse-surface/80 via-transparent to-inverse-surface/40 pointer-events-none"></div>
        <div class="relative z-10 w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop pt-28 sm:pt-space-3xl lg:pt-space-4xl pb-space-xl sm:pb-space-2xl lg:pb-space-3xl flex flex-col items-start gap-space-md sm:gap-space-lg">
          <div class="max-w-[840px] flex flex-col gap-space-xs sm:gap-space-md">
            <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl lg:text-display-hero text-inverse-on-surface leading-tight tracking-tight">
              {{ $hero?->title ?? 'Menghidupkan Ruang Belajar Nyata di Balik Kehangatan Desa Nusantara' }}
            </h1>
            <p class="font-body-lead text-sm sm:text-base md:text-body-lead text-primary-fixed max-w-[680px]">
              {{ $hero?->subtitle ?? 'Menjembatani kurikulum institusi pendidikan dengan kearifan tapak, ekologi lokal, dan narasi hidup masyarakat adat di seluruh penjuru Indonesia.' }}
            </p>
          </div>
          <div class="pt-space-xs flex flex-col sm:flex-row items-start sm:items-center gap-space-sm sm:gap-space-lg w-full sm:w-auto">
            <a class="w-full sm:w-auto text-center justify-center bg-primary-container text-on-primary font-label-action text-label-action px-space-lg py-space-sm rounded-lg transition-colors hover:bg-primary shadow-sm inline-flex items-center" href="{{ $hero?->button_link ?? route('destinations.index') }}">
              {{ $hero?->button_text ?? 'Jelajahi Destinasi' }}
            </a>
            <span class="font-caption-fieldnote text-caption-fieldnote italic text-primary-fixed-dim text-xs sm:text-sm">
              {{ $hero?->image_caption ?? ('Dokumentasi tapak lapangan aktif tahun akademik ' . date('Y') . '/' . (date('Y')+1)) }}
            </span>
          </div>
        </div>
      </div>
    </section>
    @endif

    @if(!$intro || $intro->is_active)
    <!-- SECTION 2: CERITA PEMBUKA (ASIMETRIS: 60% FOTO DOKUMENTER, 40% NARASI) -->
    <section class="w-full py-space-2xl sm:py-space-3xl lg:py-space-4xl bg-surface">
      <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl sm:gap-space-2xl items-center">
          <!-- Kolom Kiri: 60% (7 kolom) -->
          <div class="lg:col-span-7 flex flex-col gap-space-xs">
            <div class="relative w-full aspect-[4/3] overflow-hidden bg-surface-container-high rounded-lg shadow-sm">
              <img class="w-full h-full object-cover" alt="{{ $intro?->title ?? 'Tapak Studi Etnobotani Pewarnaan Alami' }}" src="{{ $intro?->image_url ?? asset('assets/img/hd/story-sikka.jpg') }}"/>
              <div class="absolute inset-0 bg-primary/10 mix-blend-color pointer-events-none"></div>
            </div>
            <div class="flex flex-col sm:flex-row sm:items-baseline justify-between pt-space-2xs text-on-surface-variant gap-1">
              <span class="font-caption-fieldnote text-caption-fieldnote italic text-xs sm:text-caption-fieldnote">
                {{ $intro?->image_caption ?? 'Tapak Studi Etnobotani Pewarnaan Alami, Sanggar Tarum, Kulon Progo' }}
              </span>
              @if($intro?->badge)
              <span class="font-label-tag text-label-tag text-secondary text-xs">
                {{ $intro->badge }}
              </span>
              @endif
            </div>
          </div>
          <!-- Kolom Kanan: 40% (5 kolom) -->
          <div class="lg:col-span-5 flex flex-col justify-center gap-space-md sm:gap-space-lg pl-0 lg:pl-space-md">
            <div class="w-12 h-[2px] bg-tertiary"></div>
            <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface leading-snug">
              {{ $intro?->title ?? 'Desa Bukan Sekadar Destinasi Singgah, Melainkan Buku Pengetahuan yang Terbuka' }}
            </h2>
            <div class="flex flex-col gap-space-md font-body-lead text-body-lead text-on-surface-variant">
              @if($intro?->subtitle)
                <p>{{ $intro->subtitle }}</p>
              @endif
              @if($intro?->content)
                <div class="font-body-default text-body-default text-on-surface space-y-3">
                  {!! nl2br(e($intro->content)) !!}
                </div>
              @endif
            </div>
            @if($intro?->button_text)
            <div class="pt-space-xs">
              <a class="inline-block font-label-action text-label-action text-primary underline underline-offset-8 decoration-primary/40 hover:decoration-primary transition-colors" href="{{ $intro->button_link ?? route('about') }}">
                {{ $intro->button_text }}
              </a>
            </div>
            @endif
          </div>
        </div>
      </div>
    </section>
    @endif

    <!-- SECTION 3: UNTUK SIAPA DESTINARA (DUA BLOK ASIMETRIS BERDAMPINGAN) -->
    <section class="w-full py-space-3xl bg-surface-container-low">
      <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col gap-space-2xl">
        <div class="max-w-[620px] flex flex-col gap-space-xs">
          <h3 class="font-headline-md text-headline-md text-on-surface">
            Ruang Kolaborasi Dua Arah
          </h3>
          <p class="font-body-default text-body-default text-on-surface-variant">
            Pendidikan lapangan yang bermartabat tidak mengambil pengetahuan secara sepihak, melainkan merawat kedaulatan warga yang menjaganya.
          </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-start">
          <!-- Blok 1: Sekolah & Kampus -->
          <div class="lg:col-span-6 bg-surface p-space-xl flex flex-col gap-space-lg shadow-sm rounded-lg card-interactive">
            <div class="relative w-full h-[320px] overflow-hidden bg-surface-container rounded-lg">
              <img class="w-full h-full object-cover" alt="Mahasiswa arsitektur dan antropologi mendokumentasikan konstruksi kayu vernakular" src="{{ asset('assets/img/hd/story-ulin.jpg') }}"/>
              <div class="absolute inset-0 bg-primary/10 mix-blend-multiply pointer-events-none"></div>
            </div>
            <div class="flex flex-col gap-space-sm">
              <span class="font-label-tag text-label-tag text-secondary">
                Bagi Pendidik &amp; Peneliti
              </span>
              <h4 class="font-headline-sm text-headline-sm text-on-surface">
                Sekolah &amp; Kampus
              </h4>
              <p class="font-body-default text-body-default text-on-surface-variant">
                Kurikulum kontekstual terakreditasi mulai dari ekologi maritim, mitigasi bencana berbasis lanskap, hingga etnografi kriya. Dilengkapi logistik tersertifikasi dan instrumen asesmen capaian belajar.
              </p>
            </div>
            <div class="pt-space-xs">
              <a class="inline-block font-label-action text-label-action text-primary underline underline-offset-4 decoration-primary/40 hover:decoration-primary transition-colors" href="{{ route('for-schools') }}">
                Pelajari Program Studi
              </a>
            </div>
          </div>

          <!-- Blok 2: Pengelola Destinasi & Warga Adat -->
          <div class="lg:col-span-6 lg:mt-space-2xl bg-surface-container p-space-xl flex flex-col gap-space-lg shadow-sm rounded-lg card-interactive">
            <div class="relative w-full h-[380px] overflow-hidden bg-surface-container-high rounded-lg">
              <img class="w-full h-full object-cover" alt="Tetua desa dan pemangku adat bermusyawarah santun" src="{{ asset('assets/img/hd/story-sasak.jpg') }}"/>
              <div class="absolute inset-0 bg-primary/10 mix-blend-multiply pointer-events-none"></div>
            </div>
            <div class="flex flex-col gap-space-sm">
              <span class="font-label-tag text-label-tag text-tertiary">
                Bagi Penjaga Wilayah &amp; Tetua Adat
              </span>
              <h4 class="font-headline-sm text-headline-sm text-on-surface">
                Pengelola Destinasi &amp; Warga Adat
              </h4>
              <p class="font-body-default text-body-default text-on-surface-variant">
                Kedaulatan narasi sepenuhnya berada di tangan komunitas lokal. Dana program dialokasikan langsung untuk kas konservasi sanggar, regenerasi keterampilan muda, dan penjagaan wilayah adat.
              </p>
            </div>
            <div class="pt-space-xs">
              <a class="inline-block font-label-action text-label-action text-secondary underline underline-offset-4 decoration-secondary/40 hover:decoration-secondary transition-colors" href="{{ route('for-villages') }}">
                Kemitraan Kedaulatan Desa
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SECTION 4: DESTINASI PILIHAN (DARI DATABASE) -->
    <section class="w-full py-space-4xl bg-surface" id="destinasi">
      <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col gap-space-2xl">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md">
          <div class="max-w-[580px] flex flex-col gap-space-xs">
            <h3 class="font-headline-lg text-headline-lg text-on-surface">
              Tapak Studi Pilihan
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant">
              Lanskap pembelajaran terbuka yang siap menyambut rombongan sekolah dan gugus riset dengan protokol budaya yang kokoh.
            </p>
          </div>
          <a class="font-label-action text-label-action text-primary underline underline-offset-4 decoration-primary/40 hover:decoration-primary self-start md:self-auto transition-colors" href="{{ route('destinations.index') }}">
            Lihat Indeks Seluruh Tapak
          </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-space-lg">
          @forelse($featuredDestinations as $dest)
            <div class="flex flex-col bg-surface-container-low shadow-sm rounded-lg overflow-hidden card-interactive">
              <div class="relative w-full h-[420px] overflow-hidden bg-surface-container">
                <img class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" alt="{{ $dest->name }}" src="{{ $dest->image_url }}"/>
                <div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/90 via-inverse-surface/30 to-transparent"></div>
                <div class="absolute bottom-0 inset-x-0 p-space-lg flex flex-col gap-space-2xs text-inverse-on-surface">
                  <span class="font-label-tag text-label-tag text-tertiary-fixed">
                    {{ $dest->location }}
                  </span>
                  <h4 class="font-headline-sm text-headline-sm text-inverse-on-surface">
                    <a href="{{ route('destinations.show', $dest->slug) }}" class="hover:underline">
                      {{ $dest->name }}
                    </a>
                  </h4>
                </div>
              </div>
              <div class="p-space-lg flex flex-col justify-between flex-grow gap-space-md">
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  {{ $dest->lead ?? Str::limit(strip_tags($dest->description), 120) }}
                </p>
                <div class="pt-space-xs flex items-center justify-between text-on-surface-variant font-caption-fieldnote text-caption-fieldnote italic">
                  <span>Modul: {{ $dest->module_name ?? 'Kurikulum Tapak' }}</span>
                  <span class="text-secondary font-label-tag text-label-tag">Kapasitas: {{ $dest->capacity ?? '20 Peneliti' }}</span>
                </div>
              </div>
            </div>
          @empty
            <p class="text-on-surface-variant col-span-3 text-center py-8">Belum ada tapak pilihan aktif.</p>
          @endforelse
        </div>
      </div>
    </section>

    <!-- SECTION 5: PENUTUP (KUTIPAN VISI-MISI BESAR DI TENGAH HALAMAN) -->
    @if(!$cta || $cta->is_active)
    <section class="w-full py-space-2xl sm:py-space-3xl lg:py-space-4xl bg-surface-container-low">
      <div class="max-w-[960px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col items-center text-center gap-space-lg sm:gap-space-xl">
        <div class="w-16 h-[2px] bg-primary"></div>
        <blockquote class="font-headline-lg text-xl sm:text-2xl md:text-3xl lg:text-headline-lg text-on-surface leading-snug tracking-tight">
          “{{ $cta?->subtitle ?? \App\Models\SiteSetting::get('manifesto_quote', 'Pendidikan sejati tidak memisahkan insan akademis dari tanah tempat ia berpijak, melainkan mempertemukan kecendekiaan akal dengan kerendahhatian laku warga di perbatasan.') }}”
        </blockquote>
        <div class="flex flex-col items-center gap-space-2xs">
          <span class="font-headline-sm text-lg sm:text-headline-sm text-primary">
            {{ $cta?->title ?? 'Piagam Pendidikan Tapak Nusantara' }}
          </span>
          <span class="font-caption-fieldnote text-xs sm:text-caption-fieldnote italic text-on-surface-variant">
            {{ $cta?->badge ?? \App\Models\SiteSetting::get('manifesto_author', 'Destinara • Dewan Penasihat Akademik & Pemangku Adat Mitra') }}
          </span>
        </div>
        <div class="pt-space-sm sm:pt-space-md w-full sm:w-auto">
          <a class="w-full sm:w-auto text-center justify-center bg-primary-container text-on-primary font-label-action text-label-action px-space-xl py-space-sm rounded-lg hover:bg-primary transition-colors inline-flex shadow-md" href="{{ $cta?->button_link ?? route('contact.index') }}">
            {{ $cta?->button_text ?? 'Konsultasikan Program Kunjungan' }}
          </a>
        </div>
      </div>
    </section>
    @endif

  </div>
</main>
@endsection