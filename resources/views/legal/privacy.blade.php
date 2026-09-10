@extends('layouts.app')

@section('title', ($lang === 'en' ? 'Privacy Policy' : 'Kebijakan Privasi') . ' — PT Destinara Chakrawal Artha')
@section('meta_description', 'Dokumen resmi Kebijakan Privasi dan Perlindungan Data Pribadi inisiatif pendidikan dan riset lapangan PT Destinara Chakrawal Artha.')
@section('meta_keywords', 'kebijakan privasi destinara, privacy policy destinara, perlindungan data pribadi, kerahasiaan data, pt destinara chakrawal artha')

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Beranda",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Kebijakan Privasi",
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
      <a href="{{ url('/') }}" class="hover:text-primary transition-colors">{{ $lang === 'en' ? 'Home' : 'Beranda' }}</a>
      <span>/</span>
      <span class="text-on-surface font-medium">{{ $lang === 'en' ? 'Privacy Policy' : 'Kebijakan Privasi' }}</span>
    </nav>

    <!-- Header Dokumen -->
    <div class="bg-surface-container-low border border-outline-variant/40 p-6 md:p-8 mb-6 relative overflow-hidden">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 relative z-10">
        <div class="flex flex-col gap-2 max-w-3xl">
          <div class="flex items-center gap-2">
            <span class="px-2.5 py-0.5 text-[11px] uppercase tracking-wider font-semibold bg-secondary/15 text-secondary border border-secondary/30">
              {{ $lang === 'en' ? 'Personal Data Protection' : 'Perlindungan Data Pribadi' }}
            </span>
            <span class="text-xs text-on-surface-variant font-medium">{{ $lang === 'en' ? 'Version' : 'Versi' }} {{ $doc['version'] }}</span>
          </div>
          <h1 class="font-headline-sm text-2xl md:text-3xl lg:text-4xl text-on-surface font-semibold">
            {{ $lang === 'en' ? $doc['title_en'] : $doc['title_id'] }}
          </h1>
          <p class="font-body-sm text-sm text-on-surface-variant leading-relaxed">
            @if($lang === 'en')
              The official commitment of <strong>{{ \App\Models\SiteSetting::get('company_legal_name', 'PT DESTINARA CHAKRAWAL ARTHA') }}</strong> to maintaining the confidentiality, security, and responsible governance of personal data for visitors, schools, researchers, and local partner communities.
            @else
              Komitmen <strong>{{ \App\Models\SiteSetting::get('company_legal_name', 'PT DESTINARA CHAKRAWAL ARTHA') }}</strong> dalam menjaga kerahasiaan, keamanan, dan tata kelola data pribadi pemustaka, sekolah, peneliti, serta komunitas mitra tapak adat nusantara.
            @endif
          </p>
        </div>

        <!-- Tombol Aksi Dokumen -->
        <div class="flex flex-wrap sm:flex-nowrap md:flex-col items-stretch sm:items-center md:items-end gap-2.5 shrink-0">
          <a href="{{ $streamUrl }}" target="_blank" rel="noopener noreferrer" 
             class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-surface text-on-surface hover:text-primary border border-outline-variant/60 hover:border-primary text-xs font-medium tracking-wide uppercase transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">open_in_new</span>
            <span>{{ $lang === 'en' ? 'Open in New Tab' : 'Buka di Tab Baru' }}</span>
          </a>
          <a href="{{ $downloadUrl }}" 
             class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-on-primary hover:bg-primary-container text-xs font-medium tracking-wide uppercase transition-all shadow-sm">
            <span class="material-symbols-outlined text-base">download</span>
            <span>{{ $lang === 'en' ? 'Download PDF Copy' : 'Unduh Salinan PDF' }}</span>
          </a>
        </div>
      </div>

      <!-- Language Switcher & Navigasi Cepat Dokumen -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mt-6 pt-4 border-t border-outline-variant/30 text-xs">
        <div class="flex items-center gap-2">
          <span class="text-on-surface-variant font-medium mr-1">{{ $lang === 'en' ? 'Document Language:' : 'Pilihan Bahasa Dokumen:' }}</span>
          <a href="{{ route('legal.privacy') }}" 
             class="px-3 py-1.5 font-medium transition-all {{ $lang === 'id' ? 'bg-primary text-on-primary shadow-xs' : 'bg-surface text-on-surface-variant border border-outline-variant/50 hover:text-primary hover:border-primary' }}">
            🇮🇩 Bahasa Indonesia
          </a>
          <a href="{{ route('legal.privacy.en') }}" 
             class="px-3 py-1.5 font-medium transition-all {{ $lang === 'en' ? 'bg-primary text-on-primary shadow-xs' : 'bg-surface text-on-surface-variant border border-outline-variant/50 hover:text-primary hover:border-primary' }}">
            🇬🇧 English (International)
          </a>
        </div>

        <div class="flex items-center gap-4">
          <a href="{{ route('legal.terms') }}" class="text-on-surface-variant hover:text-primary transition-colors">
            &larr; Syarat &amp; Ketentuan Layanan (Terms of Service)
          </a>
        </div>
      </div>
    </div>

    <!-- PDF Viewer Container -->
    <div id="pdfViewerCard" class="bg-surface-container-lowest border border-outline-variant/40 shadow-sm overflow-hidden transition-all duration-200">
      <div class="px-4 py-3 bg-surface-container-high/60 border-b border-outline-variant/30 flex items-center justify-between text-xs text-on-surface-variant flex-wrap gap-2">
        <div class="flex items-center gap-2 font-medium">
          <span class="material-symbols-outlined text-base text-secondary">verified</span>
          <span>{{ $doc['filename'] }} ({{ $lang === 'en' ? 'English Version' : 'Bahasa Indonesia' }})</span>
          <span class="hidden md:inline text-[11px] text-on-surface-variant/70 font-normal">({{ $lang === 'en' ? 'Auto-scaled to page width' : 'Otomatis menyesuaikan lebar layar' }})</span>
        </div>
        <div class="flex items-center gap-2">
          <!-- Tombol Fullscreen Mode -->
          <button type="button" onclick="togglePdfFullscreen('pdfViewerCard')" 
                  class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-surface text-on-surface hover:text-primary border border-outline-variant/60 hover:border-primary font-medium tracking-wide transition-all shadow-xs cursor-pointer"
                  title="{{ $lang === 'en' ? 'Display document in full screen' : 'Tampilkan dokumen dalam satu layar penuh' }}">
            <span class="material-symbols-outlined text-base" id="fullscreenIcon">fullscreen</span>
            <span id="fullscreenText">{{ $lang === 'en' ? 'Full Screen' : 'Layar Penuh' }}</span>
          </button>
          <a href="{{ $streamUrl }}#view=FitH" target="_blank" rel="noopener noreferrer" 
             class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-surface text-on-surface hover:text-primary border border-outline-variant/60 hover:border-primary font-medium tracking-wide transition-all shadow-xs"
             title="{{ $lang === 'en' ? 'Open document in separate tab' : 'Buka dokumen di tab terpisah' }}">
            <span class="material-symbols-outlined text-base">open_in_new</span>
            <span>{{ $lang === 'en' ? 'Full Tab' : 'Tab Penuh' }}</span>
          </a>
        </div>
      </div>

      <!-- Frame Viewer -->
      <div id="pdfFrameWrapper" class="relative w-full h-[78vh] md:h-[88vh] lg:h-[92vh] bg-[#525659]">
        <iframe 
          id="pdfFrame"
          src="{{ $streamUrl }}#view=FitH&toolbar=1&navpanes=0" 
          type="application/pdf"
          class="w-full h-full border-0"
          allowfullscreen
          title="{{ $doc['title_id'] }}">
          
          <!-- Fallback jika peramban tidak mendukung embed PDF -->
          <div class="p-8 text-center flex flex-col items-center justify-center h-full gap-4 text-white">
            <span class="material-symbols-outlined text-4xl text-secondary">picture_as_pdf</span>
            <p class="font-medium text-sm">
              {{ $lang === 'en' ? 'Your browser does not support inline PDF previews on this page.' : 'Peramban Anda tidak mendukung pratinjau PDF langsung di halaman ini.' }}
            </p>
            <div class="flex items-center gap-3">
              <a href="{{ $streamUrl }}" target="_blank" class="px-4 py-2 bg-primary text-on-primary text-xs uppercase tracking-wide">
                {{ $lang === 'en' ? 'Open PDF Document' : 'Buka Dokumen PDF' }}
              </a>
              <a href="{{ $downloadUrl }}" class="px-4 py-2 border border-outline-variant text-white text-xs uppercase tracking-wide">
                {{ $lang === 'en' ? 'Download File' : 'Unduh Berkas' }}
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
          @if($lang === 'en')
            Destinara complies with the Indonesian Personal Data Protection Act (UU PDP No. 27/2022).
          @else
            Destinara mematuhi Undang-Undang Perlindungan Data Pribadi (UU PDP No. 27/2022).
          @endif
        </span>
      </div>
      <div>
        <span>{{ $lang === 'en' ? 'Data Protection Officer (DPO): ' : 'Kontak Petugas Perlindungan Data (DPO): ' }}</span>
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
    if (text) text.textContent = isFs ? '{{ $lang === "en" ? "Exit Full Screen" : "Keluar Layar Penuh" }}' : '{{ $lang === "en" ? "Full Screen" : "Layar Penuh" }}';
    if (frameWrapper) {
      frameWrapper.style.height = isFs ? 'calc(100vh - 52px)' : '';
    }
  }

  document.addEventListener('fullscreenchange', updateFullscreenUI);
  document.addEventListener('webkitfullscreenchange', updateFullscreenUI);
</script>
@endpush
@endsection
