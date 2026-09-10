@extends('layouts.app')

@section('title', $destination->name . ' — ' . $destination->location . ' | Destinara')
@section('meta_description', Str::limit(strip_tags($destination->description ?? ($destination->name . ' di ' . $destination->location . '. Tapak belajar budaya terkurasi bersama Destinara.')), 155))
@section('meta_keywords', $destination->name . ', ' . $destination->location . ', ' . ($destination->badge ?? '') . ', tapak edukasi, desa adat, wisata budaya nusantara, destinara')
@section('og_image', $destination->image_url ?? asset('assets/img/hd/hero-fieldwork.jpg'))

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
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
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ addslashes($destination->name) }}",
          "item": "{{ url()->current() }}"
        }
      ]
    },
    {
      "@type": "TouristDestination",
      "@id": "{{ url()->current() }}#destination",
      "name": "{{ addslashes($destination->name) }}",
      "description": "{{ addslashes(Str::limit(strip_tags($destination->description ?? ''), 250)) }}",
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "{{ addslashes($destination->location) }}",
        "addressCountry": "ID"
      },
      "image": "{{ $destination->image_url ?? asset('assets/img/hd/hero-fieldwork.jpg') }}",
      "touristType": [
        "CulturalTourism",
        "EducationalTourism"
      ]
    }
  ]
}
</script>
@endpush

@section('content')
<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
  <div class="flex flex-col w-full">

    <!-- Header & Hero Dossier Top -->
    <section class="w-full bg-surface-container-low py-10 md:py-14 border-b border-[#8C5151]/15">
      <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col gap-4">
        <a href="{{ route('destinations.index') }}" class="inline-flex items-center gap-1.5 text-secondary font-bold text-sm hover:underline">
          <span class="material-symbols-outlined text-[18px]">arrow_back</span>
          <span>{{ __('site.common.back_to_index') }}</span>
        </a>
        <div class="flex items-center gap-3 flex-wrap pt-1">
          @if($destination->badge)
            <span class="rgs-category-tag bg-[#8C5151]">
              {{ $destination->badge }}
            </span>
          @endif
          <span class="rgs-category-tag bg-[#51634b]">
            {{ $destination->location }}
          </span>
          <span class="text-xs uppercase tracking-wider font-bold text-secondary font-sans">
            {{ __('site.common.category_label') }}: {{ $destination->category }}
          </span>
        </div>
        <h1 class="font-display-hero text-3xl sm:text-4xl md:text-5xl text-on-surface tracking-tight leading-tight">
          {{ $destination->name }}
        </h1>
        <p class="font-body-lead text-base md:text-lg text-on-surface-variant max-w-3xl leading-relaxed">
          {{ $destination->lead ?? Str::limit(strip_tags($destination->description), 200) }}
        </p>
      </div>
    </section>

    <!-- Main Content & Details -->
    <section class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop py-12 md:py-16 w-full">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 md:gap-14 items-start">
        <!-- Content Column -->
        <div class="lg:col-span-8 flex flex-col gap-8">
          <div class="relative w-full aspect-[16/9] rounded-none overflow-hidden border border-[#8C5151]/20">
            <img src="{{ $destination->image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
          </div>

          <div class="flex flex-col gap-4 font-body-default text-base text-on-surface leading-relaxed">
            <h3 class="font-headline-md text-2xl text-on-surface font-normal">{{ __('site.common.site_narrative_context') }}</h3>
            <div class="space-y-4 text-on-surface-variant leading-relaxed">
              {!! nl2br(e($destination->description)) !!}
            </div>
          </div>

          @if($destination->research_focus)
            <div class="p-6 bg-surface rounded-none border-l-4 border-l-[#51634b] border-y border-r border-[#2B211E]/10 flex flex-col gap-2">
              <span class="text-xs font-bold uppercase tracking-wider text-secondary font-sans">{{ __('site.common.research_learning_focus') }}</span>
              <p class="font-body-default text-on-surface text-[15px] leading-relaxed">
                {{ $destination->research_focus }}
              </p>
            </div>
          @endif
        </div>

        <!-- Sidebar / Dossier Summary Plinth -->
        <div class="lg:col-span-4 flex flex-col gap-6 sticky top-32">
          <div class="bg-surface p-6 sm:p-7 rounded-none border-t-4 border-t-[#8C5151] border-x border-b border-[#2B211E]/15 flex flex-col gap-4">
            <h4 class="font-headline-sm text-xl text-on-surface font-bold">{{ __('site.common.dossier_summary') }}</h4>
            <div class="flex flex-col gap-3 border-t border-[#2B211E]/10 pt-4 text-sm">
              <div>
                <span class="text-on-surface-variant block text-xs">{{ __('site.common.administrative_location') }}</span>
                <span class="font-bold text-on-surface">{{ $destination->location }}</span>
              </div>
              <div>
                <span class="text-on-surface-variant block text-xs">{{ __('site.common.landscape_category') }}</span>
                <span class="font-bold text-on-surface uppercase">{{ $destination->category }}</span>
              </div>
              <div>
                <span class="text-on-surface-variant block text-xs">{{ __('site.common.field_learning_module') }}</span>
                <span class="font-bold text-on-surface">{{ $destination->module_name ?? __('site.common.contextual_curriculum') }}</span>
              </div>
              <div>
                <span class="text-on-surface-variant block text-xs">{{ __('site.common.max_group_capacity') }}</span>
                <span class="font-bold text-secondary">{{ $destination->capacity ?? __('site.common.default_capacity_range') }}</span>
              </div>
              <div>
                <span class="text-on-surface-variant block text-xs">{{ __('site.common.cultural_protocol') }}</span>
                <span class="font-bold text-on-surface">{{ __('site.common.fpic_verified_badge') }}</span>
              </div>
            </div>

            <div class="pt-4 border-t border-[#2B211E]/10 flex flex-col gap-3">
              <a href="{{ route('contact.index') }}" class="rgs-btn rgs-btn-primary w-full text-center">
                <span>{{ __('site.common.apply_program_here') }}</span>
              </a>
              <a href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp', '6282116200363') }}?text={{ urlencode('Halo Destinara, saya tertarik dengan tapak ' . $destination->name . ' untuk program lapangan.') }}" target="_blank" rel="noopener noreferrer" class="rgs-btn rgs-btn-outline w-full text-center flex items-center justify-center gap-1.5">
                <span class="material-symbols-outlined text-[18px]">chat</span>
                <span>{{ __('site.common.consult_whatsapp') }}</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</main>
@endsection
