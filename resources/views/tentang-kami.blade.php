@extends('layouts.app')

@section('title', 'Tentang Kami — Jejak Cerita Pendiri & Nilai Dasar Destinara')

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $manifesto = $sections['manifesto'] ?? null;
  $founder = $sections['founder_story'] ?? null;
  $values = $sections['values'] ?? null;
  $gov = $sections['governance'] ?? null;
@endphp

<main class="w-full pt-20 bg-surface">
    <div class="flex flex-col w-full">
      
      @if(!$hero || $hero->is_active)
      <!-- 1. Hero: Foto Besar Tapak Desa Full-Bleed -->
      <section class="relative w-full -mt-20 overflow-hidden bg-inverse-surface">
        <div class="w-full min-h-[520px] sm:min-h-[600px] lg:min-h-[720px] bg-cover bg-center flex flex-col justify-end relative" style="background-image: url('{{ $hero?->image_url ?? asset('assets/img/hd/hero-about.jpg') }}')">
          <div class="absolute inset-0 bg-gradient-to-t from-[#231917] via-[#231917]/50 to-transparent"></div>
          <div class="relative z-10 max-w-[1280px] w-full mx-auto px-gutter-mobile md:px-gutter-desktop pt-28 sm:pt-space-3xl lg:pt-space-4xl pb-space-xl sm:pb-space-2xl lg:pb-space-3xl flex flex-col items-start">
            @if($hero?->badge)
            <div class="inline-flex items-center gap-space-xs px-space-md py-space-2xs rounded-lg bg-surface/15 backdrop-blur-md mb-space-md sm:mb-space-lg text-primary-fixed">
              <span class="w-1.5 h-1.5 rounded-full bg-secondary-fixed"></span>
              <span class="font-body-sm text-xs sm:text-body-sm text-surface-container-low tracking-normal">{{ $hero->badge }}</span>
            </div>
            @endif
            <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl lg:text-display-hero text-surface-container-lowest max-w-4xl tracking-tight leading-tight">
              {{ $hero?->title ?? 'Tentang Kami: Merajut Dialog Setara antara Ruang Kuliah dan Kearifan Warga Tapak Nusantara' }}
            </h1>
            <div class="mt-space-md sm:mt-space-lg flex flex-wrap items-center gap-space-md sm:gap-space-xl text-surface-container-high font-body-sm text-xs sm:text-body-sm">
              <span class="flex items-center gap-space-2xs text-secondary-fixed">
                <span class="material-symbols-outlined text-[18px]">verified</span>
                {{ $hero?->subtitle ?? 'Didokumentasikan sejak 2018' }}
              </span>
              <span class="text-outline-variant font-caption-fieldnote text-caption-fieldnote italic">
                {{ $hero?->image_caption ?? 'Arsip Inisiatif Destinara — Yogyakarta, Magelang, & Enrekang' }}
              </span>
            </div>
          </div>
        </div>
      </section>
      @endif

      @if(!$manifesto || $manifesto->is_active)
      <!-- 2. Section Visi-Misi & Manifesto -->
      <section class="w-full bg-surface py-space-2xl sm:py-space-3xl lg:py-space-4xl relative" id="manifesto">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col items-center">
          <div class="w-12 h-12 rounded-full bg-surface-container-high flex items-center justify-center text-primary mb-space-lg sm:mb-space-xl">
            <span class="material-symbols-outlined text-[24px]">menu_book</span>
          </div>
          <div class="max-w-[720px] mx-auto text-center flex flex-col items-center">
            <blockquote class="font-headline-lg text-xl sm:text-2xl md:text-3xl lg:text-headline-lg text-on-surface leading-snug tracking-tight" id="filosofi">
              {{ $manifesto?->title ?? '“Pendidikan tidak semestinya datang ke desa sebagai penilai luar, melainkan sebagai tamu yang beradab dan pembelajar yang rendah hati.”' }}
            </blockquote>
            <div class="w-16 h-[2px] bg-primary/30 my-space-lg"></div>
            <p class="font-caption-fieldnote text-caption-fieldnote italic text-secondary max-w-[560px]">
              {{ $manifesto?->subtitle ?? 'Sebuah pegangan moral yang kami tuangkan dalam setiap penyusunan protokol etika tapak, modul pembekalan siswa, dan interaksi dengan sesepuh adat.' }}
            </p>
          </div>
          
          <!-- Micro Metrics -->
          @php
            $manifestoItems = $manifesto?->items ?? [
                ['stat' => '12 Orang', 'desc' => 'Batas ketat daya tampung per kelompok guna menekan beban ekologis tapak.'],
                ['stat' => '100% FPIC', 'desc' => 'Persetujuan awal tanpa paksaan (Free Prior Informed Consent) bersama dewan musyawarah desa mitra.'],
                ['stat' => '48 Jam', 'desc' => 'Waktu orientasi hening tanpa gawai sebelum kegiatan riset lapangan dimulai.']
            ];
          @endphp
          <div class="mt-space-3xl w-full max-w-4xl grid grid-cols-1 md:grid-cols-3 gap-space-lg">
            @foreach($manifestoItems as $idx => $mItem)
              <div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col justify-between card-interactive">
                <span class="font-headline-md text-headline-md {{ $idx == 0 ? 'text-primary' : ($idx == 1 ? 'text-secondary' : 'text-tertiary') }} font-serif">{{ $mItem['stat'] ?? $mItem['title'] ?? '' }}</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-2xs">{{ $mItem['desc'] ?? '' }}</p>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      @endif

      @if(!$founder || $founder->is_active)
      <!-- 3. Cerita Pendirian & Rekam Jejak -->
      <section class="w-full bg-surface-container-low py-space-4xl relative overflow-hidden" id="rekam-jejak">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl lg:gap-space-3xl items-start">
            <!-- Left Column: Archival Plates -->
            <div class="lg:col-span-5 flex flex-col gap-space-xl">
              <div class="relative bg-surface rounded-xl p-space-sm shadow-sm">
                <img class="w-full h-80 lg:h-96 object-cover rounded-lg" alt="{{ $founder?->title ?? 'Cuplikan jurnal observasi lapangan' }}" src="{{ $founder?->image_url ?? asset('assets/img/hd/about-musyawarah.jpg') }}"/>
                <div class="pt-space-md px-space-xs pb-space-2xs flex flex-col">
                  <span class="font-caption-fieldnote text-caption-fieldnote italic text-on-surface-variant">
                    {{ $founder?->image_caption ?? 'Plat Arsip I: Cuplikan musyawarah pembentukan etika tapak bersama dewan tetua adat.' }}
                  </span>
                </div>
              </div>
              
              <!-- Marginalia Note Box -->
              <div class="bg-surface-container p-space-lg rounded-xl flex items-start gap-space-md">
                <span class="material-symbols-outlined text-primary text-[24px] shrink-0 mt-1">notes</span>
                <div>
                  <p class="font-caption-fieldnote text-caption-fieldnote italic text-on-surface leading-relaxed">
                    “Beban terbesar pariwisata edukasi konvensional adalah kecenderungan menjadikan kehidupan pedesaan sekadar tontonan akhir pekan, bukan ekosistem hidup yang memiliki ritme dan martabatnya sendiri.”
                  </p>
                  <span class="font-label-tag text-label-tag text-on-surface-variant mt-space-2xs block">
                    Catatan Lapangan Ryan Prasetya, November 2018
                  </span>
                </div>
              </div>
            </div>

            <!-- Right Column: Essay -->
            <div class="lg:col-span-7 flex flex-col">
              <div class="max-w-[620px] flex flex-col gap-space-lg">
                <div class="flex items-center gap-space-xs text-secondary font-body-sm text-body-sm">
                  <span class="material-symbols-outlined text-[18px]">history_edu</span>
                  <span>{{ $founder?->badge ?? 'Latar Belakang & Perjalanan' }}</span>
                </div>
                <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight leading-snug">
                  {{ $founder?->title ?? 'Bermula dari Keresahan atas Ekskursi yang Berjarak' }}
                </h2>
                @if($founder?->subtitle)
                <div class="font-body-lead text-body-lead text-on-surface-variant leading-relaxed">
                  {{ $founder->subtitle }}
                </div>
                @endif
                <div class="font-body-default text-body-default text-on-surface-variant space-y-space-md leading-relaxed">
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
      <section class="w-full bg-surface py-space-4xl">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="max-w-2xl mb-space-2xl">
            <div class="inline-flex items-center gap-space-xs text-primary font-body-sm text-body-sm mb-space-xs">
              <span class="material-symbols-outlined text-[18px]">group</span>
              <span>Dewan Penggagas &amp; Penjaga Tapak</span>
            </div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
              Pribadi di Balik Percakapan Lapangan
            </h2>
            <p class="font-body-default text-body-default text-on-surface-variant mt-space-xs">
              Menggabungkan ketelitian metodologi akademis dengan kepekaan kultural yang diasah bertahun-tahun di tanah perjumpaan.
            </p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-space-xl">
            @forelse($team as $member)
              <div class="bg-surface-container-lowest rounded-xl p-space-xl shadow-sm flex flex-col justify-between border border-outline-variant/40 card-interactive">
                <div class="flex flex-col gap-space-lg">
                  <div class="flex flex-col sm:flex-row gap-space-lg items-start sm:items-center">
                    <img class="w-24 h-24 lg:w-28 lg:h-28 rounded-xl object-cover shrink-0" alt="{{ $member->name }}" src="{{ $member->photo_url }}"/>
                    <div class="flex flex-col">
                      <span class="font-label-tag text-label-tag text-secondary font-medium">{{ $member->role }}</span>
                      <h3 class="font-headline-sm text-headline-sm text-on-surface mt-space-2xs">{{ $member->name }}</h3>
                      @if($member->affiliation)
                        <span class="font-caption-fieldnote text-caption-fieldnote italic text-on-surface-variant">{{ $member->affiliation }}</span>
                      @endif
                    </div>
                  </div>
                  @if($member->bio)
                  <div class="font-body-default text-body-default text-on-surface-variant space-y-space-sm leading-relaxed text-xs sm:text-sm">
                    {!! nl2br(e($member->bio)) !!}
                  </div>
                  @endif
                </div>
                <div class="mt-space-xl pt-space-md flex flex-wrap items-center justify-between gap-space-sm border-t border-outline-variant/30">
                  <div class="flex items-center gap-space-2xs text-secondary font-body-sm text-xs">
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
              <p class="text-on-surface-variant col-span-2 text-center py-8">Belum ada anggota kurator terdaftar.</p>
            @endforelse
          </div>
        </div>
      </section>

      <!-- 5. CTA Penutup -->
      <section class="w-full bg-surface-container-high py-space-4xl relative overflow-hidden">
        <div class="max-w-[760px] mx-auto px-gutter-mobile md:px-gutter-desktop text-center flex flex-col items-center">
          <span class="font-caption-fieldnote text-caption-fieldnote italic text-primary mb-space-xs">
            {{ $gov?->badge ?? 'Pintu Kami Selalu Terbuka' }}
          </span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">
            {{ $gov?->title ?? 'Mari Duduk dan Bercerita' }}
          </h2>
          <p class="font-body-default text-body-default text-on-surface-variant mt-space-md max-w-xl leading-relaxed">
            {{ $gov?->subtitle ?? 'Apakah Anda seorang pendidik yang ingin memperkaya ruang kelas dengan realitas lapangan, atau peneliti yang mencari ruang belajar beretika? Kami mengundang Anda untuk bertukar pikiran bersama kami.' }}
          </p>
          <div class="mt-space-2xl flex flex-col sm:flex-row items-center justify-center gap-space-md w-full sm:w-auto">
            <a class="w-full sm:w-auto bg-primary-container text-on-primary font-label-action text-label-action px-space-xl py-space-md rounded-lg hover:bg-primary transition-colors text-center shadow-sm" href="{{ $gov?->button_link ?? route('contact.index') }}">
              {{ $gov?->button_text ?? 'Kirim Pesan ke Tim Destinara' }}
            </a>
            <a class="font-label-action text-label-action text-secondary hover:text-on-surface py-space-sm px-space-md transition-colors underline underline-offset-8 decoration-secondary/50 hover:decoration-secondary" href="{{ route('destinations.index') }}">
              Jelajahi Wilayah Dampingan
            </a>
          </div>
        </div>
      </section>

    </div>
  </main>
@endsection
