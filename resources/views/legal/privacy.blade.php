@extends('layouts.app')

@section('title', __('site.legal.privacy_title') . ' — ' . \App\Models\SiteSetting::get('company_legal_name', 'PT Destinara Chakrawal Artha'))
@section('meta_description', __('site.legal.privacy_meta_desc'))
@section('meta_keywords', __('site.legal.privacy_meta_keywords'))

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
      "name": "{{ __('site.legal.privacy_title') }}",
      "item": "{{ route('legal.privacy') }}"
    }
  ]
}
</script>
@endpush

@section('content')
<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-20">
  <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 py-4 text-xs font-body-sm text-on-surface-variant/80">
      <a href="{{ url('/') }}" class="hover:text-primary transition-colors">{{ __('site.nav.home') }}</a>
      <span>/</span>
      <span class="text-on-surface font-medium">{{ __('site.legal.privacy_title') }}</span>
    </nav>

    <!-- Header Dokumen -->
    <div class="bg-surface-container-low border border-outline-variant/40 p-6 md:p-8 mb-6 relative overflow-hidden">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
        <div class="flex flex-col gap-2 max-w-3xl">
          <div class="flex items-center gap-2">
            <span class="px-2.5 py-0.5 text-[11px] uppercase tracking-wider font-semibold bg-secondary/15 text-secondary border border-secondary/30">
              {{ __('site.legal.personal_data_protection') }}
            </span>
            <span class="text-xs text-on-surface-variant font-medium">{{ __('site.legal.version') }} {{ $doc['version'] }}</span>
          </div>
          <h1 class="font-headline-sm text-2xl md:text-3xl lg:text-4xl text-on-surface font-semibold">
            {{ __('site.legal.privacy_title') }}
          </h1>
          <p class="font-body-sm text-sm text-on-surface-variant leading-relaxed">
            {!! __('site.legal.privacy_intro', ['company' => \App\Models\SiteSetting::get('company_legal_name', 'PT DESTINARA CHAKRAWAL ARTHA')]) !!}
          </p>
        </div>

        <!-- Tombol Aksi Dokumen -->
        <div class="flex flex-wrap sm:flex-nowrap md:flex-col items-stretch sm:items-center md:items-end gap-2.5 shrink-0">
          <a href="{{ $streamUrl }}" target="_blank" rel="noopener noreferrer" 
             class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-surface text-on-surface hover:text-primary border border-outline-variant/60 hover:border-primary text-xs font-medium tracking-wide uppercase transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">open_in_new</span>
            <span>{{ __('site.legal.open_new_tab') }}</span>
          </a>
          <a href="{{ $downloadUrl }}" 
             class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-on-primary hover:bg-primary-container text-xs font-medium tracking-wide uppercase transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">download</span>
            <span>{{ __('site.legal.download_pdf_copy') }}</span>
          </a>
        </div>
      </div>

      <!-- Navigasi Dokumen Resmi Sesuai Footer (Terms, Kebijakan Privasi) -->
      <div class="flex items-center gap-3 md:gap-4 mt-6 pt-4 border-t border-outline-variant/30 text-xs flex-wrap">
        <span class="text-on-surface-variant font-medium">{{ __('site.legal.related_docs') }}:</span>
        
        <!-- Syarat & Ketentuan -->
        <a href="{{ route('legal.terms') }}" class="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-1.5">
          <span class="material-symbols-outlined text-[15px]">description</span>
          <span>{{ __('site.footer.terms') }}</span>
        </a>
        
        <span class="text-outline-variant/60">•</span>
        
        <!-- Kebijakan Privasi (Aktif) -->
        <span class="font-bold text-primary pb-0.5 border-b-2 border-primary flex items-center gap-1.5">
          <span class="material-symbols-outlined text-[15px]">shield</span>
          <span>{{ __('site.footer.privacy') }}</span>
        </span>
      </div>
    </div>

    <!-- PDF Viewer Container -->
    <div id="pdfViewerCard" class="bg-surface-container-lowest border border-outline-variant/40 shadow-sm overflow-hidden transition-all duration-200">
      <div class="px-4 py-3 bg-surface-container-high/60 border-b border-outline-variant/30 flex items-center justify-between text-xs text-on-surface-variant flex-wrap gap-2">
        <div class="flex items-center gap-2 font-medium">
          <span class="material-symbols-outlined text-base text-secondary">verified</span>
          <span>{{ $doc['filename'] }}</span>
          <span class="hidden md:inline text-[11px] text-on-surface-variant/70 font-normal">({{ __('site.legal.view_scale') }})</span>
        </div>
        <div class="flex items-center gap-2">
          <!-- Tombol Fullscreen Mode -->
          <button type="button" onclick="togglePdfFullscreen('pdfViewerCard')" 
                  class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-surface text-on-surface hover:text-primary border border-outline-variant/60 hover:border-primary font-medium tracking-wide transition-all shadow-xs cursor-pointer"
                  title="{{ __('site.legal.fullscreen') }}">
            <span class="material-symbols-outlined text-base" id="fullscreenIcon">fullscreen</span>
            <span id="fullscreenText">{{ __('site.legal.fullscreen') }}</span>
          </button>
          <a href="{{ $streamUrl }}#zoom=80&navpanes=1&pagemode=bookmarks" target="_blank" rel="noopener noreferrer" 
             class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-surface text-on-surface hover:text-primary border border-outline-variant/60 hover:border-primary font-medium tracking-wide transition-all shadow-xs"
             title="{{ __('site.legal.full_tab') }}">
            <span class="material-symbols-outlined text-base">open_in_new</span>
            <span>{{ __('site.legal.full_tab') }}</span>
          </a>
        </div>
      </div>

      <!-- Frame Viewer -->
      <div id="pdfFrameWrapper" class="relative w-full h-[78vh] md:h-[88vh] lg:h-[92vh] bg-[#525659]">
        <iframe 
          id="pdfFrame"
          src="{{ $streamUrl }}#zoom=80&toolbar=1&navpanes=1&pagemode=bookmarks" 
          type="application/pdf"
          class="w-full h-full border-0"
          allowfullscreen
          title="{{ $doc['title_id'] }}">
          
          <!-- Fallback jika peramban tidak mendukung embed PDF -->
          <div class="p-8 text-center flex flex-col items-center justify-center h-full gap-4 text-white">
            <span class="material-symbols-outlined text-4xl text-secondary">picture_as_pdf</span>
            <p class="font-medium text-sm">
              {{ __('site.legal.browser_not_supported') }}
            </p>
            <div class="flex items-center gap-3">
              <a href="{{ $streamUrl }}" target="_blank" class="px-4 py-2 bg-primary text-on-primary text-xs uppercase tracking-wide">
                {{ __('site.legal.open_pdf') }}
              </a>
              <a href="{{ $downloadUrl }}" class="px-4 py-2 border border-outline-variant text-white text-xs uppercase tracking-wide">
                {{ __('site.legal.download_file') }}
              </a>
            </div>
          </div>
        </iframe>
      </div>
    </div>

    <!-- Catatan Penutup & Kebijakan Data -->
    <div class="mt-6 p-4 bg-surface-container-low border border-outline-variant/30 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 text-xs text-on-surface-variant">
      <div class="flex items-center gap-2">
        <span class="material-symbols-outlined text-base text-secondary">lock</span>
        <span>
          {{ __('site.legal.pdp_compliance') }}
        </span>
      </div>
      <div>
        <span>{{ __('site.legal.dpo_contact') }}</span>
        <a href="mailto:{{ \App\Models\SiteSetting::get('contact_email_partnership', 'partnership@destinara.id') }}" class="font-medium text-primary hover:underline">
          {{ \App\Models\SiteSetting::get('contact_email_partnership', 'partnership@destinara.id') }}
        </a>
      </div>
    </div>

  </div>
</main>

@push('scripts')
<script>
  function togglePdfFullscreen(cardId) {
    const card = document.getElementById(cardId);
    if (!document.fullscreenElement && !document.webkitFullscreenElement) {
      if (card.requestFullscreen) {
        card.requestFullscreen();
      } else if (card.webkitRequestFullscreen) {
        card.webkitRequestFullscreen();
      } else if (card.msRequestFullscreen) {
        card.msRequestFullscreen();
      }
    } else {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
    }
  }

  function updateFullscreenUI() {
    const isFs = !!(document.fullscreenElement || document.webkitFullscreenElement);
    const icon = document.getElementById('fullscreenIcon');
    const text = document.getElementById('fullscreenText');
    const frameWrapper = document.getElementById('pdfFrameWrapper');
    if (icon) icon.textContent = isFs ? 'fullscreen_exit' : 'fullscreen';
    if (text) text.textContent = isFs ? '{{ __('site.legal.exit_fullscreen') }}' : '{{ __('site.legal.fullscreen') }}';
    if (frameWrapper) {
      frameWrapper.style.height = isFs ? 'calc(100vh - 52px)' : '';
    }
  }

  document.addEventListener('fullscreenchange', updateFullscreenUI);
  document.addEventListener('webkitfullscreenchange', updateFullscreenUI);
</script>
@endpush
@endsection
