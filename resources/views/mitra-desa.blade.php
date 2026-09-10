@extends('layouts.app')

@section('title', 'Mitra Desa — Panduan Bergabung Pengelola Destinasi & Komunitas Adat | Destinara')
@section('meta_description', 'Buka pintu desa Anda untuk program edukasi dan riset yang menghormati adat warga. 100% manfaat langsung ke masyarakat desa tanpa potongan calo bersama Destinara.')
@section('meta_keywords', 'mitra desa wisata, kemitraan desa adat, homestay desa nusantara, pemberdayaan warga desa, wisata edukasi desa, kearifan lokal desa, daftar mitra destinara')
@section('og_image', asset('assets/img/hd/desa-serambi.jpg'))

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
      "name": "Layanan",
      "item": "{{ url('/') }}#navigation"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "Mitra Desa",
      "item": "{{ route('for-villages') }}"
    }
  ]
}
</script>
@endpush

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $villageBenefits = $sections['village_benefits'] ?? null;
@endphp
<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
    <div class="flex flex-col w-full">
      
      @if(!$hero || $hero->is_active)
      <!-- Hero Section -->
      <section class="relative w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
          <div class="lg:col-span-7 flex flex-col items-start pr-0 lg:pr-6">
            @if($hero?->badge)
            <div class="inline-flex items-center gap-space-xs px-space-md py-space-xs rounded-none bg-surface-container text-secondary mb-space-md sm:mb-space-lg border border-outline-variant/40 text-xs sm:text-sm">
              <span class="material-symbols-outlined text-[18px]">nature_people</span>
              <span class="font-body-sm font-medium">{{ $hero->badge }}</span>
            </div>
            @endif
            <h1 class="font-headline-lg text-2xl sm:text-3xl md:text-4xl lg:text-headline-lg text-on-surface mb-space-sm sm:mb-space-md leading-tight">
              {{ $hero?->title ?? 'Buka pintu desa Anda untuk ruang belajar yang menghormati warga' }}
            </h1>
            <p class="font-body-default text-sm sm:text-body-default text-on-surface-variant mb-space-lg sm:mb-space-xl max-w-2xl">
              {{ $hero?->subtitle ?? 'Desa bukan tontonan yang riuh dan buru-buru. Bersama Destinara, mari hadirkan rombongan pelajar dan peneliti yang datang dengan niat tulus: mendengarkan petuah sesepuh, belajar merawat bumi, dan menjaga adat istiadat setempat.' }}
            </p>
            <div class="flex flex-col sm:flex-row flex-wrap items-stretch sm:items-center gap-3 sm:gap-space-md w-full sm:w-auto">
              <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center text-center whitespace-nowrap" href="{{ $hero?->button_link ?? '#formulir-kemitraan' }}">
                {{ $hero?->button_text ?? 'Daftar sebagai Pengelola Destinasi' }}
              </a>
              <a class="rgs-btn rgs-btn-outline rounded-none inline-flex items-center justify-center gap-space-xs whitespace-nowrap" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_ryan', '6285774410978') }}?text={{ urlencode('Halo Ryan, kami pengelola desa ingin menanyakan kemitraan tapak Destinara.') }}" rel="noopener noreferrer" target="_blank">
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
          <div class="lg:col-span-5">
            <div class="rounded-none overflow-hidden border border-outline-variant/40 bg-surface-container shadow-none">
              <div class="relative">
                <img class="w-full h-64 sm:h-[300px] lg:h-[340px] object-cover" alt="{{ $hero?->title ?? 'Tetua desa menyambut tamu' }}" src="{{ $hero?->image_url ?? asset('assets/img/hd/desa-serambi.jpg') }}"/>
                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-inverse-surface/80 via-inverse-surface/30 to-transparent p-space-md sm:p-space-lg">
                  <p class="font-caption-fieldnote text-xs sm:text-caption-fieldnote text-surface italic">
                    {{ $hero?->image_caption ?? 'Sambutan di serambi bale: silaturahmi yang bersahaja sebelum memulai penelusuran tapak.' }}
                  </p>
                </div>
              </div>

              <!-- Nilai Manfaat Warga (Terintegrasi rapi di bawah foto, bebas tabrakan) -->
              <div class="p-space-md sm:p-space-lg bg-surface-container-lowest border-t border-outline-variant/40 flex items-center gap-space-md">
                <div class="w-12 h-12 rounded-none bg-secondary-container text-secondary flex items-center justify-center flex-shrink-0">
                  <span class="material-symbols-outlined text-[26px]">volunteer_activism</span>
                </div>
                <div>
                  <p class="font-headline-sm text-lg sm:text-headline-sm text-on-surface font-semibold leading-tight">100% Manfaat Langsung</p>
                  <p class="font-body-sm text-xs sm:text-body-sm text-on-surface-variant leading-relaxed">Penghasilan inap &amp; bimbingan mengalir langsung ke warga tanpa potongan calo.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      @endif

      <!-- Elder Quote Section (Plinth Architectural Style) -->
      <section class="w-full py-space-2xl bg-surface-container-low my-space-xl border-t border-b border-outline-variant/30">
        <div class="max-w-[1040px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="flex flex-col md:flex-row items-center gap-space-xl bg-surface-container-lowest p-space-xl rounded-none border-l-4 border-l-[#8C5151] border-t border-r border-b border-outline-variant/30 shadow-none">
            <div class="w-32 h-32 md:w-40 md:h-40 rounded-none overflow-hidden flex-shrink-0 border border-outline-variant/30 shadow-none">
              <img class="w-full h-full object-cover" alt="Pak Lurah Marto Suwito" src="{{ asset('assets/img/hd/desa-lurah.jpg') }}"/>
            </div>
            <div class="flex-1 flex flex-col">
              <div class="text-tertiary-container mb-space-2xs">
                <span class="material-symbols-outlined text-[36px]">format_quote</span>
              </div>
              <blockquote class="font-headline-md text-headline-md text-on-surface italic font-normal leading-relaxed mb-space-md text-lg md:text-xl font-serif">
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

      <!-- Benefits Section: 3 Unboxed Cards with Bottom Demarcation Lines -->
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
        <div class="grid grid-cols-1 md:grid-cols-3 gap-space-xl">
          <div class="rgs-card-alt group flex flex-col h-full pt-5 pb-5">
            <div class="w-14 h-14 rounded-none bg-surface-container text-primary flex items-center justify-center mb-space-lg border border-outline-variant/30">
              <span class="material-symbols-outlined text-[32px]">handshake</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              Tamu yang menghargai adat
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              Sebelum berangkat, setiap pelajar dan pengajar diwajibkan mengikuti pembekalan tata krama. Mereka diajarkan berpakaian sopan, mematuhi larangan desa, serta tidak berbicara keras di dekat tempat sakral warga.
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-none border-l-2 border-l-secondary">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                “Bukan rombongan pelancong bising, melainkan tunas muda yang mau menimba ilmu kehidupan.”
              </p>
            </div>
          </div>

          <div class="rgs-card-alt group flex flex-col h-full pt-5 pb-5">
            <div class="w-14 h-14 rounded-none bg-secondary-container text-secondary flex items-center justify-center mb-space-lg border border-outline-variant/30">
              <span class="material-symbols-outlined text-[32px]">payments</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              Pendapatan utuh tanpa perantara
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              Seluruh biaya inap di rumah warga (homestay), hidangan dapur dusun, penyewaan sanggar, hingga honor tetua pembimbing dibayarkan langsung secara utuh tanpa ada potongan komisi sepeser pun dari kami.
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-none border-l-2 border-l-secondary">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                Kas masuk langsung ke kas rukun warga atau keluarga pengasuh rombongan secara terbuka.
              </p>
            </div>
          </div>

          <div class="rgs-card-alt group flex flex-col h-full pt-5 pb-5">
            <div class="w-14 h-14 rounded-none bg-tertiary-fixed text-tertiary flex items-center justify-center mb-space-lg border border-outline-variant/30">
              <span class="material-symbols-outlined text-[32px]">assignment_turned_in</span>
            </div>
            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-space-sm font-semibold">
              Dokumen &amp; perizinan diurus tuntas
            </h3>
            <p class="font-body-default text-body-default text-on-surface-variant mb-space-md flex-1">
              Pengelola desa tidak perlu pusing menyiapkan surat menyurat formal. Tim Destinara mengurus seluruh perizinan sekolah, dinas, perlindungan asuransi kesehatan siswa, serta protokol pertolongan pertama di lapangan.
            </p>
            <div class="pt-space-md bg-surface-container-low p-space-md rounded-none border-l-2 border-l-secondary">
              <p class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">
                Warga fokus menjadi tuan rumah yang tenang, urusan administratif diselesaikan Destinara.
              </p>
            </div>
          </div>
        </div>
      </section>

      <!-- Photo Banner Break -->
      <section class="w-full max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop my-space-lg">
        <div class="relative rounded-none overflow-hidden border border-outline-variant/30 h-80 bg-surface-container shadow-none">
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

      <!-- How It Works Section: 4-step Stepper with Bottom Demarcation -->
      <section class="w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto border-b border-outline-variant/30">
        <div class="text-center max-w-2xl mx-auto mb-space-2xl">
          <span class="text-secondary font-label-tag text-label-tag font-semibold">Langkah Mudah</span>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mt-space-2xs">
            Empat langkah sederhana menjadi mitra
          </h2>
          <p class="font-body-default text-body-default text-on-surface-variant mt-space-xs">
            Tanpa formulir rumit atau istilah asing. Cukup obrolan akrab untuk saling mengenal dan memahami kebiasaan desa Anda.
          </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-space-xl relative">
          <!-- Step 1 -->
          <div class="rgs-card-alt group flex flex-col pt-4 pb-4">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-none bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold border border-outline-variant/30 font-serif">1</span>
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
          <div class="rgs-card-alt group flex flex-col pt-4 pb-4">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-none bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold border border-outline-variant/30 font-serif">2</span>
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
          <div class="rgs-card-alt group flex flex-col pt-4 pb-4">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-none bg-surface-container flex items-center justify-center font-headline-sm text-headline-sm text-primary font-bold border border-outline-variant/30 font-serif">3</span>
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
          <div class="rgs-card-alt group flex flex-col pt-4 pb-4">
            <div class="flex items-center justify-between mb-space-md">
              <span class="w-10 h-10 rounded-none bg-secondary-container flex items-center justify-center font-headline-sm text-headline-sm text-secondary font-bold border border-outline-variant/30 font-serif">4</span>
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

      <!-- Registration Form & FAQ Section (Architectural Plinth Style) -->
      <section class="w-full py-space-3xl px-gutter-mobile md:px-gutter-desktop max-w-[1280px] mx-auto" id="formulir-kemitraan">
        <div class="bg-surface-container-low rounded-none p-space-xl lg:p-space-2xl border-t border-b border-outline-variant/30 shadow-none">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl">
            <!-- Left: Form -->
            <div class="lg:col-span-7 bg-surface p-space-xl rounded-none border-l-4 border-l-primary border-t border-r border-b border-outline-variant/30 shadow-none">
              <div class="mb-space-lg">
                <span class="text-secondary font-label-tag text-label-tag font-semibold">Formulir Sederhana</span>
                <h3 class="font-headline-md text-headline-md text-on-surface mt-space-2xs">
                  Mulai silaturahmi dengan kami
                </h3>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-space-2xs">
                  Isi keterangan singkat di bawah ini. Tim perwakilan kami di Sleman atau Jakarta akan membalas dengan ramah melalui telepon atau pesan WhatsApp.
                </p>
              </div>
              <form class="flex flex-col gap-space-md" id="mitraForm" onsubmit="event.preventDefault(); showToast('Keterangan desa diterima. Tim narahubung Destinara akan segera bersilaturahmi.', 'success'); this.reset();">
                <div>
                  <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="namaLengkap">
                    Nama Lengkap Anda
                  </label>
                  <input class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40" id="namaLengkap" placeholder="Contoh: Pak Budi Santoso" required="" type="text"/>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-space-md">
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="nomorHp">
                      Nomor WhatsApp yang Aktif
                    </label>
                    <input class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40" id="nomorHp" placeholder="Contoh: 0812 3456 7890" required="" type="tel"/>
                  </div>
                  <div>
                    <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="peranWarga">
                      Peran di Desa
                    </label>
                    <select class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40" id="peranWarga">
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
                  <input class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40" id="lokasiDesa" placeholder="Contoh: Dusun Watu Klopo, Desa Pendoworejo, Kulon Progo" required="" type="text"/>
                </div>
                <div>
                  <label class="block font-body-sm text-body-sm text-on-surface font-medium mb-space-2xs" for="kegiatanKhas">
                    Hal yang bisa dipelajari oleh siswa di desa Anda
                  </label>
                  <textarea class="w-full px-space-md py-space-sm rounded-none bg-surface text-on-surface font-body-default text-body-default focus:outline-none focus:border-primary shadow-none border border-outline-variant/40 resize-none" id="kegiatanKhas" placeholder="Ceritakan singkat: misal bertani padi organik, membatik pewarna alami, gamelan, atau belajar merawat hutan adat..." rows="3"></textarea>
                </div>
                <button class="rgs-btn rgs-btn-primary rounded-none w-full text-center py-space-sm cursor-pointer mt-space-xs" type="submit">
                  Kirimkan Keterangan Desa Kami
                </button>
              </form>
            </div>

            <!-- Right: FAQ -->
            <div class="lg:col-span-5 flex flex-col justify-between gap-space-lg">
              <div>
                <h4 class="font-headline-sm text-headline-sm text-on-surface mb-space-md font-semibold">
                  Pertanyaan yang sering diajukan warga
                </h4>
                <div class="flex flex-col gap-space-md">
                  <div class="bg-surface p-space-md rounded-none border-b-2 border-[#8C5151]/25 hover:border-[#8C5151] transition-colors">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      Apakah rumah warga harus mewah?
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      Sama sekali tidak. Rumah bambu atau kayu yang bersih, kasur beralas seprai rapi, dan kamar mandi higienis dengan air jernih sudah sangat memadai bagi kegiatan belajar santun ini.
                    </p>
                  </div>
                  <div class="bg-surface p-space-md rounded-none border-b-2 border-[#8C5151]/25 hover:border-[#8C5151] transition-colors">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      Berapa jumlah rombongan yang datang?
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      Kami membatasi kelompok kecil (biasanya 15 hingga 30 siswa) agar tidak membebani daya tampung desa dan tidak mengganggu ketenangan tetangga sekitar.
                    </p>
                  </div>
                  <div class="bg-surface p-space-md rounded-none border-b-2 border-[#8C5151]/25 hover:border-[#8C5151] transition-colors">
                    <p class="font-body-default text-body-default font-semibold text-on-surface mb-space-2xs">
                      Bagaimana jika ada aturan tabu di desa?
                    </p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      Aturan adat Anda mutlak dihormati. Batasan tersebut dicantumkan dalam buku panduan siswa dan fasilitator kami akan mengawal langsung selama kegiatan berjalan.
                    </p>
                  </div>
                </div>
              </div>

              <div class="p-space-md bg-surface rounded-none border border-outline-variant/30">
                <div class="flex items-center gap-space-sm">
                  <span class="material-symbols-outlined text-secondary text-[24px]">support_agent</span>
                  <div>
                    <p class="font-body-sm text-body-sm font-semibold text-on-surface">Lebih nyaman berbicara langsung?</p>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">
                      Hubungi <a href="https://wa.me/6285774410978?text={{ urlencode('Halo Ryan, kami pengelola desa ingin menanyakan kemitraan tapak Destinara.') }}" target="_blank" rel="noopener" class="text-primary font-semibold hover:underline">Mas Ryan di +62 857-7441-0978</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Big Full-width Plinth CTA Section -->
      <section class="w-full bg-surface-container py-space-4xl px-gutter-mobile md:px-gutter-desktop mt-space-2xl border-t border-outline-variant/30">
        <div class="max-w-[840px] mx-auto text-center flex flex-col items-center">
          <div class="w-16 h-16 rounded-none bg-surface flex items-center justify-center text-primary mb-space-md border border-outline-variant/30 shadow-none">
            <span class="material-symbols-outlined text-[32px]">door_front</span>
          </div>
          <h2 class="font-headline-lg text-headline-lg text-on-surface mb-space-md text-2xl md:text-3xl lg:text-headline-lg">
            Mari bersama-sama menjaga marwah dan kelestarian tanah leluhur
          </h2>
          <p class="font-body-lead text-body-lead text-on-surface-variant mb-space-2xl max-w-2xl">
            Bimbing generasi penerus bangsa untuk mengerti arti gotong royong, menghargai pangan dari tanah sendiri, dan memuliakan petuah tetua desa Anda.
          </p>
          <div class="flex flex-col sm:flex-row items-center justify-center gap-space-md w-full sm:w-auto">
            <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center text-center w-full sm:w-auto" href="#formulir-kemitraan">
              Daftar sebagai Pengelola Destinasi
            </a>
            <a class="rgs-btn rgs-btn-outline rounded-none inline-flex items-center justify-center gap-space-xs w-full sm:w-auto" href="https://wa.me/6285774410978?text={{ urlencode('Halo Ryan, kami pengelola desa ingin mendaftarkan destinasi kami.') }}" rel="noopener noreferrer" target="_blank">
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
