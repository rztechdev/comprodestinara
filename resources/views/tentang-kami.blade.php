@extends('layouts.app')

@section('title', __('site.nav.about') . ' — ' . __('sections.about.hero.badge') . ' | Destinara')
@section('meta_description', __('sections.about.hero.title'))
@section('meta_keywords', 'tentang destinara, profil destinara, pt destinara chakrawal artha, inisiatif pendidikan tapak, pendiri destinara, pelestarian budaya nusantara')
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
      "name": "{{ __('site.nav.about') }}",
      "item": "{{ route('about') }}"
    }
  ]
}
</script>
@endpush

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $manifesto = $sections['manifesto'] ?? null;
  $founder = $sections['founder_story'] ?? null;
  $values = $sections['values'] ?? null;
  $gov = $sections['governance'] ?? null;
@endphp

<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
    <div class="flex flex-col w-full">
      
      @if(!$hero || $hero->is_active)
      <!-- 1. Hero: Foto Dokumenter Tapak Desa dengan Format Editorial RGS -->
      <section class="relative w-full bg-[#231917] overflow-hidden">
        <div class="relative w-full h-[460px] sm:h-[560px] md:h-[620px] lg:h-[680px] xl:h-[740px] overflow-hidden">
          <img src="{{ $hero?->image_url ?? asset('assets/img/hd/hero-about.jpg') }}" 
               alt="{{ $hero?->title ?? 'Tentang Kami Destinara' }}" 
               class="w-full h-full object-cover object-[center_32%] brightness-95"/>
          <div class="absolute inset-0 bg-gradient-to-t from-[#231917]/90 via-[#231917]/30 via-40% to-transparent pointer-events-none"></div>
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
          
          <div class="absolute bottom-0 inset-x-0 z-20">
            <div class="max-w-[1440px] mx-auto px-gutter-mobile md:px-gutter-desktop pb-24 sm:pb-28 lg:pb-32 xl:pb-36">
              <div class="max-w-3xl flex flex-col items-start gap-3 pl-8 sm:pl-10 md:pl-12 lg:pl-14">
                @if($hero?->badge)
                <span class="rgs-category-tag bg-[#8C5151]">
                  {{ $hero->badge }}
                </span>
                @endif
                <h1 class="font-display-hero text-2xl sm:text-3xl lg:text-4xl xl:text-[44px] text-white tracking-tight leading-snug drop-shadow-md">
                  {{ $hero?->title ?? 'Merajut Dialog Setara antara Ruang Kuliah dan Kearifan Warga Tapak Nusantara' }}
                </h1>
                <div class="flex flex-wrap items-center gap-4 text-white/90 font-body-sm text-xs sm:text-sm pt-1">
                  <span class="flex items-center gap-1.5 text-secondary-fixed">
                    <span class="material-symbols-outlined text-[18px]">verified</span>
                    {{ $hero?->subtitle ?? 'Didokumentasikan sejak 2018' }}
                  </span>
                  <span class="font-caption-fieldnote italic text-white/75">
                    {{ $hero?->image_caption ?? 'Arsip Inisiatif Destinara — Yogyakarta, Magelang, & Enrekang' }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      @if(!$manifesto || $manifesto->is_active)
      <!-- 2. Section Visi-Misi & Manifesto -->
      <section class="w-full bg-surface py-16 sm:py-20 lg:py-24 relative border-b border-[#8C5151]/15" id="manifesto">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col items-center">
          <div class="w-12 h-12 bg-surface-container flex items-center justify-center text-primary mb-6">
            <span class="material-symbols-outlined text-[26px]">menu_book</span>
          </div>
          <div class="max-w-[760px] mx-auto text-center flex flex-col items-center">
            <blockquote class="font-headline-lg text-2xl sm:text-3xl lg:text-[34px] text-on-surface leading-snug tracking-tight" id="filosofi">
              {{ $manifesto?->title ?? '“Pendidikan tidak semestinya datang ke desa sebagai penilai luar, melainkan sebagai tamu yang beradab dan pembelajar yang rendah hati.”' }}
            </blockquote>
            <div class="w-16 h-[2px] bg-primary/40 my-6"></div>
            <p class="font-caption-fieldnote text-caption-fieldnote italic text-secondary max-w-[580px] text-base">
              {{ $manifesto?->subtitle ?? 'Sebuah pegangan moral yang kami tuangkan dalam setiap penyusunan protokol etika tapak, modul pembekalan siswa, dan interaksi dengan sesepuh adat.' }}
            </p>
          </div>
          
          <!-- Micro Metrics — RGS Line-Delimited Items -->
          @php
            $manifestoItems = $manifesto?->items ?? [
                ['stat' => __('sections.about.manifesto.stat1'), 'desc' => __('sections.about.manifesto.desc1')],
                ['stat' => __('sections.about.manifesto.stat2'), 'desc' => __('sections.about.manifesto.desc2')],
                ['stat' => __('sections.about.manifesto.stat3'), 'desc' => __('sections.about.manifesto.desc3')]
            ];
          @endphp
          <div class="mt-14 w-full max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-8 rgs-grid-connected-alt">
            @foreach($manifestoItems as $idx => $mItem)
              <div class="rgs-card-alt flex flex-col justify-between">
                <span class="font-headline-md text-2xl lg:text-3xl {{ $idx == 0 ? 'text-primary' : ($idx == 1 ? 'text-secondary' : 'text-tertiary') }} font-serif font-normal">{{ $mItem['stat'] ?? $mItem['title'] ?? '' }}</span>
                <p class="font-body-sm text-[15px] text-on-surface-variant mt-2 leading-relaxed">{{ $mItem['desc'] ?? '' }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif

      @if(!$founder || $founder->is_active)
      <!-- 3. Cerita Pendirian & Rekam Jejak -->
      <section class="w-full bg-surface-container-low py-16 sm:py-20 lg:py-24 relative overflow-hidden border-b border-[#8C5151]/15" id="rekam-jejak">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            <!-- Left Column: Archival Plates -->
            <div class="lg:col-span-5 flex flex-col gap-6">
              <div class="relative bg-surface p-2 border border-[#8C5151]/20">
                <img class="w-full h-80 lg:h-96 object-cover" alt="{{ $founder?->title ?? 'Cuplikan jurnal observasi lapangan' }}" src="{{ $founder?->image_url ?? asset('assets/img/hd/about-musyawarah.jpg') }}"/>
                <div class="pt-3 px-1 pb-1 flex flex-col">
                  <span class="font-caption-fieldnote text-caption-fieldnote italic text-on-surface-variant text-xs sm:text-sm">
                    {{ $founder?->image_caption ?? 'Plat Arsip I: Cuplikan musyawarah pembentukan etika tapak bersama dewan tetua adat.' }}
                  </span>
                </div>
              </div>
              
              <!-- Marginalia Note Plinth -->
              <div class="bg-surface border-l-4 border-l-[#8C5151] border-y border-r border-[#2B211E]/15 p-6 flex items-start gap-4">
                <span class="material-symbols-outlined text-primary text-[24px] shrink-0 mt-1">notes</span>
                <div>
                  <p class="font-caption-fieldnote text-caption-fieldnote italic text-on-surface leading-relaxed">
                    {{ __('sections.about.founder_story.quote') }}
                  </p>
                  <span class="font-label-tag text-xs text-on-surface-variant mt-2 block font-semibold">
                    {{ __('sections.about.founder_story.quote_author') }}
                  </span>
                </div>
              </div>
            </div>

            <!-- Right Column: Essay -->
            <div class="lg:col-span-7 flex flex-col">
              <div class="max-w-[620px] flex flex-col gap-5">
                <div class="flex items-center gap-2 text-secondary font-body-sm text-sm font-semibold">
                  <span class="material-symbols-outlined text-[18px]">history_edu</span>
                  <span>{{ $founder?->badge ?? 'Latar Belakang & Perjalanan' }}</span>
                </div>
                <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-[34px] text-on-surface tracking-tight leading-snug">
                  {{ $founder?->title ?? 'Bermula dari Keresahan atas Ekskursi yang Berjarak' }}
                </h2>
                @if($founder?->subtitle)
                <div class="font-body-lead text-body-lead text-on-surface-variant leading-relaxed">
                  {{ $founder->subtitle }}
                </div>
                @endif
                <div class="font-body-default text-body-default text-on-surface-variant space-y-4 leading-relaxed">
                  @if($founder?->content)
                    {!! nl2br(e($founder->content)) !!}
                  @else
                    <p>
                      Pada musim kemarau 2018, kami menyaksikan sendiri bagaimana puluhan bus pariwisata berukuran besar memadati jalan-jalan sempit di pedesaan Jawa Tengah. Ratusan pelajar diturunkan hanya untuk berfoto selama dua puluh menit, menginjak pematang sawah yang sedang disemai, lalu berlalu begitu saja.
                    </p>
                    <p>
                      Bagi warga desa, kedatangan massal tersebut meninggalkan tumpukan sampah plastik dan kegaduhan tanpa transfer pengetahuan yang bermakna. Bagi para siswa, kunjungan itu tidak lebih dari tamasya sepintas yang gagal menumbuhkan empati sosio-ekologis maupun pemahaman antropologis yang hakiki.
                    </p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      <!-- 4. Section Profil Tim (Dewan Kurator) -->
      <section class="w-full bg-surface py-16 sm:py-20 lg:py-24 border-b border-[#8C5151]/15">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="max-w-2xl mb-12">
            <span class="text-xs font-bold uppercase tracking-widest text-primary block mb-2">
              {{ __('sections.about.team.tag') }}
            </span>
            <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface tracking-tight">
              {{ __('sections.about.team.title') }}
            </h2>
            <p class="font-body-default text-base text-on-surface-variant mt-2 leading-relaxed">
              {{ __('sections.about.team.subtitle') }}
            </p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-10 rgs-grid-connected">
            @forelse($team as $member)
              <div class="rgs-card flex flex-col justify-between">
                <div class="flex flex-col gap-4">
                  <div class="flex flex-col sm:flex-row gap-5 items-start sm:items-center">
                    <img class="w-24 h-24 lg:w-28 lg:h-28 rounded-none object-cover shrink-0 border border-[#8C5151]/20" alt="{{ $member->name }}" src="{{ $member->photo_url }}"/>
                    <div class="flex flex-col">
                      <span class="text-xs font-bold uppercase tracking-wider text-secondary font-sans">{{ $member->role }}</span>
                      <h3 class="font-headline-sm text-xl text-on-surface mt-1 font-bold">{{ $member->name }}</h3>
                      @if($member->affiliation)
                        <span class="font-caption-fieldnote text-caption-fieldnote italic text-on-surface-variant text-sm">{{ $member->affiliation }}</span>
                      @endif
                    </div>
                  </div>
                  @if($member->bio)
                  <div class="font-body-default text-sm sm:text-[15px] text-on-surface-variant space-y-2 leading-relaxed pt-2">
                    {!! nl2br(e($member->bio)) !!}
                  </div>
                  @endif
                </div>
                <div class="mt-6 pt-3 flex flex-wrap items-center justify-between gap-3 border-t border-[#2B211E]/10">
                  <div class="flex items-center gap-1.5 text-secondary font-body-sm text-xs">
                    <span class="material-symbols-outlined text-[16px]">location_on</span>
                    <span>{{ $member->location ?? 'Sekretariat Destinara' }}</span>
                  </div>
                  @if($member->email)
                    <a class="font-body-sm text-xs text-primary hover:text-on-surface-variant underline underline-offset-4 decoration-primary/40" href="mailto:{{ $member->email }}">
                      {{ $member->email }}
                    </a>
                  @endif
                </div>
              </div>
            @empty
              <p class="text-on-surface-variant col-span-2 text-center py-8">{{ __('sections.about.team.empty') }}</p>
            @endforelse
          </div>
        </div>
      </section>

      <!-- 5. CTA Penutup -->
      <section class="w-full bg-surface-container-low py-16 sm:py-20 lg:py-24 relative overflow-hidden">
        <div class="max-w-[760px] mx-auto px-gutter-mobile md:px-gutter-desktop text-center flex flex-col items-center">
          <span class="text-xs font-bold uppercase tracking-widest text-primary mb-2">
            {{ $gov?->badge ?? __('sections.about.cta.badge') }}
          </span>
          <h2 class="font-headline-lg text-2xl sm:text-3xl lg:text-headline-lg text-on-surface tracking-tight">
            {{ $gov?->title ?? __('sections.about.cta.title') }}
          </h2>
          <p class="font-body-default text-base text-on-surface-variant mt-3 max-w-xl leading-relaxed">
            {{ $gov?->subtitle ?? __('sections.about.cta.subtitle') }}
          </p>
          <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto">
            <a class="rgs-btn rgs-btn-primary w-full sm:w-auto text-center" href="{{ $gov?->button_link ?? route('contact.index') }}">
              <span>{{ $gov?->button_text ?? __('sections.about.cta.button_text') }}</span>
            </a>
            <a class="rgs-btn rgs-btn-outline w-full sm:w-auto text-center" href="{{ route('destinations.index') }}">
              <span>{{ __('site.common.explore_destinations') }}</span>
            </a>
          </div>
        </div>
      </section>

    </div>
  </main>
@endsection
