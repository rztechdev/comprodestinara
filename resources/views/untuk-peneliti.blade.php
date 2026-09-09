@extends('layouts.app')

@section('title', 'Untuk Peneliti & Akademisi — Riset Lapangan Kredibel & Akses Data Primer | Destinara')

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $ethics = $sections['ethics'] ?? null;
  $facilities = $sections['facilities'] ?? null;
@endphp
<main class="w-full pt-20 bg-surface">
    <div class="flex flex-col w-full">
      
      <!-- Top Archival Bar -->
      <section class="w-full bg-surface-container-low py-space-sm border-b border-outline-variant/30">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col md:flex-row md:items-center justify-between gap-space-xs text-on-surface-variant">
          <div class="flex items-center gap-space-sm font-caption-fieldnote text-caption-fieldnote italic">
            <span class="inline-block w-2 h-2 rounded-full bg-secondary"></span>
            <span>Direktorat Kemitraan Akademik &amp; Antropologi Terapan Destinara</span>
          </div>
          <div class="flex items-center gap-space-md font-body-sm text-body-sm">
            <span class="text-secondary font-medium">Protokol FPIC Standar {{ date('Y') }}</span>
            <span class="text-outline-variant">/</span>
            <span>Terhubung dengan Balai Adat Terkurasi</span>
          </div>
        </div>
      </section>

      @if(!$hero || $hero->is_active)
      <!-- Hero Section -->
      <section class="w-full py-space-3xl relative overflow-hidden">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-center">
            <div class="lg:col-span-7 flex flex-col gap-space-lg">
              @if($hero?->badge)
              <div class="inline-flex items-center gap-space-xs bg-surface-container px-space-md py-space-xs rounded-lg w-fit text-secondary font-body-sm text-body-sm">
                <span class="material-symbols-outlined text-[18px]">history_edu</span>
                <span>{{ $hero->badge }}</span>
              </div>
              @endif
              <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl lg:text-display-hero text-on-surface tracking-tight leading-tight">
                {{ $hero?->title ?? 'Riset Lapangan Kredibel Berakar pada Kedaulatan Pengetahuan Lokal' }}
              </h1>
              <p class="font-body-lead text-body-lead text-on-surface-variant max-w-xl">
                {{ $hero?->subtitle ?? 'Menjembatani metodologi perguruan tinggi dengan hikmah para penutur adat. Kami menyusun jalur birokrasi, persetujuan etik komunitas, dan logistik lapangan agar eksplorasi ilmiah berjalan sahih, bermartabat, dan resiprokal.' }}
              </p>
              <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-md pt-space-xs">
                <a class="bg-primary-container text-on-primary font-label-action text-label-action px-space-lg py-space-sm rounded-lg hover:bg-primary transition-colors inline-flex items-center justify-center text-center shadow-sm" href="{{ $hero?->button_link ?? '#direktori-desa' }}">
                  {{ $hero?->button_text ?? 'Cari Destinasi untuk Penelitian' }}
                </a>
                <a class="bg-surface-container text-secondary font-label-action text-label-action px-space-lg py-space-sm rounded-lg hover:bg-surface-container-high transition-colors inline-flex items-center justify-center text-center" href="#alur-riset">
                  Pelajari Protokol Kliring Etik
                </a>
              </div>
              <!-- Academic Fieldnote Marginalia -->
              <div class="bg-surface-container-low p-space-md rounded-xl mt-space-sm flex items-start gap-space-sm border-l-4 border-secondary">
                <span class="material-symbols-outlined text-primary text-[20px] shrink-0 mt-0.5">verified_user</span>
                <p class="font-caption-fieldnote text-caption-fieldnote text-on-surface-variant italic">
                  "Penelitian berbasis tapak menuntut perlakuan warga bukan semata informan pasif, melainkan rekan dialog intelektual dan penjaga hak cipta kearifan masa lampau."
                  <span class="block not-italic font-body-sm text-on-surface text-[13px] mt-1 font-medium">— Komisi Kurasi Etnografi Wilayah Barat &amp; Kepulauan</span>
                </p>
              </div>
            </div>

            <!-- Hero Photographic Plate -->
            <div class="lg:col-span-5 relative">
              <div class="bg-surface-container-high p-space-sm rounded-xl shadow-sm">
                <div class="overflow-hidden rounded-lg aspect-[4/5] relative">
                  <img class="w-full h-full object-cover" alt="{{ $hero?->title ?? 'Antropolog budaya melakukan wawancara lapangan' }}" src="{{ $hero?->image_url ?? asset('assets/img/hd/peneliti-wawancara.jpg') }}"/>
                  <div class="absolute bottom-0 inset-x-0 p-space-md bg-gradient-to-t from-inverse-surface/90 via-inverse-surface/60 to-transparent text-inverse-on-surface">
                    <span class="font-caption-fieldnote text-caption-fieldnote italic text-tertiary-fixed">Plate 01: Observasi Partisipatoris</span>
                    <p class="font-body-sm text-body-sm text-inverse-on-surface mt-0.5">{{ $hero?->image_caption ?? 'Pendataan lisan silsilah irigasi Subak & penyerbukan benih di Desa Batur, Kintamani.' }}</p>
                  </div>
                </div>
                <div class="mt-space-sm px-space-xs flex items-center justify-between text-on-surface-variant font-body-sm text-[13px]">
                  <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[16px] text-secondary">location_on</span>
                    Tapak Riset Terverifikasi
                  </span>
                  <span class="text-outline">Dokumentasi Tim Arkeo-Botani</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      <!-- Section Manfaat: Layout Asimetris 2 Kolom -->
      <section class="w-full py-space-3xl bg-surface-container-low">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col gap-space-xs mb-space-2xl">
            <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Infrastruktur Kerja Ilmiah</span>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">
              Fondasi Metodologis untuk Validitas Data di Lapangan
            </h2>
          </div>
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-start">
            <!-- Kolom Kiri: Visual Kolase Arsip -->
            <div class="lg:col-span-5 flex flex-col gap-space-lg">
              <div class="bg-surface-container rounded-xl p-space-md shadow-sm">
                <div class="aspect-[16/10] overflow-hidden rounded-lg">
                  <img class="w-full h-full object-cover" alt="Peneliti mempelajari naskah lontar kuno" src="{{ asset('assets/img/hd/peneliti-lontar.jpg') }}"/>
                </div>
                <div class="pt-space-sm">
                  <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Katalog Naskah Fisik &amp; Herbarium Desa</span>
                  <p class="font-body-sm text-body-sm text-on-surface-variant mt-1">
                    Akses fisik ke manuskrip lontar serta catatan harian lumbung yang belum pernah ditranskripsi ke repositori digital publik.
                  </p>
                </div>
              </div>
              <div class="bg-surface p-space-lg rounded-xl grid grid-cols-3 gap-space-sm text-center shadow-sm">
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-primary font-serif">100%</span>
                  <span class="font-body-sm text-[13px] text-on-surface-variant">FPIC Terverifikasi</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-secondary font-serif">18</span>
                  <span class="font-body-sm text-[13px] text-on-surface-variant">Hari Izin Terbit</span>
                </div>
                <div class="flex flex-col">
                  <span class="font-headline-md text-headline-md text-tertiary font-serif">310+</span>
                  <span class="font-body-sm text-[13px] text-on-surface-variant">Penutur Kunci</span>
                </div>
              </div>
            </div>

            <!-- Kolom Kanan: 3 Pilar -->
            <div class="lg:col-span-7 flex flex-col gap-space-md">
              <div class="bg-surface p-space-lg sm:p-space-xl rounded-xl flex flex-col sm:flex-row gap-space-md sm:gap-space-lg items-start shadow-sm card-interactive">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-lg bg-surface-container-high text-primary flex items-center justify-center font-headline-sm text-headline-sm shrink-0 font-serif">
                  01
                </div>
                <div class="flex flex-col gap-space-xs">
                  <div class="flex flex-wrap items-center gap-space-xs sm:gap-space-sm">
                    <h3 class="font-headline-sm text-lg sm:text-headline-sm text-on-surface">Akses Data Primer &amp; Manuskrip Terverifikasi</h3>
                    <span class="bg-surface-container text-secondary text-[12px] px-2 py-0.5 rounded font-medium">Primer</span>
                  </div>
                  <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant">
                    Bukan data sekunder dari laporan dinas. Dapatkan akses langsung ke register tanah komunal, silsilah lisan, catatan iklim berbasis pranata mangsa, dan artifak material dengan legalitas izin pemotretan resolusi tinggi.
                  </p>
                  <div class="font-body-sm text-xs sm:text-body-sm text-secondary pt-space-xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">folder_open</span>
                    <span>Termasuk fasilitasi transliterasi aksara lokal oleh kurator sanggar</span>
                  </div>
                </div>
              </div>

              <div class="bg-surface p-space-lg sm:p-space-xl rounded-xl flex flex-col sm:flex-row gap-space-md sm:gap-space-lg items-start shadow-sm card-interactive">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-lg bg-surface-container-high text-primary flex items-center justify-center font-headline-sm text-headline-sm shrink-0 font-serif">
                  02
                </div>
                <div class="flex flex-col gap-space-xs">
                  <div class="flex flex-wrap items-center gap-space-xs sm:gap-space-sm">
                    <h3 class="font-headline-sm text-lg sm:text-headline-sm text-on-surface">Jalur Kontak Formal &amp; Izin Kesbangpol / PKS Kampus</h3>
                    <span class="bg-surface-container text-secondary text-[12px] px-2 py-0.5 rounded font-medium">Birokrasi</span>
                  </div>
                  <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant">
                    Menghilangkan ketidakpastian administratif. Tim hukum Destinara mengurus rekomendasi Badan Kesatuan Bangsa dan Politik (Kesbangpol) tingkat kabupaten, surat izin riset provinsi, hingga template Perjanjian Kerja Sama (PKS) antar-fakultas.
                  </p>
                  <div class="font-body-sm text-xs sm:text-body-sm text-secondary pt-space-xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">assignment_turned_in</span>
                    <span>Dokumen legalitas rampung sebelum hari pertama kedatangan ke tapak</span>
                  </div>
                </div>
              </div>

              <div class="bg-surface p-space-lg sm:p-space-xl rounded-xl flex flex-col sm:flex-row gap-space-md sm:gap-space-lg items-start shadow-sm card-interactive">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-lg bg-surface-container-high text-primary flex items-center justify-center font-headline-sm text-headline-sm shrink-0 font-serif">
                  03
                </div>
                <div class="flex flex-col gap-space-xs">
                  <div class="flex flex-wrap items-center gap-space-xs sm:gap-space-sm">
                    <h3 class="font-headline-sm text-lg sm:text-headline-sm text-on-surface">Pendampingan Narasumber Adat &amp; Etika FPIC</h3>
                    <span class="bg-surface-container text-secondary text-[12px] px-2 py-0.5 rounded font-medium">Etika</span>
                  </div>
                  <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant">
                    Prinsip <em>Free, Prior, and Informed Consent</em> (FPIC) kami terapkan melalui musyawarah pendahuluan bersama pemangku adat. Peneliti didampingi juru bahasa budaya untuk memastikan terminologi sakral tidak diekstraksi tanpa konteks.
                  </p>
                  <div class="font-body-sm text-xs sm:text-body-sm text-secondary pt-space-xs flex items-center gap-1">
                    <span class="material-symbols-outlined text-[18px]">handshake</span>
                    <span>Protokol persetujuan terikat dengan perlindungan hak masyarakat adat</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Alur Riset 4 Tahap -->
      <section class="w-full py-space-3xl bg-surface" id="alur-riset">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col items-center text-center max-w-2xl mx-auto mb-space-2xl gap-space-xs">
            <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Tata Kelola Lapangan Terpadu</span>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">
              Bagaimana Proses Penelitian Dilaksanakan
            </h2>
            <p class="font-body-default text-body-default text-on-surface-variant">
              Alur berurutan empat tahap yang menyatukan regulasi akademik formal dengan tata krama ruang sosial komunitas.
            </p>
          </div>

          <div class="relative">
            <div class="hidden lg:block absolute top-7 inset-x-12 h-[2px] bg-surface-container-highest z-0"></div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg relative z-10">
              <div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col gap-space-sm h-full shadow-sm hover:bg-surface-container transition-colors">
                <div class="flex items-center justify-between">
                  <span class="w-12 h-12 rounded-lg bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center font-serif">
                    01
                  </span>
                  <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Minggu 1-2</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface pt-space-xs">
                  Pengajuan Proposal &amp; Penyelarasan Topik
                </h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Tim kurator akademik Destinara menelaah instrumen riset Anda, menyesuaikan variabel lapangan dengan kesiapan narasumber desa dan kalender musiman adat.
                </p>
                <div class="mt-auto pt-space-xs text-[13px] text-secondary font-medium">
                  Keluaran: Matriks Kesesuaian Lokasi &amp; Narasumber
                </div>
              </div>

              <div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col gap-space-sm h-full shadow-sm hover:bg-surface-container transition-colors">
                <div class="flex items-center justify-between">
                  <span class="w-12 h-12 rounded-lg bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center font-serif">
                    02
                  </span>
                  <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Minggu 3</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface pt-space-xs">
                  Kliring Etik &amp; Pemetaan Batas Sakral
                </h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Pertemuan pra-riset dengan Dewan Musyawarah Desa. Penetapan zona tabu fotografi, naskah tertutup, dan penandatanganan lembar persetujuan bersama (FPIC).
                </p>
                <div class="mt-auto pt-space-xs text-[13px] text-secondary font-medium">
                  Keluaran: Surat Kliring Komunitas &amp; Panduan Tabu
                </div>
              </div>

              <div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col gap-space-sm h-full shadow-sm hover:bg-surface-container transition-colors">
                <div class="flex items-center justify-between">
                  <span class="w-12 h-12 rounded-lg bg-primary-container text-on-primary font-headline-sm text-headline-sm flex items-center justify-center font-serif">
                    03
                  </span>
                  <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Periode Lapangan</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface pt-space-xs">
                  Pelaksanaan Data &amp; Triangulasi Lapangan
                </h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Tinggal di pondok peneliti tapak. Wawancara mendalam, observasi partisipan, dan sesi verifikasi berkala bersama pendamping lokal untuk mengonfirmasi ketepatan konteks.
                </p>
                <div class="mt-auto pt-space-xs text-[13px] text-secondary font-medium">
                  Keluaran: Logbook Harian &amp; Transkrip Valid
                </div>
              </div>

              <div class="bg-surface-container-low p-space-lg rounded-xl flex flex-col gap-space-sm h-full shadow-sm hover:bg-surface-container transition-colors">
                <div class="flex items-center justify-between">
                  <span class="w-12 h-12 rounded-lg bg-secondary text-on-secondary font-headline-sm text-headline-sm flex items-center justify-center font-serif">
                    04
                  </span>
                  <span class="font-caption-fieldnote text-caption-fieldnote text-secondary-fixed-dim italic">Pasca-Riset</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface pt-space-xs">
                  Diseminasi &amp; Penyerahan Balik ke Arsip
                </h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Mewujudkan sains non-ekstraktif: peneliti wajib menyerahkan eksemplar laporan, ringkasan eksekutif berbahasa lokal, dan dokumentasi foto ke arsip perpustakaan warga.
                </p>
                <div class="mt-auto pt-space-xs text-[13px] text-secondary font-medium">
                  Keluaran: Berita Acara Penerimaan Arsip Komunitas
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section Direktori 42 Desa & Cuplikan -->
      <section class="w-full py-space-3xl bg-surface-container-low" id="direktori-desa">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg mb-space-2xl">
            <div class="flex flex-col gap-space-xs max-w-2xl">
              <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Jaringan Riset Aktif</span>
              <h2 class="font-headline-lg text-headline-lg text-on-surface">
                Direktori 42 Desa Binaan Riset Lapangan
              </h2>
              <p class="font-body-default text-body-default text-on-surface-variant">
                Seluruh desa telah memiliki pondok pemukiman peneliti, akses listrik stabil untuk digitalisasi data, serta koordinasi aktif dengan tetua adat setempat.
              </p>
            </div>
            <div class="flex items-center gap-space-sm">
              <span class="font-body-sm text-body-sm text-on-surface-variant">Fasilitas Standar:</span>
              <span class="bg-surface px-space-sm py-space-2xs rounded text-[13px] text-secondary font-medium shadow-sm">Akomodasi</span>
              <span class="bg-surface px-space-sm py-space-2xs rounded text-[13px] text-secondary font-medium shadow-sm">Logistik Makan</span>
              <span class="bg-surface px-space-sm py-space-2xs rounded text-[13px] text-secondary font-medium shadow-sm">Narasumber Adat</span>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg mb-space-2xl">
            <!-- Kartu 1: Sade -->
            <div class="bg-surface rounded-xl overflow-hidden shadow-sm flex flex-col card-interactive">
              <div class="aspect-[16/10] relative">
                <img class="w-full h-full object-cover" alt="Desa Sade Lombok" src="{{ asset('assets/img/hd/peneliti-sade.jpg') }}"/>
                <span class="absolute top-3 left-3 bg-surface/90 backdrop-blur-sm text-on-surface font-body-sm text-[12px] px-2 py-1 rounded font-medium">
                  Sosio-Antropologi
                </span>
              </div>
              <div class="p-space-lg flex flex-col gap-space-xs flex-1">
                <div class="flex items-center justify-between text-on-surface-variant font-body-sm text-[13px]">
                  <span>Kabupaten Lombok Tengah</span>
                  <span class="text-secondary font-medium">Tersedia 12 Penutur</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Desa Sade &amp; Rembitan</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Fokus kajian tenun ikat pewarna alami, struktur arsitektur anti-gempa lumbung Sasak, dan transmisi dialek lokal.
                </p>
                <div class="mt-auto pt-space-md text-[13px] text-secondary font-medium">
                  Akomodasi: Bale Riset Adat (kapasitas 8 mahasiswa)
                </div>
              </div>
            </div>

            <!-- Kartu 2: Ciptagelar -->
            <div class="bg-surface rounded-xl overflow-hidden shadow-sm flex flex-col card-interactive">
              <div class="aspect-[16/10] relative">
                <img class="w-full h-full object-cover" alt="Kasepuhan Ciptagelar" src="{{ asset('assets/img/hd/peneliti-ciptagelar.jpg') }}"/>
                <span class="absolute top-3 left-3 bg-surface/90 backdrop-blur-sm text-on-surface font-body-sm text-[12px] px-2 py-1 rounded font-medium">
                  Ketahanan Pangan &amp; Ekologi
                </span>
              </div>
              <div class="p-space-lg flex flex-col gap-space-xs flex-1">
                <div class="flex items-center justify-between text-on-surface-variant font-body-sm text-[13px]">
                  <span>Gunung Halimun, Sukabumi</span>
                  <span class="text-secondary font-medium">Tersedia 9 Penutur</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Kasepuhan Ciptagelar</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Kajian bank benih padi lokal berusia 600 tahun, astronomi kalender Sunda Wiwitan, dan sistem transmisi radio komunitas mikro-hidro.
                </p>
                <div class="mt-auto pt-space-md text-[13px] text-secondary font-medium">
                  Akomodasi: Imah Tamu Adat (kapasitas 15 mahasiswa)
                </div>
              </div>
            </div>

            <!-- Kartu 3: Bleberan -->
            <div class="bg-surface rounded-xl overflow-hidden shadow-sm flex flex-col card-interactive">
              <div class="aspect-[16/10] relative">
                <img class="w-full h-full object-cover" alt="Kawasan Karst Bleberan" src="{{ asset('assets/img/hd/peneliti-bleberan.jpg') }}"/>
                <span class="absolute top-3 left-3 bg-surface/90 backdrop-blur-sm text-on-surface font-body-sm text-[12px] px-2 py-1 rounded font-medium">
                  Hidrologi Karst &amp; Agrikultur
                </span>
              </div>
              <div class="p-space-lg flex flex-col gap-space-xs flex-1">
                <div class="flex items-center justify-between text-on-surface-variant font-body-sm text-[13px]">
                  <span>Panggang, Gunungkidul</span>
                  <span class="text-secondary font-medium">Tersedia 14 Penutur</span>
                </div>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Kawasan Karst Bleberan</h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Eksplorasi lorong sungai bawah tanah, ketahanan palawija lahan kering, dan adaptasi sosial mitigasi krisis air musiman.
                </p>
                <div class="mt-auto pt-space-md text-[13px] text-secondary font-medium">
                  Akomodasi: Sanggar Lapangan Bleberan (kapasitas 20 orang)
                </div>
              </div>
            </div>
          </div>

          <!-- Action Panel Form Kontak Peneliti -->
          <div class="bg-surface p-space-2xl rounded-2xl shadow-sm border border-outline-variant/30">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-center">
              <div class="lg:col-span-6 flex flex-col gap-space-sm">
                <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Layanan Konsultasi Proposal</span>
                <h3 class="font-headline-lg text-headline-lg text-on-surface text-2xl md:text-3xl">
                  Siapkan Rencana Penelitian Lapangan
                </h3>
                <p class="font-body-default text-body-default text-on-surface-variant">
                  Diskusikan draf kerangka acuan kerja atau fokus skripsi Anda bersama tim fasilitator kami. Kami membantu mengidentifikasi desa yang paling relevan dengan pertanyaan riset Anda.
                </p>
                <div class="flex flex-col gap-space-xs pt-space-xs font-body-sm text-body-sm text-on-surface-variant">
                  <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-secondary text-[18px]">done</span>
                    <span>Pemeriksaan kelayakan topik tanpa biaya konsultasi awal</span>
                  </div>
                  <div class="flex items-center gap-space-xs">
                    <span class="material-symbols-outlined text-secondary text-[18px]">done</span>
                    <span>Penyediaan surat dukungan pendanaan LPDP / BOPTN / Dikti</span>
                  </div>
                </div>
              </div>
              <div class="lg:col-span-6 bg-surface-container-low p-space-xl rounded-xl">
                <form class="flex flex-col gap-space-md" onsubmit="event.preventDefault(); showToast('Rencana riset diterima. Tim kurator akademik Destinara akan menghubungi via email dalam 24 jam.', 'success'); this.reset();">
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface mb-1" for="nama-peneliti">Nama Peneliti atau Penanggung Jawab</label>
                    <input class="w-full bg-surface text-on-surface px-space-md py-space-sm rounded-lg font-body-sm text-body-sm outline-none focus:ring-1 focus:ring-primary shadow-sm" id="nama-peneliti" placeholder="cth. Dr. Nurul Hidayah, M.A." required="" type="text"/>
                  </div>
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                    <div>
                      <label class="block font-body-sm text-body-sm text-on-surface mb-1" for="institusi-kampus">Universitas / Lembaga</label>
                      <input class="w-full bg-surface text-on-surface px-space-md py-space-sm rounded-lg font-body-sm text-body-sm outline-none focus:ring-1 focus:ring-primary shadow-sm" id="institusi-kampus" placeholder="cth. Universitas Gadjah Mada" required="" type="text"/>
                    </div>
                    <div>
                      <label class="block font-body-sm text-body-sm text-on-surface mb-1" for="jenjang-riset">Jenjang Penelitian</label>
                      <select class="w-full bg-surface text-on-surface px-space-md py-space-sm rounded-lg font-body-sm text-body-sm outline-none focus:ring-1 focus:ring-primary shadow-sm" id="jenjang-riset">
                        <option>Skripsi (S1)</option>
                        <option>Tesis (S2)</option>
                        <option>Disertasi (S3)</option>
                        <option>Riset Hibah Dosen / Mandiri</option>
                      </select>
                    </div>
                  </div>
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface mb-1" for="topik-fokus">Topik atau Pertanyaan Penelitian Utama</label>
                    <textarea class="w-full bg-surface text-on-surface px-space-md py-space-sm rounded-lg font-body-sm text-body-sm outline-none focus:ring-1 focus:ring-primary shadow-sm resize-none" id="topik-fokus" placeholder="Jelaskan ringkas rumusan masalah, disiplin ilmu, dan perkiraan durasi lapangan yang diinginkan..." rows="3"></textarea>
                  </div>
                  <button class="w-full bg-primary-container text-on-primary font-label-action text-label-action py-space-sm rounded-lg hover:bg-primary transition-colors text-center shadow-sm cursor-pointer" type="submit">
                    Kirim Rencana Riset untuk Uji Kelayakan Desa
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>
@endsection
