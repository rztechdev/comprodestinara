@extends('layouts.app')

@section('title', 'Untuk Sekolah — Panduan Study Tour Resmi & Berdokumen Legal | Destinara')

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $benefits = $sections['benefits'] ?? null;
  $flow = $sections['flow'] ?? null;
  $cta = $sections['cta_schools'] ?? null;
@endphp

<main class="w-full pt-20 bg-surface">
    <div class="flex flex-col w-full">
      
      @if(!$hero || $hero->is_active)
      <!-- Hero Section -->
      <section class="relative w-full bg-surface pt-space-xl pb-space-3xl overflow-hidden">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-12 gap-space-xl items-center">
            <!-- Hero Text Content -->
            <div class="col-span-12 lg:col-span-6 flex flex-col items-start gap-space-lg z-10">
              @if($hero?->badge)
              <div class="inline-flex items-center gap-space-xs px-space-md py-space-2xs rounded-lg bg-surface-container-high text-on-surface-variant font-label-tag text-label-tag">
                <span class="w-2 h-2 rounded-full bg-secondary"></span>
                {{ $hero->badge }}
              </div>
              @endif
              <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl lg:text-display-hero text-on-surface tracking-tight leading-tight">
                {{ $hero?->title ?? 'Study tour yang terencana, aman, dan berdokumen resmi' }}
              </h1>
              <p class="font-body-lead text-body-lead text-on-surface-variant max-w-xl">
                {{ $hero?->subtitle ?? 'Menjawab kepatuhan penuh terhadap regulasi dinas pendidikan serta mengintegrasikan capaian Silabus Kurikulum Merdeka ke dalam ekosistem perdesaan yang autentik.' }}
              </p>
              <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-md pt-space-xs w-full sm:w-auto">
                <a class="bg-primary-container text-on-primary font-label-action text-label-action px-space-xl py-space-md rounded-lg hover:bg-primary transition-colors text-center shadow-sm" href="{{ $hero?->button_link ?? '#konsultasi' }}">
                  {{ $hero?->button_text ?? 'Konsultasikan Kunjungan Sekolah' }}
                </a>
                <div class="flex items-center gap-space-xs px-space-md py-space-sm text-on-surface-variant font-body-sm text-body-sm">
                  <span class="material-symbols-outlined text-secondary text-[20px]">verified_user</span>
                  <span>Dokumen kepatuhan dinas terverifikasi</span>
                </div>
              </div>
              <!-- Institutional Trust Strip -->
              <div class="pt-space-md flex flex-wrap items-center gap-space-sm sm:gap-space-lg text-on-surface-variant font-body-sm text-xs sm:text-body-sm">
                <div class="flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-primary text-[18px]">gavel</span>
                  <span>MoU legal &amp; izin wilayah</span>
                </div>
                <div class="flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-primary text-[18px]">health_and_safety</span>
                  <span>Rasio pendamping aman 1:8</span>
                </div>
                <div class="flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-primary text-[18px]">receipt_long</span>
                  <span>Draf LPJ siap inspeksi</span>
                </div>
              </div>
            </div>

            <!-- Hero Photographic Frame Plate -->
            <div class="col-span-12 lg:col-span-6 relative">
              <div class="relative w-full aspect-[4/3] rounded-xl overflow-hidden shadow-md bg-surface-container-high">
                <img class="w-full h-full object-cover" alt="{{ $hero?->title ?? 'Siswa SMP berdiskusi botani di sanggar desa tradisional' }}" src="{{ $hero?->image_url ?? asset('assets/img/hd/sekolah-diskusi.jpg') }}"/>
                <div class="absolute inset-0 bg-gradient-to-t from-inverse-surface/40 via-transparent to-transparent pointer-events-none"></div>
                <div class="absolute bottom-2 left-2 right-2 sm:bottom-space-md sm:left-space-md sm:right-space-md p-space-sm sm:p-space-md rounded-lg bg-surface/95 backdrop-blur-sm shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-2">
                  <div>
                    <p class="font-headline-sm text-sm sm:text-[17px] text-on-surface leading-tight font-semibold">Sanggar Lapangan Pentingsari</p>
                    <p class="font-caption-fieldnote text-xs sm:text-caption-fieldnote italic text-secondary">{{ $hero?->image_caption ?? 'Observasi etnobotani terpadu — Kelas VIII' }}</p>
                  </div>
                  <span class="self-start sm:self-auto px-space-sm py-space-2xs rounded bg-secondary-container text-on-secondary-container font-label-tag text-xs sm:text-label-tag">
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
      <!-- Section Manfaat: Tiga Pilar Kepastian -->
      <section class="w-full bg-surface-container-low py-space-3xl" id="silabus">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="max-w-2xl mb-space-2xl">
            @if($benefits?->badge)
            <span class="font-label-tag text-label-tag text-secondary">{{ $benefits->badge }}</span>
            @endif
            <h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-2xs">
              {{ $benefits?->title ?? 'Mengapa sekolah mempercayakan pembelajaran lapangan pada Destinara' }}
            </h2>
            <p class="font-body-default text-body-default text-on-surface-variant mt-space-xs">
              {{ $benefits?->subtitle ?? 'Dirancang untuk melenyapkan keraguan komite, memastikan keselamatan fisik setiap peserta didik, dan menuntaskan sasaran capaian kurikulum.' }}
            </p>
          </div>
          
          @php
            $benefitItems = $benefits?->items ?? [
                ['icon' => 'verified_user', 'title' => 'Kepatuhan Regulasi Dinas', 'desc' => 'Kelengkapan administrasi resmi mencakup izin dinas pendidikan, surat rekomendasi wilayah, dan MoU berpayung hukum legal.'],
                ['icon' => 'menu_book', 'title' => 'Modul Silabus Tematik Terpadu', 'desc' => 'Materi disesuaikan dengan jenjang SMP/SMA: P5 Gaya Hidup Berkelanjutan, Kearifan Lokal, dan Rekayasa Teknologi Sederhana.'],
                ['icon' => 'health_and_safety', 'title' => 'Protokol Keamanan & Mitigasi Rasio 1:8', 'desc' => 'Setiap 8 siswa didampingi oleh 1 fasilitator bersertifikasi pertolongan pertama (First Aid) dan relawan pemandu tapak desa.'],
                ['icon' => 'receipt_long', 'title' => 'Laporan Pertanggungjawaban Rapi', 'desc' => 'Format pelaporan keuangan dan capaian belajar siap audit, dilengkapi portofolio lembar kerja refleksi siswa.']
            ];
          @endphp

          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg">
            @foreach($benefitItems as $bItem)
              <div class="flex flex-col bg-surface rounded-xl p-space-lg shadow-sm hover:shadow-md transition-shadow card-interactive">
                <div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center text-primary mb-space-md">
                  <span class="material-symbols-outlined text-[24px]">{{ $bItem['icon'] ?? 'verified' }}</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs text-base font-bold">
                  {{ $bItem['title'] ?? '' }}
                </h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant flex-grow text-xs leading-relaxed">
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
      <section class="w-full bg-surface py-space-3xl">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="text-center max-w-2xl mx-auto mb-space-2xl">
            @if($flow?->badge)
            <span class="font-label-tag text-label-tag text-secondary">{{ $flow->badge }}</span>
            @endif
            <h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-2xs">
              {{ $flow?->title ?? 'Bagaimana prosesnya' }}
            </h2>
            <p class="font-body-default text-body-default text-on-surface-variant mt-space-xs">
              {{ $flow?->subtitle ?? 'Empat tahapan terstruktur mendampingi bapak dan ibu guru sejak perumusan gagasan hingga pelaporan akhir selesai.' }}
            </p>
          </div>

          @php
            $flowItems = $flow?->items ?? [
                ['step' => '01', 'title' => 'Konsultasi kebutuhan silabus', 'desc' => 'Pemetaan topik mata pelajaran, jenjang kelas, target profil pelajar, dan penyesuaian batasan anggaran sekolah bersama tim kurikuler kami.'],
                ['step' => '02', 'title' => 'Penyesuaian jadwal & kalender desa', 'desc' => 'Sinkronisasi kalender akademik sekolah dengan dinamika panen atau ritus adat komunitas desa demi pengalaman belajar yang autentik dan aman.'],
                ['step' => '03', 'title' => 'Pembekalan pra-keberangkatan', 'desc' => 'Sosialisasi daring bagi orang tua wali, pembekalan tata krama desa bagi siswa, serta pembagian panduan logistik rinci kepada guru pendamping.'],
                ['step' => '04', 'title' => 'Pelaksanaan terpandu & refleksi', 'desc' => 'Eksplorasi di bawah panduan fasilitator lapangan, pengisian lembar refleksi malam, penyerahan kenang-kenangan, dan penyusunan draf berkas evaluasi.']
            ];
          @endphp

          <div class="relative w-full">
            <div class="hidden lg:block absolute top-7 left-12 right-12 h-[2px] bg-outline-variant/40 -z-0"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg relative z-10">
              @foreach($flowItems as $idx => $fItem)
                <div class="flex flex-col items-start bg-surface-container-low lg:bg-transparent p-space-lg lg:p-0 rounded-xl">
                  <div class="flex items-center justify-center w-14 h-14 rounded-full bg-surface text-primary-container font-headline-sm text-headline-sm shadow-sm mb-space-md border border-outline-variant/30">
                    {{ $fItem['step'] ?? sprintf('%02d', $idx + 1) }}
                  </div>
                  <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-2xs text-base font-bold">
                    {{ $fItem['title'] ?? '' }}
                  </h4>
                  <p class="font-body-sm text-body-sm text-on-surface-variant text-xs leading-relaxed">
                    {{ $fItem['desc'] ?? '' }}
                  </p>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </section>
      @endif

      <!-- CTA Penutup Full-width -->
      @if(!$cta || $cta->is_active)
      <section class="w-full bg-primary-container text-on-primary py-space-3xl" id="konsultasi">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-12 gap-space-xl items-center">
            <div class="col-span-12 lg:col-span-8 flex flex-col gap-space-sm">
              <span class="font-label-tag text-label-tag text-on-primary-container">{{ $cta?->badge ?? 'Konsultasi Awal Bebas Biaya' }}</span>
              <h2 class="font-headline-lg text-headline-lg text-on-primary text-2xl md:text-3xl lg:text-headline-lg">
                {{ $cta?->title ?? 'Rencanakan agenda kunjungan sekolah bapak dan ibu bersama kurator kami' }}
              </h2>
              <p class="font-body-lead text-body-lead text-on-primary/90 max-w-2xl">
                {{ $cta?->subtitle ?? 'Luangkan waktu 20 menit untuk mendiskusikan pemetaan kurikulum, jadwal kalender akademik semester depan, serta gambaran rancangan anggaran sekolah.' }}
              </p>
            </div>
            <div class="col-span-12 lg:col-span-4 flex flex-col items-start lg:items-end justify-center">
              <div class="bg-surface rounded-xl p-space-lg text-on-surface w-full max-w-md shadow-md flex flex-col gap-space-md">
                <div>
                  <p class="font-headline-sm text-headline-sm text-on-surface text-[18px] font-semibold">Jadwalkan Audiensi</p>
                  <p class="font-body-sm text-body-sm text-on-surface-variant">Sesi daring langsung bersama tim kurikulum Destinara.</p>
                </div>
                <form class="flex flex-col gap-space-xs" action="{{ route('contact.send') }}" method="POST">
                  @csrf
                  <input type="hidden" name="topic" value="Kemitraan Sekolah / Study Tour">
                  <label class="font-body-sm text-body-sm text-on-surface-variant" for="full_name">Nama Lengkap &amp; Sekolah</label>
                  <input class="w-full px-space-sm py-space-xs rounded bg-surface-container-lowest text-on-surface text-body-sm outline-none focus:ring-1 focus:ring-primary shadow-sm" id="full_name" name="full_name" placeholder="Contoh: Dra. Sri Wahyuni - SMA Negeri 3" required type="text"/>
                  <input type="hidden" name="institution" value="Institusi Sekolah">
                  <label class="font-body-sm text-body-sm text-on-surface-variant mt-space-2xs" for="whatsapp">Nomor WhatsApp PIC / Kepala Sekolah</label>
                  <input class="w-full px-space-sm py-space-xs rounded bg-surface-container-lowest text-on-surface text-body-sm outline-none focus:ring-1 focus:ring-primary shadow-sm" id="whatsapp" name="whatsapp" placeholder="0812-xxxx-xxxx" required type="tel"/>
                  <button class="mt-space-sm w-full bg-primary text-on-primary font-label-action text-label-action py-space-sm rounded-lg hover:bg-primary-container transition-colors shadow-sm cursor-pointer" type="submit">
                    {{ $cta?->button_text ?? 'Ajukan Waktu Diskusi' }}
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
