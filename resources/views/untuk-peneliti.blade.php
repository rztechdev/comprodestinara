@extends('layouts.app')

@section('title', __('sections.for_researchers.hero.title') . ' — Destinara')
@section('meta_description', __('sections.for_researchers.hero.subtitle'))
@section('meta_keywords', 'riset lapangan antropologi, penelitian etnografi desa, protokol FPIC kearifan lokal, etnobotani nusantara, data primer desa adat, ekspedisi ilmiah nusantara, destinara peneliti')
@section('og_image', asset('assets/img/hd/hero-about.jpg'))

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "{{ __('site.nav.home') }}",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "{{ __('site.nav.for_researchers_full') }}",
      "item": "{{ route('for-researchers') }}"
    }
  ]
}
</script>
@endpush

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $ethics = $sections['ethics'] ?? null;
  $facilities = $sections['facilities'] ?? null;
@endphp
<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
    <div class="flex flex-col w-full">
      
      <!-- Top Archival Bar -->
      <section class="w-full bg-surface-container-low py-space-sm border-b border-outline-variant/30">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col md:flex-row md:items-center justify-between gap-space-xs text-on-surface-variant">
          <div class="flex items-center gap-space-sm font-caption-fieldnote text-caption-fieldnote italic">
            <span class="inline-block w-2 h-2 rounded-none bg-secondary"></span>
            <span>{{ __('sections.for_researchers.archival_bar.dept') }}</span>
          </div>
          <div class="flex items-center gap-space-md font-body-sm text-body-sm">
            <span class="text-secondary font-medium">{{ __('sections.for_researchers.archival_bar.protocol') }}</span>
            <span class="text-outline-variant">/</span>
            <span>{{ __('sections.for_researchers.archival_bar.connected') }}</span>
          </div>
        </div>
      </section>

      @if(!$hero || $hero->is_active)
      <!-- Hero Section -->
      <section class="w-full py-space-3xl relative overflow-hidden">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-center">
            <div class="lg:col-span-7 flex flex-col gap-space-lg">
              @if($hero?->badge)
              <div class="inline-flex items-center gap-space-xs bg-surface-container px-space-md py-space-xs rounded-none border border-outline-variant/40 w-fit text-secondary font-body-sm text-body-sm">
                <span class="material-symbols-outlined text-[18px]">history_edu</span>
                <span>{{ $hero->badge }}</span>
              </div>
              @endif
              <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl lg:text-display-hero text-on-surface tracking-tight leading-tight">
                {{ $hero?->title ?? __('sections.for_researchers.hero.title') }}
              </h1>
              <p class="font-body-lead text-body-lead text-on-surface-variant max-w-xl">
                {{ $hero?->subtitle ?? __('sections.for_researchers.hero.subtitle') }}
              </p>
              <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-md pt-space-xs">
                <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center text-center" href="{{ $hero?->button_link ?? '#direktori-desa' }}">
                  {{ $hero?->button_text ?? __('sections.for_researchers.hero.button_text') }}
                </a>
                <a class="rgs-btn rgs-btn-outline rounded-none inline-flex items-center justify-center text-center" href="#alur-riset">
                  {{ __('sections.for_researchers.hero.btn_learn_fpic') }}
                </a>
              </div>
              <!-- Academic Fieldnote Marginalia -->
              <div class="bg-surface-container-low p-space-md rounded-none mt-space-sm flex items-start gap-space-sm border-l-4 border-l-secondary border-t border-r border-b border-outline-variant/30">
                <span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">verified_user</span>
                <p class="font-caption-fieldnote text-caption-fieldnote text-on-surface-variant italic">
                  "{{ __('sections.for_researchers.hero.marginalia_quote') }}"
                  <span class="block not-italic font-body-sm text-on-surface text-[13px] mt-1 font-medium">{{ __('sections.for_researchers.hero.marginalia_author') }}</span>
                </p>
              </div>
            </div>

            <!-- Hero Photographic Plate -->
            <div class="lg:col-span-5 relative">
              <div class="bg-surface-container-high p-space-sm rounded-none border border-outline-variant/40 shadow-none">
                <div class="overflow-hidden rounded-none aspect-[4/5] relative">
                  <img class="w-full h-full object-cover" alt="{{ $hero?->title ?? 'Antropolog budaya melakukan wawancara lapangan' }}" src="{{ $hero?->image_url ?? asset('assets/img/hd/peneliti-wawancara.jpg') }}"/>
                  <div class="absolute bottom-0 inset-x-0 p-space-md bg-gradient-to-t from-inverse-surface/90 via-inverse-surface/60 to-transparent text-inverse-on-surface">
                    <span class="font-caption-fieldnote text-caption-fieldnote italic text-tertiary-fixed">{{ __('sections.for_researchers.hero.plate_caption') }}</span>
                    <p class="font-body-sm text-body-sm text-inverse-on-surface mt-0.5">{{ $hero?->image_caption ?? 'Pendataan lisan silsilah irigasi Subak & penyerbukan benih di Desa Batur, Kintamani.' }}</p>
                  </div>
                </div>
                <div class="mt-space-sm px-space-xs flex items-center justify-between text-on-surface-variant font-body-sm text-[13px]">
                  <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px] text-secondary">location_on</span>
                    {{ __('sections.for_researchers.hero.verified_site') }}
                  </span>
                  <span class="text-outline">{{ __('sections.for_researchers.hero.team_doc') }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      <!-- Section Manfaat: Layout Asimetris 2 Kolom -->
      <section class="w-full py-space-3xl bg-surface-container-low border-t border-outline-variant/30">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col gap-space-xs mb-space-2xl">
            <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.facilities.tag') }}</span>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">
              {{ __('sections.for_researchers.facilities.title') }}
            </h2>
          </div>
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-start">
            <!-- Kolom Kiri: Visual Kolase Arsip -->
            <div class="lg:col-span-5 flex flex-col gap-space-lg">
              <div class="rgs-card-alt group flex flex-col pt-0 pb-4">
                <div class="aspect-[16/10] overflow-hidden rounded-none">
                  <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Peneliti mempelajari naskah lontar kuno" src="{{ asset('assets/img/hd/peneliti-lontar.jpg') }}"/>
                </div>
                <div class="pt-space-sm">
                  <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.facilities.catalog_title') }}</span>
                  <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                    {{ __('sections.for_researchers.facilities.catalog_desc') }}
                  </p>
                </div>
              </div>
              <div class="bg-surface p-space-lg rounded-none border border-outline-variant/30 grid grid-cols-3 gap-space-sm text-center shadow-none">
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-primary font-serif">100%</span>
                  <span class="font-body-sm text-[13px] text-on-surface-variant">{{ __('sections.for_researchers.facilities.stat1_label') }}</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-secondary font-serif">18</span>
                  <span class="font-body-sm text-[13px] text-on-surface-variant">{{ __('sections.for_researchers.facilities.stat2_label') }}</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-tertiary font-serif">310+</span>
                  <span class="font-body-sm text-[13px] text-on-surface-variant">{{ __('sections.for_researchers.facilities.stat3_label') }}</span>
                </div>
              </div>
            </div>

            <!-- Kolom Kanan: 3 Pilar Unboxed Cards with Bottom Borders -->
            <div class="lg:col-span-7 flex flex-col gap-space-md">
              <div class="rgs-card-alt group flex flex-col sm:flex-row gap-space-md sm:gap-space-lg items-start pt-5 pb-5">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-none bg-surface-container-high text-primary flex items-center justify-center font-headline-sm text-headline-sm shrink-0 font-serif border border-outline-variant/30">
                  01
                </div>
                <div class="flex flex-col gap-space-xs">
                  <div class="flex flex-wrap items-center gap-space-xs sm:gap-space-sm">
                    <h3 class="font-headline-sm text-lg sm:text-headline-sm text-on-surface">{{ __('sections.for_researchers.facilities.f1_title') }}</h3>
                    <span class="bg-surface-container text-secondary text-[12px] px-2 py-0.5 rounded-none font-medium border border-outline-variant/30">{{ __('sections.for_researchers.facilities.tag_primary') }}</span>
                  </div>
                  <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant">
                    {{ __('sections.for_researchers.facilities.f1_desc') }}
                  </p>
                  <div class="font-body-sm text-xs sm:text-body-sm text-secondary pt-space-xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">folder_open</span>
                    <span>{{ __('sections.for_researchers.facilities.f1_note') }}</span>
                  </div>
                </div>
              </div>

              <div class="rgs-card-alt group flex flex-col sm:flex-row gap-space-md sm:gap-space-lg items-start pt-5 pb-5">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-none bg-surface-container-high text-primary flex items-center justify-center font-headline-sm text-headline-sm shrink-0 font-serif border border-outline-variant/30">
                  02
                </div>
                <div class="flex flex-col gap-space-xs">
                  <div class="flex flex-wrap items-center gap-space-xs sm:gap-space-sm">
                    <h3 class="font-headline-sm text-lg sm:text-headline-sm text-on-surface">{{ __('sections.for_researchers.facilities.f2_title') }}</h3>
                    <span class="bg-surface-container text-secondary text-[12px] px-2 py-0.5 rounded-none font-medium border border-outline-variant/30">{{ __('sections.for_researchers.facilities.tag_bureaucracy') }}</span>
                  </div>
                  <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant">
                    {{ __('sections.for_researchers.facilities.f2_desc') }}
                  </p>
                  <div class="font-body-sm text-xs sm:text-body-sm text-secondary pt-space-xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">assignment_turned_in</span>
                    <span>{{ __('sections.for_researchers.facilities.f2_note') }}</span>
                  </div>
                </div>
              </div>

              <div class="rgs-card-alt group flex flex-col sm:flex-row gap-space-md sm:gap-space-lg items-start pt-5 pb-5">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-none bg-surface-container-high text-primary flex items-center justify-center font-headline-sm text-headline-sm shrink-0 font-serif border border-outline-variant/30">
                  03
                </div>
                <div class="flex flex-col gap-space-xs">
                  <div class="flex flex-wrap items-center gap-space-xs sm:gap-space-sm">
                    <h3 class="font-headline-sm text-lg sm:text-headline-sm text-on-surface">{{ __('sections.for_researchers.facilities.f3_title') }}</h3>
                    <span class="bg-surface-container text-secondary text-[12px] px-2 py-0.5 rounded-none font-medium border border-outline-variant/30">{{ __('sections.for_researchers.facilities.tag_ethics') }}</span>
                  </div>
                  <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant">
                    {{ __('sections.for_researchers.facilities.f3_desc') }}
                  </p>
                  <div class="font-body-sm text-xs sm:text-body-sm text-secondary pt-space-xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">handshake</span>
                    <span>{{ __('sections.for_researchers.facilities.f3_note') }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Alur Riset 4 Tahap: Unboxed Stepper with Bottom Demarcation -->
      <section class="w-full py-space-3xl bg-surface border-b border-outline-variant/30" id="alur-riset">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col items-center text-center max-w-2xl mx-auto mb-space-2xl gap-space-xs">
            <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.flow.tag') }}</span>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">
              {{ __('sections.for_researchers.flow.title') }}
            </h2>
            <p class="font-body-default text-body-default text-on-surface-variant">
              {{ __('sections.for_researchers.flow.subtitle') }}
            </p>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-xl rgs-grid-connected-alt">
            <div class="rgs-card-alt group flex flex-col gap-space-sm h-full pt-4 pb-4">
              <div class="flex items-center justify-between">
                <span class="w-12 h-12 rounded-none bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center font-serif">
                  01
                </span>
                <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.flow.s1_time') }}</span>
              </div>
              <h3 class="font-headline-sm text-headline-sm text-on-surface pt-space-xs">
                {{ __('sections.for_researchers.flow.s1_title') }}
              </h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ __('sections.for_researchers.flow.s1_desc') }}
              </p>
              <div class="mt-auto pt-space-xs text-[13px] text-secondary font-medium">
                {{ __('sections.for_researchers.flow.s1_out') }}
              </div>
            </div>

            <div class="rgs-card-alt group flex flex-col gap-space-sm h-full pt-4 pb-4">
              <div class="flex items-center justify-between">
                <span class="w-12 h-12 rounded-none bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center font-serif">
                  02
                </span>
                <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.flow.s2_time') }}</span>
              </div>
              <h3 class="font-headline-sm text-headline-sm text-on-surface pt-space-xs">
                {{ __('sections.for_researchers.flow.s2_title') }}
              </h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ __('sections.for_researchers.flow.s2_desc') }}
              </p>
              <div class="mt-auto pt-space-xs text-[13px] text-secondary font-medium">
                {{ __('sections.for_researchers.flow.s2_out') }}
              </div>
            </div>

            <div class="rgs-card-alt group flex flex-col gap-space-sm h-full pt-4 pb-4">
              <div class="flex items-center justify-between">
                <span class="w-12 h-12 rounded-none bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center font-serif">
                  03
                </span>
                <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.flow.s3_time') }}</span>
              </div>
              <h3 class="font-headline-sm text-headline-sm text-on-surface pt-space-xs">
                {{ __('sections.for_researchers.flow.s3_title') }}
              </h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ __('sections.for_researchers.flow.s3_desc') }}
              </p>
              <div class="mt-auto pt-space-xs text-[13px] text-secondary font-medium">
                {{ __('sections.for_researchers.flow.s3_out') }}
              </div>
            </div>

            <div class="rgs-card-alt group flex flex-col gap-space-sm h-full pt-4 pb-4">
              <div class="flex items-center justify-between">
                <span class="w-12 h-12 rounded-none bg-secondary text-on-secondary font-headline-sm text-headline-sm flex items-center justify-center font-serif">
                  04
                </span>
                <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.flow.s4_time') }}</span>
              </div>
              <h3 class="font-headline-sm text-headline-sm text-on-surface pt-space-xs">
                {{ __('sections.for_researchers.flow.s4_title') }}
              </h3>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ __('sections.for_researchers.flow.s4_desc') }}
              </p>
              <div class="mt-auto pt-space-xs text-[13px] text-secondary font-medium">
                {{ __('sections.for_researchers.flow.s4_out') }}
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Direktori 42 Desa & Cuplikan -->
      <section class="w-full py-space-3xl bg-surface-container-low" id="direktori-desa">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg mb-space-2xl">
            <div class="flex flex-col gap-space-xs max-w-2xl">
              <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.directory.tag') }}</span>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">
                {{ __('sections.for_researchers.directory.title') }}
              </h2>
              <p class="font-body-default text-body-default text-on-surface-variant">
                {{ __('sections.for_researchers.directory.subtitle') }}
              </p>
            </div>
            <div class="flex flex-wrap items-center gap-space-sm">
              <span class="font-body-sm text-body-sm text-on-surface-variant">{{ __('sections.for_researchers.directory.facility_label') }}</span>
              <span class="bg-surface px-space-sm py-space-2xs rounded-none border border-outline-variant/30 text-[13px] text-secondary font-medium shadow-none">{{ __('sections.for_researchers.directory.fac_accom') }}</span>
              <span class="bg-surface px-space-sm py-space-2xs rounded-none border border-outline-variant/30 text-[13px] text-secondary font-medium shadow-none">{{ __('sections.for_researchers.directory.fac_food') }}</span>
              <span class="bg-surface px-space-sm py-space-2xs rounded-none border border-outline-variant/30 text-[13px] text-secondary font-medium shadow-none">{{ __('sections.for_researchers.directory.fac_elder') }}</span>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-space-xl mb-space-2xl">
            <!-- Kartu 1: Sade -->
            <div class="rgs-card group flex flex-col pt-0 pb-4">
              <div class="aspect-[16/10] overflow-hidden rounded-none relative">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Desa Sade Lombok" src="{{ asset('assets/img/hd/peneliti-sade.jpg') }}"/>
                <span class="absolute top-3 left-3 bg-surface/90 backdrop-blur-sm text-on-surface font-body-sm text-[12px] px-2.5 py-1 rounded-none font-medium border border-outline-variant/20">
                  {{ __('sections.for_researchers.directory.c1_cat') }}
                </span>
              </div>
              <div class="pt-space-md flex flex-col gap-space-xs flex-1">
                <div class="flex items-center justify-between text-on-surface-variant font-body-sm text-[13px]">
                  <span>{{ __('sections.for_researchers.directory.c1_loc') }}</span>
                  <span class="text-secondary font-medium">{{ __('sections.for_researchers.directory.c1_elders') }}</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ __('sections.for_researchers.directory.c1_title') }}</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  {{ __('sections.for_researchers.directory.c1_desc') }}
                </p>
                <div class="mt-auto pt-space-md text-[13px] text-secondary font-medium">
                  {{ __('sections.for_researchers.directory.c1_accom') }}
                </div>
              </div>
            </div>

            <!-- Kartu 2: Ciptagelar -->
            <div class="rgs-card group flex flex-col pt-0 pb-4">
              <div class="aspect-[16/10] overflow-hidden rounded-none relative">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Kasepuhan Ciptagelar" src="{{ asset('assets/img/hd/peneliti-ciptagelar.jpg') }}"/>
                <span class="absolute top-3 left-3 bg-surface/90 backdrop-blur-sm text-on-surface font-body-sm text-[12px] px-2.5 py-1 rounded-none font-medium border border-outline-variant/20">
                  {{ __('sections.for_researchers.directory.c2_cat') }}
                </span>
              </div>
              <div class="pt-space-md flex flex-col gap-space-xs flex-1">
                <div class="flex items-center justify-between text-on-surface-variant font-body-sm text-[13px]">
                  <span>{{ __('sections.for_researchers.directory.c2_loc') }}</span>
                  <span class="text-secondary font-medium">{{ __('sections.for_researchers.directory.c2_elders') }}</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ __('sections.for_researchers.directory.c2_title') }}</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  {{ __('sections.for_researchers.directory.c2_desc') }}
                </p>
                <div class="mt-auto pt-space-md text-[13px] text-secondary font-medium">
                  {{ __('sections.for_researchers.directory.c2_accom') }}
                </div>
              </div>
            </div>

            <!-- Kartu 3: Bleberan -->
            <div class="rgs-card group flex flex-col pt-0 pb-4">
              <div class="aspect-[16/10] overflow-hidden rounded-none relative">
                <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Kawasan Karst Bleberan" src="{{ asset('assets/img/hd/peneliti-bleberan.jpg') }}"/>
                <span class="absolute top-3 left-3 bg-surface/90 backdrop-blur-sm text-on-surface font-body-sm text-[12px] px-2.5 py-1 rounded-none font-medium border border-outline-variant/20">
                  {{ __('sections.for_researchers.directory.c3_cat') }}
                </span>
              </div>
              <div class="pt-space-md flex flex-col gap-space-xs flex-1">
                <div class="flex items-center justify-between text-on-surface-variant font-body-sm text-[13px]">
                  <span>{{ __('sections.for_researchers.directory.c3_loc') }}</span>
                  <span class="text-secondary font-medium">{{ __('sections.for_researchers.directory.c3_elders') }}</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ __('sections.for_researchers.directory.c3_title') }}</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  {{ __('sections.for_researchers.directory.c3_desc') }}
                </p>
                <div class="mt-auto pt-space-md text-[13px] text-secondary font-medium">
                  {{ __('sections.for_researchers.directory.c3_accom') }}
                </div>
              </div>
            </div>
          </div>

          <!-- Action Panel Form Kontak Peneliti (Plinth Architectural Style) -->
          <div class="bg-surface p-space-xl lg:p-space-2xl rounded-none shadow-none border-l-4 border-l-primary border-t border-r border-b border-outline-variant/30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-center">
              <div class="lg:col-span-6 flex flex-col gap-space-sm">
                <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_researchers.form.tag') }}</span>
                <h3 class="font-headline-lg text-headline-lg text-on-surface text-2xl md:text-3xl">
                  {{ __('sections.for_researchers.form.title') }}
                </h3>
                <p class="font-body-default text-body-default text-on-surface-variant">
                  {{ __('sections.for_researchers.form.desc') }}
                </p>
                <div class="flex flex-col gap-space-xs pt-space-xs font-body-sm text-body-sm text-on-surface-variant">
                  <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-secondary text-[18px]">done</span>
                    <span>{{ __('sections.for_researchers.form.b1') }}</span>
                  </div>
                  <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-secondary text-[18px]">done</span>
                    <span>{{ __('sections.for_researchers.form.b2') }}</span>
                  </div>
                </div>
              </div>
              <div class="lg:col-span-6 bg-surface-container-low p-space-lg sm:p-space-xl rounded-none border border-outline-variant/30">
                <form class="flex flex-col gap-space-md" onsubmit="event.preventDefault(); showToast('{{ e(__('sections.for_researchers.form.success_toast')) }}', 'success'); this.reset();">
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface mb-1" for="nama-peneliti">{{ __('sections.for_researchers.form.name_label') }}</label>
                    <input class="w-full bg-surface text-on-surface px-space-md py-space-sm rounded-none border border-outline-variant/40 font-body-sm text-body-sm outline-none focus:border-primary shadow-none" id="nama-peneliti" placeholder="{{ __('sections.for_researchers.form.name_placeholder') }}" required="" type="text"/>
                  </div>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                    <div>
                      <label class="block font-body-sm text-body-sm text-on-surface mb-1" for="institusi-kampus">{{ __('sections.for_researchers.form.inst_label') }}</label>
                      <input class="w-full bg-surface text-on-surface px-space-md py-space-sm rounded-none border border-outline-variant/40 font-body-sm text-body-sm outline-none focus:border-primary shadow-none" id="institusi-kampus" placeholder="{{ __('sections.for_researchers.form.inst_placeholder') }}" required="" type="text"/>
                    </div>
                    <div>
                      <label class="block font-body-sm text-body-sm text-on-surface mb-1" for="jenjang-riset">{{ __('sections.for_researchers.form.level_label') }}</label>
                      <select class="w-full bg-surface text-on-surface px-space-md py-space-sm rounded-none border border-outline-variant/40 font-body-sm text-body-sm outline-none focus:border-primary shadow-none" id="jenjang-riset">
                        <option>{{ __('sections.for_researchers.form.opt_s1') }}</option>
                        <option>{{ __('sections.for_researchers.form.opt_s2') }}</option>
                        <option>{{ __('sections.for_researchers.form.opt_s3') }}</option>
                        <option>{{ __('sections.for_researchers.form.opt_grant') }}</option>
                      </select>
                    </div>
                  </div>
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface mb-1" for="topik-fokus">{{ __('sections.for_researchers.form.topic_label') }}</label>
                    <textarea class="w-full bg-surface text-on-surface px-space-md py-space-sm rounded-none border border-outline-variant/40 font-body-sm text-body-sm outline-none focus:border-primary shadow-none resize-none" id="topik-fokus" placeholder="{{ __('sections.for_researchers.form.topic_placeholder') }}" rows="3"></textarea>
                  </div>
                  <button class="rgs-btn rgs-btn-primary rounded-none w-full text-center py-space-sm cursor-pointer" type="submit">
                    {{ __('sections.for_researchers.form.submit_btn') }}
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>
@endsection
