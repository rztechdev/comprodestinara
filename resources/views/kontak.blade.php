@extends('layouts.app')

@section('title', 'Kontak &amp; Kemitraan — Ruang Musyawarah &amp; Konsultasi Terbuka Destinara')

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $officeHours = $sections['office_hours'] ?? null;
@endphp
<main class="w-full pt-20 bg-surface">
    <div class="flex flex-col w-full">

      <!-- 1. Header Section -->
      <section class="w-full bg-surface-container-low/60 py-space-2xl md:py-space-3xl px-gutter-mobile md:px-gutter-desktop border-b border-outline-variant/30">
        <div class="max-w-[1280px] mx-auto flex flex-col gap-space-sm md:gap-space-md">
          <div class="inline-flex items-center gap-space-xs text-secondary font-label-tag text-label-tag">
            <span class="w-2 h-2 rounded-full bg-secondary"></span>
            <span>{{ $hero?->badge ?? 'Ruang Musyawarah & Konsultasi Terbuka' }}</span>
          </div>
          <h1 class="font-display-hero text-3xl sm:text-4xl md:text-display-hero text-on-surface tracking-tight">{{ $hero?->title ?? 'Hubungi Kami' }}</h1>
          <p class="font-body-lead text-body-default md:text-body-lead text-on-surface-variant max-w-3xl leading-relaxed">
            {{ $hero?->subtitle ?? 'Pintu dialog Destinara terbuka bagi pimpinan sekolah, dosen perancang riset, dan pegiat desa yang hendak merumuskan agenda pembelajaran kontekstual di tapak lokal Nusantara.' }}
          </p>
        </div>
      </section>

      <!-- 2. Form & Direct Contact Info Grid -->
      <section class="w-full py-space-2xl md:py-space-3xl px-gutter-mobile md:px-gutter-desktop">
        <div class="max-w-[1280px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-space-xl lg:gap-space-2xl items-start">
          
          <!-- Kolom Kiri: Formulir Konsultasi Lega -->
          <div class="lg:col-span-6 bg-surface-container-lowest p-space-lg sm:p-space-xl md:p-space-2xl rounded-xl shadow-sm border border-outline-variant/30 flex flex-col gap-space-lg md:gap-space-xl">
            <div class="flex flex-col gap-space-xs">
              <h2 class="font-headline-md text-headline-md text-on-surface">Formulir Penjajakan Agenda</h2>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                Sampaikan rincian rencana kegiatan Anda. Fasilitator kami akan menelaah kecocokan kurikulum dan kesiapan desa mitra dalam 1x24 jam kerja.
              </p>
            </div>

            <form class="flex flex-col gap-space-md md:gap-space-lg" id="form-konsultasi" action="{{ route('contact.send') }}" method="POST">
              @csrf
              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="full-name">
                  Nama Lengkap Pemohon <span class="text-primary">*</span>
                </label>
                <input class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-lg placeholder:text-outline border border-transparent focus:border-primary focus:outline-none focus:bg-surface-container-lowest transition-colors shadow-inner" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="cth. Prof. Hendrawan Danubroto, M.Hum." required type="text"/>
              </div>

              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="institution">
                  Asal Sekolah, Kampus, atau Komunitas <span class="text-primary">*</span>
                </label>
                <input class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-lg placeholder:text-outline border border-transparent focus:border-primary focus:outline-none focus:bg-surface-container-lowest transition-colors shadow-inner" id="institution" name="institution" value="{{ old('institution') }}" placeholder="cth. SMA Kolese De Britto / Departemen Antropologi UGM" required type="text"/>
              </div>

              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="whatsapp">
                  Nomor WhatsApp Aktif <span class="text-primary">*</span>
                </label>
                <input class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-lg placeholder:text-outline border border-transparent focus:border-primary focus:outline-none focus:bg-surface-container-lowest transition-colors shadow-inner" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="+62 812-xxxx-xxxx (untuk koordinasi cepat)" required type="tel"/>
              </div>

              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="topic">
                  Rencana Kebutuhan Program
                </label>
                <select class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-lg border border-transparent focus:border-primary focus:outline-none focus:bg-surface-container-lowest transition-colors shadow-inner" id="topic" name="topic">
                  <option value="sekolah">Ekskursi &amp; Live-in Siswa Sekolah Menengah</option>
                  <option value="riset">Kuliah Kerja Lapangan &amp; Riset Komunitas Akademik</option>
                  <option value="desa">Penjajakan Mitra Desa &amp; Sanggar Baru</option>
                  <option value="kurikulum">Penyusunan Modul Lapangan Berbasis Muatan Lokal</option>
                  <option value="lainnya">Kunjungan Khusus / Diskusi Terfokus Lainnya</option>
                </select>
              </div>

              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="notes">
                  Catatan Rombongan &amp; Gambaran Harapan
                </label>
                <textarea class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-lg placeholder:text-outline border border-transparent focus:border-primary focus:outline-none focus:bg-surface-container-lowest transition-colors shadow-inner resize-y" id="notes" name="notes" placeholder="Tuliskan perkiraan jumlah peserta, rentang usia, usulan tanggal keberangkatan, atau capaian kompetensi yang dikehendaki." rows="4"></textarea>
              </div>

              <div class="bg-surface-container p-space-md rounded-lg flex items-start gap-space-sm border border-outline-variant/20">
                <span class="material-symbols-outlined text-secondary text-[22px] flex-shrink-0 mt-0.5">verified_user</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  Semua usulan kegiatan diselaraskan dengan asas FPIC (Persetujuan Awal Berbasis Informasi) desa penerima demi menjaga kenyamanan warga dan kesakralan ruang adat.
                </p>
              </div>

              <button class="w-full bg-primary-container text-on-primary font-label-action text-label-action py-space-md px-space-xl rounded-lg hover:bg-primary transition-all flex items-center justify-center gap-space-xs shadow-md active:translate-y-0.5" type="submit">
                <span class="material-symbols-outlined text-[20px]">outgoing_mail</span>
                <span>Kirim Pesan ke Tim Destinara</span>
              </button>
            </form>

            <div class="hidden p-space-md bg-secondary-container text-on-secondary-fixed rounded-lg flex items-center gap-space-sm border border-secondary/30" id="confirm-box">
              <span class="material-symbols-outlined text-secondary text-[24px]">check_circle</span>
              <p class="font-body-sm text-body-sm">
                Pesan terkirim. Narahubung kurikulum kami akan menyapa WhatsApp Anda sesaat lagi.
              </p>
            </div>
          </div>

          <!-- Kolom Kanan: Info Kontak Langsung, Sanggar Yogyakarta, Ruang Jakarta -->
          <div class="lg:col-span-6 flex flex-col gap-space-xl">
            
            <!-- Kartu Narahubung WhatsApp Cepat -->
            <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm border border-outline-variant/30 flex flex-col gap-space-md hover:border-outline-variant transition-colors">
              <div class="flex items-center justify-between">
                <span class="inline-flex items-center gap-space-xs font-label-tag text-label-tag text-secondary">
                  <span class="material-symbols-outlined text-[18px]">bolt</span>
                  Respons Cepat Pendampingan
                </span>
                <span class="font-caption-fieldnote text-caption-fieldnote italic text-on-surface-variant">Senin – Sabtu, 08.00–17.00 WIB</span>
              </div>
              <div class="flex flex-col gap-space-2xs">
                <span class="font-body-sm text-body-sm text-on-surface-variant">Saluran Langsung WhatsApp Tim Kurikulum</span>
                <a class="font-headline-md text-2xl md:text-[28px] leading-[36px] font-semibold text-primary hover:text-primary-container transition-colors tracking-tight" href="https://wa.me/6281288904411" rel="noopener" target="_blank">
                  +62 812-8890-4411
                </a>
              </div>
              <div class="flex flex-wrap items-center gap-space-md pt-space-xs">
                <a class="inline-flex items-center gap-space-xs bg-secondary text-on-secondary px-space-lg py-space-sm rounded-lg font-label-action text-label-action hover:opacity-90 transition-opacity shadow-sm" href="https://wa.me/6281288904411" rel="noopener" target="_blank">
                  <span class="material-symbols-outlined text-[20px]">chat</span>
                  <span>Buka Percakapan WhatsApp</span>
                </a>
                <span class="font-body-sm text-body-sm text-on-surface-variant">Rerata tanggapan di bawah 15 menit</span>
              </div>
            </div>

            <!-- Surel Resmi & Dokumen Formal -->
            <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm border border-outline-variant/30 flex flex-col gap-space-sm hover:border-outline-variant transition-colors">
              <div class="flex items-center gap-space-xs text-on-surface-variant">
                <span class="material-symbols-outlined text-primary text-[20px]">mark_email_read</span>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">Surel Resmi Kemitraan &amp; Riset</h3>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                Untuk pengiriman Term of Reference (TOR), proposal riset sivitas akademika, nota kesepahaman (MoU), atau surat kedinasan:
              </p>
              <div class="p-space-md bg-surface-container-low rounded-lg flex items-center justify-between border border-outline-variant/20">
                <span class="font-label-action text-label-action text-primary select-all">kemitraan@destinara.id</span>
                <a class="text-secondary hover:text-primary text-body-sm font-label-action flex items-center gap-space-2xs transition-colors" href="mailto:kemitraan@destinara.id">
                  <span class="material-symbols-outlined text-[18px]">mail</span>
                  Tulis Surel
                </a>
              </div>
            </div>

            <!-- Sanggar Lapangan Yogyakarta dengan Foto/Peta -->
            <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm border border-outline-variant/30 flex flex-col gap-space-md hover:border-outline-variant transition-colors">
              <div class="flex items-start justify-between">
                <div class="flex flex-col">
                  <div class="inline-flex items-center gap-space-2xs text-secondary font-label-tag text-label-tag">
                    <span class="material-symbols-outlined text-[16px]">cottage</span>
                    <span>Pusat Riset Lapangan &amp; Laboratorium Desa</span>
                  </div>
                  <h3 class="font-headline-sm text-headline-sm text-on-surface">Sanggar Lapangan Sleman, Yogyakarta</h3>
                </div>
                <span class="px-space-sm py-space-2xs bg-surface-container text-on-surface-variant rounded font-label-tag text-label-tag">Pusat Lapang</span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                Jl. Palagan Tentara Pelajar Km. 9, Sinduharjo, Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581.
              </p>
              <div class="flex items-center gap-space-xs text-on-surface-variant font-caption-fieldnote text-caption-fieldnote italic">
                <span class="material-symbols-outlined text-[18px] text-tertiary">schedule</span>
                <span>Jam temu pendampingan dosen &amp; guru: Selasa – Sabtu, 09.00 – 16.00 WIB (diharapkan konfirmasi)</span>
              </div>
              
              <!-- Foto Sanggar & Penanda Lokasi -->
              <div class="w-full h-52 rounded-xl bg-cover bg-center relative overflow-hidden shadow-inner flex items-end p-space-md" data-location="Jl. Palagan Tentara Pelajar Km 9 Sleman Yogyakarta" style="background-image: url('{{ asset('assets/img/hd/contact-map.jpg') }}')">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                <div class="relative z-10 bg-surface-container-lowest/90 backdrop-blur-sm px-space-md py-space-xs rounded-lg shadow-sm flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-primary text-[18px]">location_on</span>
                  <span class="font-body-sm text-body-sm font-medium text-on-surface">Peta Sanggar Tapak Lereng Merapi</span>
                </div>
              </div>
            </div>

            <!-- Ruang Dialog Jakarta -->
            <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-sm border border-outline-variant/30 flex flex-col gap-space-sm hover:border-outline-variant transition-colors">
              <div class="flex items-start justify-between">
                <div class="flex flex-col">
                  <div class="inline-flex items-center gap-space-2xs text-secondary font-label-tag text-label-tag">
                    <span class="material-symbols-outlined text-[16px]">apartment</span>
                    <span>Sekretariat Administrasi &amp; Penyelarasan Kurikulum</span>
                  </div>
                  <h3 class="font-headline-sm text-headline-sm text-on-surface">Ruang Dialog Menteng, Jakarta Pusat</h3>
                </div>
                <span class="px-space-sm py-space-2xs bg-surface-container text-on-surface-variant rounded font-label-tag text-label-tag">Kemitraan</span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                Kawasan Cikini Raya No. 42 / Jl. Teuku Umar No. 12, Menteng, Jakarta Pusat 10330.
              </p>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                Tersedia untuk temu diskusi formal yayasan pendidikan, penandatanganan kesepakatan (MoU), dan peninjauan monograf desa (berdasarkan janji temu terlebih dahulu).
              </p>
            </div>

          </div>
        </div>
      </section>

      <!-- 3. Section Komitmen Etika Nusantara -->
      <section class="w-full bg-surface-container px-gutter-mobile md:px-gutter-desktop py-space-2xl md:py-space-3xl mt-space-xl border-t border-outline-variant/30">
        <div class="max-w-[1280px] mx-auto">
          <div class="text-center max-w-2xl mx-auto mb-space-xl">
            <span class="text-secondary font-label-tag text-label-tag tracking-wider uppercase">Nilai Musyawarah</span>
            <h3 class="font-headline-md text-headline-md text-on-surface mt-space-2xs">Tiga Pilar Etika Kemitraan Lapangan</h3>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg md:gap-space-xl items-stretch">
            <div class="flex flex-col gap-space-xs p-space-lg bg-surface-container-lowest/80 rounded-xl border border-outline-variant/30 shadow-sm">
              <div class="w-12 h-12 rounded-lg bg-secondary/10 flex items-center justify-center mb-space-xs">
                <span class="material-symbols-outlined text-secondary text-[28px]">nature_people</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface">Menjaga Kedaulatan Warga</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Setiap kunjungan belajar memprioritaskan privasi ruang hidup masyarakat desa serta hak mutlak warga untuk menolak dokumentasi yang bersifat sakral.
              </p>
            </div>

            <div class="flex flex-col gap-space-xs p-space-lg bg-surface-container-lowest/80 rounded-xl border border-outline-variant/30 shadow-sm">
              <div class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center mb-space-xs">
                <span class="material-symbols-outlined text-primary text-[28px]">local_library</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface">Pewarisan Makna yang Sahih</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Narasumber lapangan merupakan sesepuh, empu kriya, dan petani penjaga benih lokal yang dihormati secara sah oleh pranata adat dan komunitasnya.
              </p>
            </div>

            <div class="flex flex-col gap-space-xs p-space-lg bg-surface-container-lowest/80 rounded-xl border border-outline-variant/30 shadow-sm">
              <div class="w-12 h-12 rounded-lg bg-tertiary/10 flex items-center justify-center mb-space-xs">
                <span class="material-symbols-outlined text-tertiary text-[28px]">account_balance_wallet</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface">Keadilan Nilai Ekonomi</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                Mayoritas alokasi biaya penyelenggaraan disalurkan langsung pada kas paguyuban desa, konsumsi berbasis pangan kebun warga, dan pelestarian alam tapak.
              </p>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>
@endsection
