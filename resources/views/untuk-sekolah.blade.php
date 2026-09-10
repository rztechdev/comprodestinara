@extends('layouts.app')

@section('title', __('sections.for_schools.hero.title') . ' — Destinara')
@section('meta_description', __('sections.for_schools.hero.subtitle'))
@section('meta_keywords', 'study tour resmi berizin, field trip sekolah, live in desa adat, edukasi budaya nusantara, wisata edukasi sekolah, kurikulum lapangan, destinara sekolah')
@section('og_image', asset('assets/img/hd/hero-fieldwork.jpg'))

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
      "name": "{{ __('site.nav.for_schools_full') }}",
      "item": "{{ route('for-schools') }}"
    }
  ]
}
</script>
@endpush

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $benefits = $sections['benefits'] ?? null;
  $flow = $sections['flow'] ?? null;
  $cta = $sections['cta_schools'] ?? null;
@endphp

<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
    <div class="flex flex-col w-full">
      
      @if(!$hero || $hero->is_active)
      <!-- Hero Section -->
      <section class="relative w-full bg-surface py-12 sm:py-16 lg:py-20 border-b border-[#8C5151]/15 overflow-hidden">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-12 gap-8 lg:gap-14 items-center">
            <!-- Hero Text Content -->
            <div class="col-span-12 lg:col-span-6 flex flex-col items-start gap-4 z-10">
              @if($hero?->badge)
              <span class="rgs-category-tag bg-[#8C5151]">
                {{ $hero->badge }}
              </span>
              @endif
              <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl text-on-surface tracking-tight leading-tight">
                {{ $hero?->title ?? __('sections.for_schools.hero.title') }}
              </h1>
              <p class="font-body-lead text-base sm:text-lg text-on-surface-variant max-w-xl leading-relaxed">
                {{ $hero?->subtitle ?? __('sections.for_schools.hero.subtitle') }}
              </p>
              <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2 w-full sm:w-auto">
                <a class="rgs-btn rgs-btn-primary text-center" href="{{ $hero?->button_link ?? '#konsultasi' }}">
                  <span>{{ $hero?->button_text ?? __('sections.for_schools.hero.button_text') }}</span>
                </a>
                <div class="flex items-center gap-2 text-secondary font-body-sm text-sm font-semibold">
                  <span class="material-symbols-outlined text-secondary text-[20px]">verified_user</span>
                  <span>{{ __('site.common.verified_docs') }}</span>
                </div>
              </div>
              <!-- Institutional Trust Strip -->
              <div class="pt-4 flex flex-wrap items-center gap-4 text-xs font-semibold uppercase tracking-wider text-secondary font-sans border-t border-[#2B211E]/10 w-full">
                <div class="flex items-center gap-1.5">
                  <span class="material-symbols-outlined text-primary text-[18px]">gavel</span>
                  <span>{{ __('site.common.legal_mou') }}</span>
                </div>
                <div class="flex items-center gap-1.5">
                  <span class="material-symbols-outlined text-primary text-[18px]">health_and_safety</span>
                  <span>{{ __('sections.for_schools.values.v2_title') }}</span>
                </div>
                <div class="flex items-center gap-1.5">
                  <span class="material-symbols-outlined text-primary text-[18px]">receipt_long</span>
                  <span>{{ __('sections.for_schools.cta_schools.inspection_draft') }}</span>
                </div>
              </div>
            </div>

            <!-- Hero Photographic Frame Plate -->
            <div class="col-span-12 lg:col-span-6 relative">
              <div class="relative w-full aspect-[4/3] rounded-none overflow-hidden border border-[#8C5151]/20 bg-surface-container-high">
                <img class="w-full h-full object-cover" alt="{{ $hero?->title ?? 'Siswa SMP berdiskusi botani di sanggar desa tradisional' }}" src="{{ $hero?->image_url ?? asset('assets/img/hd/sekolah-diskusi.jpg') }}"/>
                <div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/40 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute bottom-3 left-3 right-3 p-3 bg-surface/95 border-l-4 border-l-[#8C5151] shadow-xs flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                  <div>
                    <p class="font-headline-sm text-sm text-on-surface leading-tight font-bold">Sanggar Lapangan Pentingsari</p>
                    <p class="font-caption-fieldnote text-xs italic text-secondary">{{ $hero?->image_caption ?? 'Observasi etnobotani terpadu — Kelas VIII' }}</p>
                  </div>
                  <span class="rgs-category-tag bg-[#51634b] !py-1 !px-2.5 !text-xs">
                    SOP Level A
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      @if(!$benefits || $benefits->is_active)
      <!-- Section Manfaat: 4 Pilar Kepastian (RGS Line-Delimited Items) -->
      <section class="w-full bg-surface-container-low py-16 sm:py-20 border-b border-[#8C5151]/15" id="silabus">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="max-w-2xl mb-12">
            <span class="text-xs font-bold uppercase tracking-widest text-secondary block mb-2">
              {{ $benefits?->badge ?? 'STANDAR PENYELENGGARAAN RESMI' }}
            </span>
            <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface">
              {{ $benefits?->title ?? 'Mengapa sekolah mempercayakan pembelajaran lapangan pada Destinara' }}
            </h2>
            <p class="font-body-default text-base text-on-surface-variant mt-2 leading-relaxed">
              {{ $benefits?->subtitle ?? 'Dirancang untuk melenyapkan keraguan komite, memastikan keselamatan fisik setiap peserta didik, dan menuntaskan sasaran capaian kurikulum.' }}
            </p>
          </div>
          
          @php
            $benefitItems = $benefits?->items ?? [
                ['icon' => 'verified_user', 'title' => __('sections.for_schools.values.v1_title'), 'desc' => __('sections.for_schools.values.v1_desc')],
                ['icon' => 'menu_book', 'title' => __('sections.for_schools.values.v3_title'), 'desc' => __('sections.for_schools.values.v3_desc')],
                ['icon' => 'health_and_safety', 'title' => __('sections.for_schools.values.v2_title'), 'desc' => __('sections.for_schools.values.v2_desc')],
                ['icon' => 'receipt_long', 'title' => __('sections.for_schools.values.v4_title'), 'desc' => __('sections.for_schools.values.v4_desc')]
            ];
          @endphp

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 rgs-grid-connected-alt">
            @foreach($benefitItems as $bItem)
              <div class="rgs-card-alt flex flex-col gap-3">
                <div class="w-10 h-10 bg-surface flex items-center justify-center text-primary border border-[#2B211E]/10">
                  <span class="material-symbols-outlined text-[24px]">{{ $bItem['icon'] ?? 'verified' }}</span>
                </div>
                <h3 class="font-headline-sm text-lg text-on-surface font-bold">
                  {{ $bItem['title'] ?? '' }}
                </h3>
                <p class="font-body-sm text-[15px] text-on-surface-variant leading-relaxed">
                  {{ $bItem['desc'] ?? '' }}
                </p>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif

      @if(!$flow || $flow->is_active)
      <!-- Section "Bagaimana Prosesnya" (Stepper Horizontal) -->
      <section class="w-full bg-surface py-16 sm:py-20 border-b border-[#8C5151]/15">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="max-w-2xl mb-12">
            <span class="text-xs font-bold uppercase tracking-widest text-secondary block mb-2">
              {{ $flow?->badge ?? __('sections.for_schools.flow.tag') }}
            </span>
            <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface">
              {{ $flow?->title ?? __('sections.for_schools.flow.title') }}
            </h2>
            <p class="font-body-default text-base text-on-surface-variant mt-2 leading-relaxed">
              {{ $flow?->subtitle ?? __('sections.for_schools.flow.subtitle') }}
            </p>
          </div>

          @php
            $flowItems = $flow?->items ?? [
                ['step' => '01', 'title' => __('sections.for_schools.flow.s1_title'), 'desc' => __('sections.for_schools.flow.s1_desc')],
                ['step' => '02', 'title' => __('sections.for_schools.flow.s2_title'), 'desc' => __('sections.for_schools.flow.s2_desc')],
                ['step' => '03', 'title' => __('sections.for_schools.flow.s3_title'), 'desc' => __('sections.for_schools.flow.s3_desc')],
                ['step' => '04', 'title' => __('sections.for_schools.flow.s4_title'), 'desc' => __('sections.for_schools.flow.s4_desc')]
            ];
          @endphp

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 rgs-grid-connected-alt">
            @foreach($flowItems as $idx => $fItem)
              <div class="rgs-card-alt flex flex-col gap-3">
                <span class="font-serif text-3xl text-primary font-normal">
                  {{ $fItem['step'] ?? sprintf('%02d', $idx + 1) }}
                </span>
                <h4 class="font-headline-sm text-lg text-on-surface font-bold">
                  {{ $fItem['title'] ?? '' }}
                </h4>
                <p class="font-body-sm text-[15px] text-on-surface-variant leading-relaxed">
                  {{ $fItem['desc'] ?? '' }}
                </p>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif

      <!-- CTA Penutup Full-width -->
      @if(!$cta || $cta->is_active)
      <section class="w-full bg-surface-container-low py-16 sm:py-20" id="konsultasi">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-12 gap-10 lg:gap-14 items-center">
            <div class="col-span-12 lg:col-span-7 flex flex-col gap-4">
              <span class="text-xs font-bold uppercase tracking-widest text-primary">
                {{ $cta?->badge ?? __('sections.for_schools.cta_schools.badge') }}
              </span>
              <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-[34px] text-on-surface leading-snug">
                {{ $cta?->title ?? __('sections.for_schools.cta_schools.title') }}
              </h2>
              <p class="font-body-lead text-base text-on-surface-variant max-w-2xl leading-relaxed">
                {{ $cta?->subtitle ?? __('sections.for_schools.cta_schools.subtitle') }}
              </p>
            </div>
            <div class="col-span-12 lg:col-span-5 flex flex-col">
              <div class="bg-surface rounded-none border-l-4 border-l-[#8C5151] border-y border-r border-[#2B211E]/15 p-6 sm:p-8 flex flex-col gap-4 shadow-xs">
                <div>
                  <p class="font-headline-sm text-xl text-on-surface font-bold">{{ __('sections.for_schools.cta_schools.schedule_title') }}</p>
                  <p class="font-body-sm text-sm text-on-surface-variant">{{ __('sections.for_schools.cta_schools.schedule_subtitle') }}</p>
                </div>
                <form class="flex flex-col gap-3" action="{{ route('contact.send') }}" method="POST">
                  @csrf
                  <input type="hidden" name="topic" value="{{ __('sections.for_schools.hero.title') }}">
                  <div class="flex flex-col gap-1">
                    <label class="font-body-sm text-xs font-semibold text-on-surface" for="full_name">{{ __('site.form.full_name') }} <span class="text-primary">*</span></label>
                    <input class="w-full px-3 py-2 rounded-none bg-surface-container-lowest text-on-surface text-sm border border-[#2B211E]/20 focus:border-primary outline-none" id="full_name" name="full_name" placeholder="{{ __('site.form.full_name_placeholder') }}" required type="text"/>
                  </div>
                  <input type="hidden" name="institution" value="{{ __('site.form.institution') }}">
                  <div class="flex flex-col gap-1">
                    <label class="font-body-sm text-xs font-semibold text-on-surface" for="whatsapp">{{ __('site.form.whatsapp') }} <span class="text-primary">*</span></label>
                    <input class="w-full px-3 py-2 rounded-none bg-surface-container-lowest text-on-surface text-sm border border-[#2B211E]/20 focus:border-primary outline-none" id="whatsapp" name="whatsapp" placeholder="{{ __('site.form.whatsapp_placeholder') }}" required type="tel"/>
                  </div>
                  <button class="mt-2 w-full rgs-btn rgs-btn-primary" type="submit">
                    <span>{{ $cta?->button_text ?? __('sections.for_schools.cta_schools.submit_btn') }}</span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

    </div>
  </main>
@endsection
