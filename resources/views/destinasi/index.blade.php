@extends('layouts.app')

@section('title', 'Destinasi yang Kami Kurasi — Destinara')

@section('content')
<main class="w-full pt-20 bg-surface">
  <div class="flex flex-col w-full">
    
    <!-- Top Curatorial Introduction -->
    <section class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop w-full pt-space-2xl pb-space-xl">
      <div class="grid grid-cols-12 gap-space-lg items-end">
        <div class="col-span-12 lg:col-span-8 flex flex-col gap-space-sm">
          <span class="font-caption-fieldnote text-caption-fieldnote italic text-secondary">
            Inventaris Lapangan Edisi {{ date('Y') }}
          </span>
          <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl lg:text-display-hero text-on-surface tracking-tight leading-tight">
            Destinasi yang Kami Kurasi
          </h1>
        </div>
        <div class="col-span-12 lg:col-span-4 pb-space-xs">
          <p class="font-body-default text-body-default text-on-surface-variant">
            Setiap tapak diverifikasi melalui persetujuan bebas didahulukan (FPIC), audit keamanan jelajah pelajar, dan ketersediaan tetua adat sebagai narasumber primer.
          </p>
        </div>
      </div>

      <!-- Editorial Horizontal Filtering Bar -->
      <div class="mt-space-lg sm:mt-space-2xl bg-surface-container-low/90 backdrop-blur-md p-3 sm:p-space-md rounded-2xl border border-outline-variant/30 shadow-sm flex flex-col gap-2.5">
        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar py-1 w-full flex-nowrap scroll-smooth touch-pan-x" id="categoryFilter">
          <a href="{{ route('destinations.index') }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-xl {{ !request('category') || request('category') === 'all' ? 'bg-primary-container text-on-primary font-semibold' : 'text-on-surface-variant bg-surface hover:text-on-surface hover:bg-surface-container' }} font-label-action text-xs sm:text-sm transition-all shadow-sm min-h-[42px] flex items-center border border-outline-variant/30">
            Semua Wilayah
          </a>
          <a href="{{ route('destinations.index', ['category' => 'budaya']) }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-xl {{ request('category') === 'budaya' ? 'bg-primary-container text-on-primary font-semibold' : 'text-on-surface-variant bg-surface hover:text-on-surface hover:bg-surface-container' }} font-label-action text-xs sm:text-sm transition-all shadow-sm min-h-[42px] flex items-center border border-outline-variant/30">
            Budaya &amp; Tradisi
          </a>
          <a href="{{ route('destinations.index', ['category' => 'ekologi']) }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-xl {{ request('category') === 'ekologi' ? 'bg-primary-container text-on-primary font-semibold' : 'text-on-surface-variant bg-surface hover:text-on-surface hover:bg-surface-container' }} font-label-action text-xs sm:text-sm transition-all shadow-sm min-h-[42px] flex items-center border border-outline-variant/30">
            Ekologi &amp; Hutan
          </a>
          <a href="{{ route('destinations.index', ['category' => 'pangan']) }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-xl {{ request('category') === 'pangan' ? 'bg-primary-container text-on-primary font-semibold' : 'text-on-surface-variant bg-surface hover:text-on-surface hover:bg-surface-container' }} font-label-action text-xs sm:text-sm transition-all shadow-sm min-h-[42px] flex items-center border border-outline-variant/30">
            Kemandirian Pangan
          </a>
          <a href="{{ route('destinations.index', ['category' => 'bahari']) }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-xl {{ request('category') === 'bahari' ? 'bg-primary-container text-on-primary font-semibold' : 'text-on-surface-variant bg-surface hover:text-on-surface hover:bg-surface-container' }} font-label-action text-xs sm:text-sm transition-all shadow-sm min-h-[42px] flex items-center border border-outline-variant/30">
            Lanskap Bahari
          </a>
        </div>
        <div class="flex items-center justify-between px-1 text-xs text-secondary font-medium pt-1 border-t border-outline-variant/20">
          <div class="flex items-center gap-1.5 font-caption-fieldnote italic">
            <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
            <span>{{ $destinations->count() }} tapak aktif ditemukan</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Destination Cards Grid / Sections -->
    <div class="flex flex-col w-full gap-space-2xl pb-space-4xl">
      @forelse($destinations as $index => $dest)
        <section class="w-full {{ $index % 2 === 0 ? 'bg-surface-container-low' : 'bg-surface' }} py-8 sm:py-space-3xl shadow-sm">
          <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
            <div class="grid grid-cols-12 gap-6 sm:gap-space-2xl items-center">
              <div class="col-span-12 lg:col-span-5 flex flex-col justify-center gap-space-md {{ $index % 2 === 0 ? 'order-2 lg:order-1' : 'order-2' }}">
                <div class="flex items-center gap-space-sm flex-wrap">
                  @if($dest->badge)
                    <span class="px-space-sm py-space-2xs rounded-lg bg-surface-container-highest text-secondary font-label-tag text-label-tag">
                      {{ $dest->badge }}
                    </span>
                  @endif
                  <span class="font-body-sm text-body-sm text-on-surface-variant">{{ $dest->location }}</span>
                </div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface leading-tight">
                  {{ $dest->name }}
                </h2>
                <p class="font-body-default text-body-default text-on-surface-variant">
                  {{ $dest->lead ?? Str::limit(strip_tags($dest->description), 200) }}
                </p>
                @if($dest->research_focus)
                  <div class="p-space-md bg-surface-container-lowest rounded-lg flex flex-col gap-space-xs">
                    <span class="font-label-tag text-label-tag text-secondary font-semibold">Fokus Riset Pembelajaran</span>
                    <p class="font-body-sm text-body-sm text-on-surface">
                      {{ $dest->research_focus }}
                    </p>
                  </div>
                @endif
                <div class="pt-space-sm flex flex-col sm:flex-row sm:items-center justify-between gap-2.5 border-t border-outline-variant/20 sm:border-0">
                  <a href="{{ route('destinations.show', $dest->slug) }}" class="font-headline-sm text-base sm:text-headline-sm text-primary font-semibold underline underline-offset-8 decoration-primary/40 hover:decoration-primary transition-all flex items-center gap-2">
                    <span>Lihat Dossier Lengkap</span>
                    <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                  </a>
                  <div class="flex items-center gap-space-sm text-on-surface-variant font-caption-fieldnote text-caption-fieldnote italic">
                    @if($dest->module_name)
                      <span>{{ $dest->module_name }}</span>
                    @endif
                    @if($dest->capacity)
                      <span class="text-secondary font-label-tag text-label-tag">• {{ $dest->capacity }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-span-12 lg:col-span-7 {{ $index % 2 === 0 ? 'order-1 lg:order-2' : 'order-1' }}">
                <div class="relative w-full aspect-[16/10] sm:aspect-[16/9] overflow-hidden rounded-xl bg-surface-container shadow-md group">
                  <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" alt="{{ $dest->name }}" src="{{ $dest->image_url }}"/>
                  <div class="absolute inset-0 bg-primary/10 mix-blend-multiply pointer-events-none"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
      @empty
        <div class="max-w-[1280px] mx-auto px-gutter-mobile py-16 text-center text-on-surface-variant">
          <p class="font-headline-sm">Tidak ada tapak destinasi yang sesuai dengan kategori yang dipilih.</p>
          <a href="{{ route('destinations.index') }}" class="inline-block mt-4 text-primary underline">Kembali ke seluruh wilayah</a>
        </div>
      @endforelse
    </div>

  </div>
</main>
@endsection
