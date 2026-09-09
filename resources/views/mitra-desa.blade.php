@extends('layouts.app')

@section('title', 'Untuk Pengelola Destinasi — Panduan Bergabung Mitra Desa & Komunitas Adat | Destinara')

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $villageBenefits = $sections['village_benefits'] ?? null;
@endphp
<main class="w-full pt-20 bg-surface">
    <div class="flex flex-col w-full">
      
      @if(!$hero || $hero->is_active)
      <!-- Hero Section -->
      <section class="relative w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
          <div class="lg:col-span-5 flex flex-col items-start pr-0 lg:pr-space-md">
            @if($hero?->badge)
            <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-lg bg-surface-container text-secondary mb-space-md sm:mb-space-lg shadow-sm text-xs sm:text-sm">
              <span class="material-symbols-outlined text-[18px]">nature_people</span>
              <span class="font-body-sm font-medium">{{ $hero->badge }}</span>
            </div>
            @endif
            <h1 class="font-headline-lg text-2xl sm:text-3xl md:text-4xl lg:text-headline-lg text-on-surface mb-space-sm sm:mb-space-md leading-tight">
              {{ $hero?->title ?? 'Buka pintu desa Anda untuk ruang belajar yang menghormati warga' }}
            </h1>
            <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant mb-space-lg sm:mb-space-xl">
              {{ $hero?->subtitle ?? 'Desa bukan tontonan yang riuh dan buru-buru. Bersama Destinara, mari hadirkan rombongan pelajar dan peneliti yang datang dengan niat tulus: mendengarkan petuah sesepuh, belajar merawat bumi, dan menjaga adat istiadat setempat.' }}
            </p>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-sm sm:gap-space-md w-full sm:w-auto">
              <a class="bg-primary-container text-on-primary font-label-action text-label-action px-space-xl py-space-md rounded-lg shadow-md hover:bg-primary transition-colors text-center" href="{{ $hero?->button_link ?? '#formulir-kemitraan' }}">
                {{ $hero?->button_text ?? 'Daftar sebagai Pengelola Destinasi' }}
              </a>
              <a class="bg-surface-container-highest text-secondary font-label-action text-label-action px-space-lg py-space-md rounded-lg hover:bg-surface-container transition-colors inline-flex items-center justify-center gap-space-xs" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\SiteSetting::get('whatsapp', '6281288904411')) }}" rel="noopener noreferrer" target="_blank">
                <span class="material-symbols-outlined text-[20px]">chat</span>
                <span>Tanya lewat WhatsApp</span>
              </a>
            </div>
            <div class="mt-space-md sm:mt-space-lg flex flex-wrap items-center gap-space-sm sm:gap-space-md text-on-surface-variant font-body-sm text-xs sm:text-sm">
              <div class="flex items-center gap-space-2xs">
                <span class="material-symbols-outlined text-secondary text-[18px] sm:text-[20px]">check_circle</span>
                <span>Bebas biaya pendaftaran</span>
              </div>
              <div class="flex items-center gap-space-2xs">
                <span class="material-symbols-outlined text-secondary text-[18px] sm:text-[20px]">check_circle</span>
                <span>Adat warga nomor satu</span>
              </div>
            </div>
          </div>

          <!-- Photo Plate Right Column -->
          <div class="lg:col-span-7 relative">
            <div class="relative rounded-xl overflow-hidden shadow-xl bg-surface-container">
              <img class="w-full h-72 sm:h-[400px] lg:h-[460px] object-cover" alt="{{ $hero?->title ?? 'Tetua desa menyambut tamu' }}" src="{{ $hero?->image_url ?? asset('assets/img/hd/desa-serambi.jpg') }}"/>
              <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/30 to-transparent p-space-md sm:p-space-lg">
                <p class="font-caption-fieldnote text-xs sm:text-caption-fieldnote text-surface italic">
                  {{ $hero?->image_caption ?? 'Sambutan di serambi bale: silaturahmi yang bersahaja sebelum memulai penelusuran tapak.' }}
                </p>
              </div>
            </div>
            <div class="hidden sm:flex absolute -bottom-6 -left-6 bg-surface-container-lowest p-space-md rounded-xl shadow-lg items-center gap-space-md max-w-xs border border-outline-variant/30">
              <div class="w-12 h-12 rounded-lg bg-secondary-container text-secondary flex items-center justify-center flex-shrink-0">
                <span class="material-symbols-outlined text-[26px]">volunteer_activism</span>
              </div>
              <div>
                <p class="font-headline-sm text-headline-sm text-on-surface font-semibold">100%</p>
                <p class="font-body-sm text-body-sm text-on-surface-variant">Penghasilan inap &amp; bimbingan mengalir langsung ke warga</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      <!-- Elder Quote Section -->
      <section class="w-full py-space-2xl bg-surface-container-low my-space-xl">
        <div class="max-w-[1040px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col md:flex-row items-center gap-space-xl bg-surface-container-lowest p-space-xl rounded-xl shadow-md border border-outline-variant/30">
            <div class="w-32 h-32 md:w-40 md:h-40 rounded-xl overflow-hidden flex-shrink-0 shadow-sm">
              <img class="w-full h-full object-cover" alt="Pak Lurah Marto Suwito" src="{{ asset('assets/img/hd/desa-lurah.jpg') }}"/>
            </div>
            <div class="flex-1 flex flex-col">
              <div class="text-tertiary-container mb-space-2xs">
                <span class="material-symbols-outlined text-[36px]">format_quote</span>
              </div>
              <blockquote class="font-headline-md text-headline-md text-on-surface italic font-normal leading-relaxed mb-space-md text-lg md:text-xl">
                “Warga kami tidak butuh keramaian yang menyisakan sampah. Yang membuat hati kami tentram adalah ketika anak-anak sekolah ini duduk bersila di tikar bambu, mencatat tutur leluhur, dan pamit dengan menundukkan kepala sebelum melangkah ke mata air kami.”
              </blockquote>
              <div>
                <p class="font-body-default text-body-default font-semibold text-on-surface">Pak Lurah Marto Suwito</p>
                <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">Tetua Adat &amp; Pengelola Wisata Edukasi Dusun Watu Klopo, Kulon Progo</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Benefits Section: 3 Horizontal Columns -->
      <section class="w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-space-2xl">
          <span class="text-secondary font-label-tag text-label-tag font-semibold">Keuntungan Menjadi Mitra</span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-2xs">
            Bekerja bersama demi ketenteraman kampung
          </h2>
          <p class="font-body-default text-body-default text-on-surface-variant mt-space-xs">
            Kerjasama yang menempatkan kesepakatan warga desa di atas segalanya, dengan tata kelola yang transparan dan bersahaja.
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
          <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-md flex flex-col h-full hover:shadow-lg transition-shadow card-interactive border border-outline-variant/30">
            <div class="w-14 h-14 rounded-lg bg-surface-container text-primary flex items-center justify-center mb-space-lg">
              <span class="material-symbols-outlined text-[32px]">handshake</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              Tamu yang menghargai adat
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              Sebelum berangkat, setiap pelajar dan pengajar diwajibkan mengikuti pembekalan tata krama. Mereka diajarkan berpakaian sopan, mematuhi larangan desa, serta tidak berbicara keras di dekat tempat sakral warga.
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-lg">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                “Bukan rombongan pelancong bising, melainkan tunas muda yang mau menimba ilmu kehidupan.”
              </p>
            </div>
          </div>

          <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-md flex flex-col h-full hover:shadow-lg transition-shadow card-interactive border border-outline-variant/30">
            <div class="w-14 h-14 rounded-lg bg-secondary-container text-secondary flex items-center justify-center mb-space-lg">
              <span class="material-symbols-outlined text-[32px]">payments</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              Pendapatan utuh tanpa perantara
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              Seluruh biaya inap di rumah warga (homestay), hidangan dapur dusun, penyewaan sanggar, hingga honor tetua pembimbing dibayarkan langsung secara utuh tanpa ada potongan komisi sepeser pun dari kami.
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-lg">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                Kas masuk langsung ke kas rukun warga atau keluarga pengasuh rombongan secara terbuka.
              </p>
            </div>
          </div>

          <div class="bg-surface-container-lowest p-space-xl rounded-xl shadow-md flex flex-col h-full hover:shadow-lg transition-shadow card-interactive border border-outline-variant/30">
            <div class="w-14 h-14 rounded-lg bg-tertiary-fixed text-tertiary flex items-center justify-center mb-space-lg">
              <span class="material-symbols-outlined text-[32px]">assignment_turned_in</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              Dokumen &amp; perizinan diurus tuntas
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              Pengelola desa tidak perlu pusing menyiapkan surat menyurat formal. Tim Destinara mengurus seluruh perizinan sekolah, dinas, perlindungan asuransi kesehatan siswa, serta protokol pertolongan pertama di lapangan.
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-lg">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                Warga fokus menjadi tuan rumah yang tenang, urusan administratif diselesaikan Destinara.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Photo Banner Break -->
      <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop my-space-lg">
        <div class="relative rounded-xl overflow-hidden shadow-md h-80 bg-surface-container">
          <img class="w-full h-full object-cover" alt="Pemandangan pedesaan asri di kaki bukit hijau" src="{{ asset('assets/img/hd/desa-bukit.jpg') }}"/>
          <div class="absolute inset-0 bg-gradient-to-r from-inverse-surface/85 via-inverse-surface/50 to-transparent flex items-center p-space-xl md:p-space-2xl">
            <div class="max-w-xl">
              <p class="text-secondary-fixed font-label-tag text-label-tag mb-space-xs">Harmoni Ruang dan Tradisi</p>
              <h3 class="font-headline-lg text-headline-lg text-surface mb-space-sm text-2xl md:text-3xl">
                Kekayaan desa adalah pengetahuan, bukan komoditas sekali pakai
              </h3>
              <p class="font-body-default text-body-default text-surface-container">
                Kami menjaga agar sawah, mata air, dan balai adat Anda tetap tenang seperti sedia kala, seraya memberi manfaat nyata bagi kesejahteraan anak cucu.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- How It Works Section: 4-step Stepper -->
      <section class="w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto">
        <div class="text-center max-w-2xl mx-auto mb-space-2xl">
          <span class="text-secondary font-label-tag text-label-tag font-semibold">Langkah Mudah</span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-2xs">
            Empat langkah sederhana menjadi mitra
          </h2>
          <p class="font-body-default text-body-default text-on-surface-variant mt-space-xs">
            Tanpa formulir rumit atau istilah asing. Cukup obrolan akrab untuk saling mengenal dan memahami kebiasaan desa Anda.
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-lg relative">
          <!-- Step 1 -->
          <div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col border border-outline-variant/30">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold">1</span>
              <span class="material-symbols-outlined text-outline text-[22px]">forum</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">
              Sapa &amp; ceritakan desa
            </h4>
            <p class="font-body-default text-body-default text-on-surface-variant">
              Hubungi kami melalui WhatsApp santai. Ceritakan secara ringkas apa yang ada di desa: sawah terasering, kerajinan tangan, kesenian tutur, atau riwayat sejarah setempat.
            </p>
          </div>
          <!-- Step 2 -->
          <div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col border border-outline-variant/30">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold">2</span>
              <span class="material-symbols-outlined text-outline text-[22px]">cottage</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">
              Kunjungan silaturahmi
            </h4>
            <p class="font-body-default text-body-default text-on-surface-variant">
              Tim Destinara bertamu langsung ke balai desa atau rumah pengelola. Kita duduk bersama, minum teh hangat, dan mendengarkan harapan para sesepuh desa.
            </p>
          </div>
          <!-- Step 3 -->
          <div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col border border-outline-variant/30">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-full bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold">3</span>
              <span class="material-symbols-outlined text-outline text-[22px]">policy</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">
              Sepakati aturan bersama
            </h4>
            <p class="font-body-default text-body-default text-on-surface-variant">
              Warga menentukan sendiri batas zona sakral, jumlah maksimal tamu per kunjungan, serta aturan adat yang pantang dilanggar oleh rombongan pelajar.
            </p>
          </div>
          <!-- Step 4 -->
          <div class="bg-surface-container-lowest p-space-lg rounded-xl shadow-sm flex flex-col border border-outline-variant/30">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center font-headline-sm text-headline-sm text-secondary font-bold">4</span>
              <span class="material-symbols-outlined text-secondary text-[22px]">groups</span>
            </div>
            <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-xs font-semibold">
              Sambut tamu perdana
            </h4>
            <p class="font-body-default text-body-default text-on-surface-variant">
              Rombongan sekolah tiba dengan didampingi fasilitator Destinara. Anda dan warga bertindak sebagai guru kehidupan yang membagikan ilmu dengan bangga.
            </p>
          </div>
        </div>
      </section>

      <!-- Registration Form & FAQ Section -->
      <section class="w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto" id="formulir-kemitraan">
        <div class="bg-surface-container-low rounded-xl p-space-2xl shadow-md border border-outline-variant/30">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl">
            <!-- Left: Form -->
            <div class="lg:col-span-7 bg-surface-container-lowest p-space-xl rounded-xl shadow-sm border border-outline-variant/30">
              <div class="mb-space-lg">
                <span class="text-secondary font-label-tag text-label-tag font-semibold">Formulir Sederhana</span>
                <h3 class="font-headline-md text-headline-md text-on-surface mt-space-2xs">
                  Mulai silaturahmi dengan kami
                </h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-2xs">
                  Isi keterangan singkat di bawah ini. Tim perwakilan kami di Sleman atau Jakarta akan membalas dengan ramah melalui telepon atau pesan WhatsApp.
                </p>
              </div>
              <form class="flex flex-col gap-space-md" id="mitraForm">
                <div>
                  <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="namaLengkap">
                    Nama Lengkap Anda
                  </label>
                  <input class="w-full px-space-md py-space-sm rounded-lg bg-surface-container-lowest text-on-surface font-body-default text-body-default focus:outline-none focus:ring-2 focus:ring-primary shadow-sm border border-outline-variant/30" id="namaLengkap" placeholder="Contoh: Pak Budi Santoso" required="" type="text"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="nomorHp">
                      Nomor WhatsApp yang Aktif
                    </label>
                    <input class="w-full px-space-md py-space-sm rounded-lg bg-surface-container-lowest text-on-surface font-body-default text-body-default focus:outline-none focus:ring-2 focus:ring-primary shadow-sm border border-outline-variant/30" id="nomorHp" placeholder="Contoh: 0812 3456 7890" required="" type="tel"/>
                  </div>
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="peranWarga">
                      Peran di Desa
                    </label>
                    <select class="w-full px-space-md py-space-sm rounded-lg bg-surface-container-lowest text-on-surface font-body-default text-body-default focus:outline-none focus:ring-2 focus:ring-primary shadow-sm border border-outline-variant/30" id="peranWarga">
                      <option value="pengurus-pokdarwis">Pengurus Pokdarwis / Desa Wisata</option>
                      <option value="aparatur-desa">Kepala Desa / Perangkat Desa</option>
                      <option value="tetua-adat">Tokoh Masyarakat / Tetua Adat</option>
                      <option value="warga-perseorangan">Warga / Pemilik Homestay</option>
                    </select>
                  </div>
                </div>
                <div>
                  <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="lokasiDesa">
                    Nama Dusun, Desa, dan Kabupaten
                  </label>
                  <input class="w-full px-space-md py-space-sm rounded-lg bg-surface-container-lowest text-on-surface font-body-default text-body-default focus:outline-none focus:ring-2 focus:ring-primary shadow-sm border border-outline-variant/30" id="lokasiDesa" placeholder="Contoh: Dusun Watu Klopo, Desa Pendoworejo, Kulon Progo" required="" type="text"/>
                </div>
                <div>
                  <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="kegiatanKhas">
                    Hal yang bisa dipelajari oleh siswa di desa Anda
                  </label>
                  <textarea class="w-full px-space-md py-space-sm rounded-lg bg-surface-container-lowest text-on-surface font-body-default text-body-default focus:outline-none focus:ring-2 focus:ring-primary shadow-sm border border-outline-variant/30 resize-none" id="kegiatanKhas" placeholder="Ceritakan singkat: misal bertani padi organik, membatik pewarna alami, gamelan, atau belajar merawat hutan adat..." rows="3"></textarea>
                </div>
                <button class="bg-primary-container text-on-primary font-label-action text-label-action px-space-xl py-space-md rounded-lg shadow-md hover:bg-primary transition-colors text-center cursor-pointer mt-space-xs" type="submit">
                  Kirimkan Keterangan Desa Kami
                </button>
              </form>
            </div>

            <!-- Right: FAQ -->
            <div class="lg:col-span-5 flex flex-col justify-between">
              <div>
                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-md font-semibold">
                  Pertanyaan yang sering diajukan warga
                </h4>
                <div class="flex flex-col gap-space-md">
                  <div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm border border-outline-variant/30">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      Apakah rumah warga harus mewah?
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      Sama sekali tidak. Rumah bambu atau kayu yang bersih, kasur beralas seprai rapi, dan kamar mandi higienis dengan air jernih sudah sangat memadai bagi kegiatan belajar santun ini.
                    </p>
                  </div>
                  <div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm border border-outline-variant/30">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      Berapa jumlah rombongan yang datang?
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      Kami membatasi kelompok kecil (biasanya 15 hingga 30 siswa) agar tidak membebani daya tampung desa dan tidak mengganggu ketenangan tetangga sekitar.
                    </p>
                  </div>
                  <div class="bg-surface-container-lowest p-space-md rounded-lg shadow-sm border border-outline-variant/30">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      Bagaimana jika ada aturan tabu di desa?
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      Aturan adat Anda mutlak dihormati. Batasan tersebut dicantumkan dalam buku panduan siswa dan fasilitator kami akan mengawal langsung selama kegiatan berjalan.
                    </p>
                  </div>
                </div>
              </div>

              <div class="mt-space-lg p-space-md bg-surface-container rounded-lg border border-outline-variant/30">
                <div class="flex items-center gap-space-sm">
                  <span class="material-symbols-outlined text-secondary text-[24px]">support_agent</span>
                  <div>
                    <p class="font-body-sm text-body-sm font-semibold text-on-surface">Lebih nyaman berbicara langsung?</p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Hubungi Mas Bayu di +62 812-8890-4411</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Big Full-width Warm CTA Section -->
      <section class="w-full bg-surface-container py-space-4xl px-gutter-mobile md:px-gutter-desktop mt-space-2xl">
        <div class="max-w-[840px] mx-auto text-center flex flex-col items-center">
          <div class="w-16 h-16 rounded-full bg-surface-container-lowest flex items-center justify-center text-primary mb-space-md shadow-sm">
            <span class="material-symbols-outlined text-[32px]">door_front</span>
          </div>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mb-space-md text-2xl md:text-3xl lg:text-headline-lg">
            Mari bersama-sama menjaga marwah dan kelestarian tanah leluhur
          </h2>
          <p class="font-body-lead text-body-lead text-on-surface-variant mb-space-2xl max-w-2xl">
            Bimbing generasi penerus bangsa untuk mengerti arti gotong royong, menghargai pangan dari tanah sendiri, dan memuliakan petuah tetua desa Anda.
          </p>
          <div class="flex flex-col sm:flex-row items-center justify-center gap-space-md w-full sm:w-auto">
            <a class="w-full sm:w-auto bg-primary-container text-on-primary font-label-action text-label-action px-space-2xl py-space-md rounded-lg shadow-lg hover:bg-primary transition-colors text-center" href="#formulir-kemitraan">
              Daftar sebagai Pengelola Destinasi
            </a>
            <a class="w-full sm:w-auto bg-surface-container-lowest text-secondary font-label-action text-label-action px-space-xl py-space-md rounded-lg shadow-sm hover:bg-surface transition-colors inline-flex items-center justify-center gap-space-xs" href="https://wa.me/6281288904411" rel="noopener noreferrer" target="_blank">
              <span class="material-symbols-outlined text-[20px]">chat</span>
              <span>Tanya Lewat WhatsApp</span>
            </a>
          </div>
          <p class="font-caption-fieldnote text-caption-fieldnote text-on-surface-variant italic mt-space-lg">
            Pendampingan ramah lapangan oleh narahubung lokal Destinara di Daerah Istimewa Yogyakarta, Jawa Tengah, Jawa Barat, dan Bali.
          </p>
        </div>
      </section>

    </div>
  </main>
@endsection
