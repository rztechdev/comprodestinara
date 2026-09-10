@extends('layouts.app')

@section('title', __('site.common.curated_destinations') . ' | Destinara')
@section('meta_description', __('site.common.curated_destinations_desc'))
@section('meta_keywords', 'destinasi desa wisata, desa adat nusantara, direktori tapak edukasi, tempat study tour budaya, live in desa wisata, destinara destinasi')
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
      "name": "{{ __('site.nav.destinations') }}",
      "item": "{{ route('destinations.index') }}"
    }
  ]
}
</script>
@endpush

@section('content')
<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
  <div class="flex flex-col w-full">
    
    <!-- Top Curatorial Introduction -->
    <section class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop w-full pt-8 sm:pt-12 pb-6 sm:pb-8">
      <div class="grid grid-cols-12 gap-space-lg items-end">
        <div class="col-span-12 lg:col-span-8 flex flex-col gap-space-sm">
          <span class="font-caption-fieldnote text-caption-fieldnote italic text-secondary">
            {{ __('site.common.field_inventory_edition', ['year' => date('Y')]) }}
          </span>
          <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl lg:text-display-hero text-on-surface tracking-tight leading-tight">
            {{ __('site.common.curated_destinations') }}
          </h1>
        </div>
        <div class="col-span-12 lg:col-span-4 pb-space-xs">
          <p class="font-body-default text-body-default text-on-surface-variant">
            {{ __('site.common.curated_destinations_desc') }}
          </p>
        </div>
      </div>

      <!-- Editorial Horizontal Filtering Bar -->
      <div class="mt-space-lg sm:mt-space-2xl bg-surface p-3 sm:p-4 rounded-none border border-[#8C5151]/20 flex flex-col gap-2.5">
        <div class="flex items-center gap-2 overflow-x-auto no-scrollbar py-1 w-full flex-nowrap scroll-smooth touch-pan-x" id="categoryFilter">
          <a href="{{ route('destinations.index') }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-none {{ !request('category') || request('category') === 'all' ? 'bg-[#8C5151] text-white font-bold' : 'text-on-surface bg-surface-container-low hover:bg-surface-container border border-[#2B211E]/15' }} font-label-action text-xs sm:text-sm uppercase tracking-wider transition-all min-h-[40px] flex items-center">
            {{ __('site.common.all_regions') }}
          </a>
          <a href="{{ route('destinations.index', ['category' => 'budaya']) }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-none {{ request('category') === 'budaya' ? 'bg-[#8C5151] text-white font-bold' : 'text-on-surface bg-surface-container-low hover:bg-surface-container border border-[#2B211E]/15' }} font-label-action text-xs sm:text-sm uppercase tracking-wider transition-all min-h-[40px] flex items-center">
            {{ __('site.common.cat_culture') }}
          </a>
          <a href="{{ route('destinations.index', ['category' => 'ekologi']) }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-none {{ request('category') === 'ekologi' ? 'bg-[#8C5151] text-white font-bold' : 'text-on-surface bg-surface-container-low hover:bg-surface-container border border-[#2B211E]/15' }} font-label-action text-xs sm:text-sm uppercase tracking-wider transition-all min-h-[40px] flex items-center">
            {{ __('site.common.cat_ecology') }}
          </a>
          <a href="{{ route('destinations.index', ['category' => 'pangan']) }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-none {{ request('category') === 'pangan' ? 'bg-[#8C5151] text-white font-bold' : 'text-on-surface bg-surface-container-low hover:bg-surface-container border border-[#2B211E]/15' }} font-label-action text-xs sm:text-sm uppercase tracking-wider transition-all min-h-[40px] flex items-center">
            {{ __('site.common.cat_food') }}
          </a>
          <a href="{{ route('destinations.index', ['category' => 'bahari']) }}" class="flex-shrink-0 whitespace-nowrap px-4 py-2 rounded-none {{ request('category') === 'bahari' ? 'bg-[#8C5151] text-white font-bold' : 'text-on-surface bg-surface-container-low hover:bg-surface-container border border-[#2B211E]/15' }} font-label-action text-xs sm:text-sm uppercase tracking-wider transition-all min-h-[40px] flex items-center">
            {{ __('site.common.cat_marine') }}
          </a>
        </div>
        <div class="flex items-center justify-between px-1 text-xs text-secondary font-medium pt-2 border-t border-[#8C5151]/15">
          <div class="flex items-center gap-1.5 font-caption-fieldnote italic">
            <span class="w-2 h-2 bg-secondary inline-block"></span>
            <span>{{ $destinations->count() }} {{ __('site.common.active_verified_sites') }}</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Destination Cards Grid / Sections -->
    <div class="flex flex-col w-full gap-space-2xl pb-space-4xl">
      @forelse($destinations as $index => $dest)
        <section class="w-full {{ $index % 2 === 0 ? 'bg-surface-container-low' : 'bg-surface' }} py-8 sm:py-space-3xl border-y border-[#8C5151]/10">
          <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
            <div class="grid grid-cols-12 gap-6 sm:gap-space-2xl items-center">
              <div class="col-span-12 lg:col-span-5 flex flex-col justify-center gap-space-md {{ $index % 2 === 0 ? 'order-2 lg:order-1' : 'order-2' }}">
                <div class="flex items-center gap-space-sm flex-wrap">
                  <span class="rgs-category-tag bg-[#51634b]">
                    {{ $dest->location }}
                  </span>
                  @if($dest->badge)
                    <span class="rgs-category-tag bg-[#8C5151]">
                      {{ $dest->badge }}
                    </span>
                  @endif
                </div>
                <h2 class="font-headline-lg text-2xl sm:text-3xl text-on-surface leading-tight font-normal">
                  {{ $dest->name }}
                </h2>
                <p class="font-body-default text-body-default text-on-surface-variant leading-relaxed">
                  {{ $dest->lead ?? Str::limit(strip_tags($dest->description), 200) }}
                </p>
                @if($dest->research_focus)
                  <div class="p-3.5 bg-surface border border-[#2B211E]/10 rounded-none flex flex-col gap-1 text-sm">
                    <span class="text-xs font-bold uppercase tracking-wider text-secondary font-sans">{{ __('site.common.research_focus') }}</span>
                    <p class="text-on-surface font-body-sm">
                      {{ $dest->research_focus }}
                    </p>
                  </div>
                @endif
                <div class="pt-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-t border-[#8C5151]/15">
                  <a href="{{ route('destinations.show', $dest->slug) }}" class="rgs-btn rgs-btn-outline !py-2 !px-4 self-start">
                    <span>{{ __('site.common.open_syllabus') }}</span>
                  </a>
                  <div class="flex items-center gap-space-sm text-on-surface-variant font-caption-fieldnote text-xs italic">
                    @if($dest->module_name)
                      <span>{{ $dest->module_name }}</span>
                    @endif
                    @if($dest->capacity)
                      <span class="text-secondary font-bold">• {{ $dest->capacity }}</span>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-span-12 lg:col-span-7 {{ $index % 2 === 0 ? 'order-1 lg:order-2' : 'order-1' }}">
                <div class="relative w-full aspect-[16/10] sm:aspect-[16/9] overflow-hidden rounded-none border border-[#8C5151]/20 bg-surface-container group">
                  <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-103" alt="{{ $dest->name }}" src="{{ $dest->image_url }}"/>
                  <div class="absolute inset-0 bg-gradient-to-t from-[#231917]/50 via-transparent to-transparent pointer-events-none"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
      @empty
        <div class="max-w-[1280px] mx-auto px-gutter-mobile py-16 text-center text-on-surface-variant">
          <p class="font-headline-sm">{{ __('site.common.no_destinations') }}</p>
          <a href="{{ route('destinations.index') }}" class="inline-block mt-4 text-primary underline">{{ __('site.common.back_to_all') }}</a>
        </div>
      @endforelse
    </div>

  </div>
</main>
@endsection
