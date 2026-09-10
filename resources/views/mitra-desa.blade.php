@extends('layouts.app')

@section('title', __('sections.for_villages.hero.title') . ' | Destinara')
@section('meta_description', __('sections.for_villages.hero.subtitle'))
@section('meta_keywords', 'mitra desa wisata, kemitraan desa adat, homestay desa nusantara, pemberdayaan warga desa, wisata edukasi desa, kearifan lokal desa, daftar mitra destinara')
@section('og_image', asset('assets/img/hd/desa-serambi.jpg'))

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
      "name": "{{ __('site.nav.services') }}",
      "item": "{{ url('/') }}#navigation"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ __('site.nav.for_villages') }}",
      "item": "{{ route('for-villages') }}"
    }
  ]
}
</script>
@endpush

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $villageBenefits = $sections['village_benefits'] ?? null;
@endphp
<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
    <div class="flex flex-col w-full">
      
      @if(!$hero || $hero->is_active)
      <!-- Hero Section -->
      <section class="relative w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
          <div class="lg:col-span-7 flex flex-col items-start pr-0 lg:pr-6">
            @if($hero?->badge || __('sections.for_villages.hero.badge'))
            <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-none bg-surface-container text-secondary mb-space-md sm:mb-space-lg border border-outline-variant/40 text-xs sm:text-sm">
              <span class="material-symbols-outlined text-[18px]">nature_people</span>
              <span class="font-body-sm font-medium">{{ $hero?->badge ?? __('sections.for_villages.hero.badge') }}</span>
            </div>
            @endif
            <h1 class="font-headline-lg text-2xl sm:text-3xl md:text-4xl lg:text-headline-lg text-on-surface mb-space-sm sm:mb-space-md leading-tight">
              {{ $hero?->title ?? __('sections.for_villages.hero.title') }}
            </h1>
            <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant mb-space-lg sm:mb-space-xl max-w-2xl">
              {{ $hero?->subtitle ?? __('sections.for_villages.hero.subtitle') }}
            </p>
            <div class="flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center gap-3 sm:gap-space-md w-full sm:w-auto">
              <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center text-center whitespace-nowrap" href="{{ $hero?->button_link ?? '#formulir-kemitraan' }}">
                {{ $hero?->button_text ?? __('sections.for_villages.hero.button_text') }}
              </a>
              <a class="rgs-btn rgs-btn-outline rounded-none inline-flex items-center justify-center gap-space-xs whitespace-nowrap" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_ryan', '6285774410978') }}?text={{ urlencode('Halo Ryan, kami pengelola desa ingin menanyakan kemitraan tapak Destinara.') }}" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-[20px]">chat</span>
                <span>{{ __('sections.for_villages.hero.ask_whatsapp') }}</span>
              </a>
            </div>
            <div class="mt-space-md sm:mt-space-lg flex flex-wrap items-center gap-space-sm sm:gap-space-md text-on-surface-variant font-body-sm text-xs sm:text-sm">
              <div class="flex items-center gap-space-2xs">
                <span class="material-symbols-outlined text-secondary text-[18px] sm:text-[20px]">check_circle</span>
                <span>{{ __('sections.for_villages.hero.perk_free') }}</span>
              </div>
              <div class="flex items-center gap-space-2xs">
                <span class="material-symbols-outlined text-secondary text-[18px] sm:text-[20px]">check_circle</span>
                <span>{{ __('sections.for_villages.hero.perk_custom') }}</span>
              </div>
            </div>
          </div>

          <!-- Photo Plate Right Column -->
          <div class="lg:col-span-5">
            <div class="rounded-none overflow-hidden border border-outline-variant/40 bg-surface-container shadow-none">
              <div class="relative">
                <img class="w-full h-64 sm:h-[300px] lg:h-[340px] object-cover" alt="{{ $hero?->title ?? __('sections.for_villages.hero.title') }}" src="{{ $hero?->image_url ?? asset('assets/img/hd/desa-serambi.jpg') }}"/>
                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/30 to-transparent p-space-md sm:p-space-lg">
                  <p class="font-caption-fieldnote text-xs sm:text-caption-fieldnote text-surface italic">
                    {{ $hero?->image_caption ?? __('sections.for_villages.hero.image_caption') }}
                  </p>
                </div>
              </div>

              <!-- Nilai Manfaat Warga (Terintegrasi rapi di bawah foto, bebas tabrakan) -->
              <div class="p-space-md sm:p-space-lg bg-surface-container-lowest border-t border-outline-variant/40 flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-none bg-secondary-container text-secondary flex items-center justify-center flex-shrink-0">
                  <span class="material-symbols-outlined text-[26px]">volunteer_activism</span>
                </div>
                <div>
                  <p class="font-headline-sm text-lg sm:text-headline-sm text-on-surface font-semibold leading-tight">{{ __('sections.for_villages.hero.benefit_title') }}</p>
                  <p class="font-body-sm text-xs sm:text-body-sm text-on-surface-variant leading-relaxed">{{ __('sections.for_villages.hero.benefit_desc') }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      <!-- Elder Quote Section (Plinth Architectural Style) -->
      <section class="w-full py-space-2xl bg-surface-container-low my-space-xl border-t border-b border-outline-variant/30">
        <div class="max-w-[1040px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col md:flex-row items-center gap-space-xl bg-surface-container-lowest p-space-xl rounded-none border-l-4 border-l-[#8C5151] border-t border-r border-b border-outline-variant/30 shadow-none">
            <div class="w-32 h-32 md:w-40 md:h-40 rounded-none overflow-hidden flex-shrink-0 border border-outline-variant/30 shadow-none">
              <img class="w-full h-full object-cover" alt="Pak Lurah Marto Suwito" src="{{ asset('assets/img/hd/desa-lurah.jpg') }}"/>
            </div>
            <div class="flex-1 flex flex-col">
              <div class="text-tertiary-container mb-space-2xs">
                <span class="material-symbols-outlined text-[36px]">format_quote</span>
              </div>
              <blockquote class="font-headline-md text-headline-md text-on-surface italic font-normal leading-relaxed mb-space-md text-lg md:text-xl font-serif">
                {{ __('sections.for_villages.elder_quote.quote') }}
              </blockquote>
              <div>
                <p class="font-body-default text-body-default font-semibold text-on-surface">{{ __('sections.for_villages.elder_quote.author') }}</p>
                <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.for_villages.elder_quote.role') }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Benefits Section: 3 Unboxed Cards with Bottom Demarcation Lines -->
      <section class="w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-space-2xl">
          <span class="text-secondary font-label-tag text-label-tag font-semibold">{{ __('sections.for_villages.benefits.tag') }}</span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-2xs">
            {{ __('sections.for_villages.benefits.title') }}
          </h2>
          <p class="font-body-default text-body-default text-on-surface-variant mt-space-xs">
            {{ __('sections.for_villages.benefits.subtitle') }}
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-space-xl">
          <div class="rgs-card-alt group flex flex-col h-full pt-5 pb-5">
            <div class="w-14 h-14 rounded-none bg-surface-container text-primary flex items-center justify-center mb-space-lg border border-outline-variant/30">
              <span class="material-symbols-outlined text-[32px]">handshake</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              {{ __('sections.for_villages.benefits.c1_title') }}
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              {{ __('sections.for_villages.benefits.c1_desc') }}
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-none border-l-2 border-l-secondary">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                {{ __('sections.for_villages.benefits.c1_note') }}
              </p>
            </div>
          </div>

          <div class="rgs-card-alt group flex flex-col h-full pt-5 pb-5">
            <div class="w-14 h-14 rounded-none bg-secondary-container text-secondary flex items-center justify-center mb-space-lg border border-outline-variant/30">
              <span class="material-symbols-outlined text-[32px]">payments</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              {{ __('sections.for_villages.benefits.c2_title') }}
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              {{ __('sections.for_villages.benefits.c2_desc') }}
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-none border-l-2 border-l-secondary">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                {{ __('sections.for_villages.benefits.c2_note') }}
              </p>
            </div>
          </div>

          <div class="rgs-card-alt group flex flex-col h-full pt-5 pb-5">
            <div class="w-14 h-14 rounded-none bg-tertiary-fixed text-tertiary flex items-center justify-center mb-space-lg border border-outline-variant/30">
              <span class="material-symbols-outlined text-[32px]">assignment_turned_in</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              {{ __('sections.for_villages.benefits.c3_title') }}
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              {{ __('sections.for_villages.benefits.c3_desc') }}
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-none border-l-2 border-l-secondary">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                {{ __('sections.for_villages.benefits.c3_note') }}
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Photo Banner Break -->
      <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop my-space-lg">
        <div class="relative rounded-none overflow-hidden border border-outline-variant/30 h-80 bg-surface-container shadow-none">
          <img class="w-full h-full object-cover" alt="{{ __('sections.for_villages.banner.title') }}" src="{{ asset('assets/img/hd/desa-bukit.jpg') }}"/>
          <div class="absolute inset-0 bg-gradient-to-r from-inverse-surface/85 via-inverse-surface/50 to-transparent flex items-center p-space-xl md:p-space-2xl">
            <div class="max-w-xl">
              <p class="text-secondary-fixed font-label-tag text-label-tag mb-space-xs">{{ __('sections.for_villages.banner.tag') }}</p>
              <h3 class="font-headline-lg text-headline-lg text-surface mb-space-sm text-2xl md:text-3xl">
                {{ __('sections.for_villages.banner.title') }}
              </h3>
              <p class="font-body-default text-body-default text-surface-container">
                {{ __('sections.for_villages.banner.desc') }}
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- How It Works Section: 4-step Stepper with Bottom Demarcation -->
      <section class="w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto border-b border-outline-variant/30">
        <div class="text-center max-w-2xl mx-auto mb-space-2xl">
          <span class="text-secondary font-label-tag text-label-tag font-semibold">{{ __('sections.for_villages.steps.tag') }}</span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-2xs">
            {{ __('sections.for_villages.steps.title') }}
          </h2>
          <p class="font-body-default text-body-default text-on-surface-variant mt-space-xs">
            {{ __('sections.for_villages.steps.subtitle') }}
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-xl relative">
          <!-- Step 1 -->
          <div class="rgs-card-alt group flex flex-col pt-4 pb-4">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-none bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold border border-outline-variant/30 font-serif">1</span>
              <span class="material-symbols-outlined text-outline text-[22px]">forum</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">
              {{ __('sections.for_villages.steps.s1_title') }}
            </h4>
            <p class="font-body-default text-body-default text-on-surface-variant">
              {{ __('sections.for_villages.steps.s1_desc') }}
            </p>
          </div>
          <!-- Step 2 -->
          <div class="rgs-card-alt group flex flex-col pt-4 pb-4">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-none bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold border border-outline-variant/30 font-serif">2</span>
              <span class="material-symbols-outlined text-outline text-[22px]">cottage</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">
              {{ __('sections.for_villages.steps.s2_title') }}
            </h4>
            <p class="font-body-default text-body-default text-on-surface-variant">
              {{ __('sections.for_villages.steps.s2_desc') }}
            </p>
          </div>
          <!-- Step 3 -->
          <div class="rgs-card-alt group flex flex-col pt-4 pb-4">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-none bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold border border-outline-variant/30 font-serif">3</span>
              <span class="material-symbols-outlined text-outline text-[22px]">policy</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">
              {{ __('sections.for_villages.steps.s3_title') }}
            </h4>
            <p class="font-body-default text-body-default text-on-surface-variant">
              {{ __('sections.for_villages.steps.s3_desc') }}
            </p>
          </div>
          <!-- Step 4 -->
          <div class="rgs-card-alt group flex flex-col pt-4 pb-4">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-none bg-secondary-container flex items-center justify-center font-headline-sm text-headline-sm text-secondary font-bold border border-outline-variant/30 font-serif">4</span>
              <span class="material-symbols-outlined text-secondary text-[22px]">groups</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">
              {{ __('sections.for_villages.steps.s4_title') }}
            </h4>
            <p class="font-body-default text-body-default text-on-surface-variant">
              {{ __('sections.for_villages.steps.s4_desc') }}
            </p>
          </div>
        </div>
      </section>

      <!-- Registration Form & FAQ Section (Architectural Plinth Style) -->
      <section class="w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto" id="formulir-kemitraan">
        <div class="bg-surface-container-low rounded-none p-space-xl lg:p-space-2xl border-t border-b border-outline-variant/30 shadow-none">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl">
            <!-- Left: Form -->
            <div class="lg:col-span-7 bg-surface p-space-xl rounded-none border-l-4 border-l-primary border-t border-r border-b border-outline-variant/30 shadow-none">
              <div class="mb-space-lg">
                <span class="text-secondary font-label-tag text-label-tag font-semibold">{{ __('sections.for_villages.form.tag') }}</span>
                <h3 class="font-headline-md text-headline-md text-on-surface mt-space-2xs">
                  {{ __('sections.for_villages.form.title') }}
                </h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-2xs">
                  {{ __('sections.for_villages.form.subtitle') }}
                </p>
              </div>
              <form class="flex flex-col gap-space-md" id="mitraForm" onsubmit="event.preventDefault(); showToast('{{ addslashes(__('sections.for_villages.form.toast_success')) }}', 'success'); this.reset();">
                <div>
                  <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="namaLengkap">
                    {{ __('sections.for_villages.form.name_label') }}
                  </label>
                  <input class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40" id="namaLengkap" placeholder="{{ __('sections.for_villages.form.name_placeholder') }}" required="" type="text"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="nomorHp">
                      {{ __('sections.for_villages.form.phone_label') }}
                    </label>
                    <input class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40" id="nomorHp" placeholder="{{ __('sections.for_villages.form.phone_placeholder') }}" required="" type="tel"/>
                  </div>
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="peranWarga">
                      {{ __('sections.for_villages.form.role_label') }}
                    </label>
                    <select class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40" id="peranWarga">
                      <option value="pengurus-pokdarwis">{{ __('sections.for_villages.form.role_pokdarwis') }}</option>
                      <option value="aparatur-desa">{{ __('sections.for_villages.form.role_aparatur') }}</option>
                      <option value="tetua-adat">{{ __('sections.for_villages.form.role_tetua') }}</option>
                      <option value="warga-perseorangan">{{ __('sections.for_villages.form.role_warga') }}</option>
                    </select>
                  </div>
                </div>
                <div>
                  <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="lokasiDesa">
                    {{ __('sections.for_villages.form.location_label') }}
                  </label>
                  <input class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40" id="lokasiDesa" placeholder="{{ __('sections.for_villages.form.location_placeholder') }}" required="" type="text"/>
                </div>
                <div>
                  <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="kegiatanKhas">
                    {{ __('sections.for_villages.form.activities_label') }}
                  </label>
                  <textarea class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40 resize-none" id="kegiatanKhas" placeholder="{{ __('sections.for_villages.form.activities_placeholder') }}" rows="3"></textarea>
                </div>
                <button class="rgs-btn rgs-btn-primary rounded-none w-full text-center py-space-sm cursor-pointer mt-space-xs" type="submit">
                  {{ __('sections.for_villages.form.submit_btn') }}
                </button>
              </form>
            </div>

            <!-- Right: FAQ -->
            <div class="lg:col-span-5 flex flex-col justify-between gap-space-lg">
              <div>
                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-md font-semibold">
                  {{ __('sections.for_villages.faq.title') }}
                </h4>
                <div class="flex flex-col gap-space-md">
                  <div class="bg-surface p-space-md rounded-none border-b-2 border-[#8C5151]/25 hover:border-[#8C5151] transition-colors">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      {{ __('sections.for_villages.faq.q1') }}
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      {{ __('sections.for_villages.faq.a1') }}
                    </p>
                  </div>
                  <div class="bg-surface p-space-md rounded-none border-b-2 border-[#8C5151]/25 hover:border-[#8C5151] transition-colors">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      {{ __('sections.for_villages.faq.q2') }}
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      {{ __('sections.for_villages.faq.a2') }}
                    </p>
                  </div>
                  <div class="bg-surface p-space-md rounded-none border-b-2 border-[#8C5151]/25 hover:border-[#8C5151] transition-colors">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      {{ __('sections.for_villages.faq.q3') }}
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      {{ __('sections.for_villages.faq.a3') }}
                    </p>
                  </div>
                </div>
              </div>

              <div class="p-space-md bg-surface rounded-none border border-outline-variant/30">
                <div class="flex items-center gap-space-sm">
                  <span class="material-symbols-outlined text-secondary text-[24px]">support_agent</span>
                  <div>
                    <p class="font-body-sm text-body-sm font-semibold text-on-surface">{{ __('sections.for_villages.faq.talk_direct_title') }}</p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      {!! __('sections.for_villages.faq.talk_direct_desc', ['name' => '<a href="https://wa.me/' . \App\Models\SiteSetting::get('contact_whatsapp_ryan', '6285774410978') . '?text=' . urlencode('Halo Ryan, kami pengelola desa ingin menanyakan kemitraan tapak Destinara.') . '" target="_blank" rel="noopener" class="text-primary font-semibold hover:underline">Mas Ryan</a>', 'phone' => '+62 857-7441-0978']) !!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Big Full-width Plinth CTA Section -->
      <section class="w-full bg-surface-container py-space-4xl px-gutter-mobile md:px-gutter-desktop mt-space-2xl border-t border-outline-variant/30">
        <div class="max-w-[840px] mx-auto text-center flex flex-col items-center">
          <div class="w-16 h-16 rounded-none bg-surface flex items-center justify-center text-primary mb-space-md border border-outline-variant/30 shadow-none">
            <span class="material-symbols-outlined text-[32px]">door_front</span>
          </div>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mb-space-md text-2xl md:text-3xl lg:text-headline-lg">
            {{ __('sections.for_villages.cta.title') }}
          </h2>
          <p class="font-body-lead text-body-lead text-on-surface-variant mb-space-2xl max-w-2xl">
            {{ __('sections.for_villages.cta.desc') }}
          </p>
          <div class="flex flex-col sm:flex-row items-center justify-center gap-space-md w-full sm:w-auto">
            <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center text-center w-full sm:w-auto" href="#formulir-kemitraan">
              {{ __('sections.for_villages.cta.btn_register') }}
            </a>
            <a class="rgs-btn rgs-btn-outline rounded-none inline-flex items-center justify-center gap-space-xs w-full sm:w-auto" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_ryan', '6285774410978') }}?text={{ urlencode('Halo Ryan, kami pengelola desa ingin mendaftarkan destinasi kami.') }}" rel="noopener noreferrer" target="_blank">
              <span class="material-symbols-outlined text-[20px]">chat</span>
              <span>{{ __('sections.for_villages.cta.btn_whatsapp') }}</span>
            </a>
          </div>
          <p class="font-caption-fieldnote text-caption-fieldnote text-on-surface-variant italic mt-space-lg">
            {{ __('sections.for_villages.cta.note') }}
          </p>
        </div>
      </section>

    </div>
  </main>
@endsection
