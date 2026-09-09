@extends('layouts.app')

@section('title', $destination->name . ' — Dossier Tapak Destinara')

@section('content')
<main class="w-full pt-20 bg-surface">
  <div class="flex flex-col w-full">

    <!-- Header & Hero -->
    <section class="w-full bg-surface-container-low py-space-2xl md:py-space-3xl border-b border-outline-variant/30">
      <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col gap-space-md">
        <a href="{{ route('destinations.index') }}" class="inline-flex items-center gap-1.5 text-secondary font-label-action text-body-sm hover:underline">
          <span class="material-symbols-outlined text-[18px]">arrow_back</span>
          <span>Kembali ke Indeks Destinasi</span>
        </a>
        <div class="flex items-center gap-space-sm flex-wrap">
          @if($destination->badge)
            <span class="px-space-sm py-space-2xs rounded-lg bg-surface-container-highest text-secondary font-label-tag text-label-tag">
              {{ $destination->badge }}
            </span>
          @endif
          <span class="font-body-sm text-on-surface-variant">{{ $destination->location }}</span>
        </div>
        <h1 class="font-display-hero text-3xl sm:text-4xl md:text-display-hero text-on-surface tracking-tight leading-tight">
          {{ $destination->name }}
        </h1>
        <p class="font-body-lead text-body-default md:text-body-lead text-on-surface-variant max-w-3xl leading-relaxed">
          {{ $destination->lead ?? Str::limit(strip_tags($destination->description), 200) }}
        </p>
      </div>
    </section>

    <!-- Main Content & Details -->
    <section class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop py-space-3xl w-full">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-start">
        <!-- Content Column -->
        <div class="lg:col-span-8 flex flex-col gap-space-xl">
          <div class="relative w-full aspect-[16/9] rounded-2xl overflow-hidden shadow-md">
            <img src="{{ $destination->image_url }}" alt="{{ $destination->name }}" class="w-full h-full object-cover">
          </div>

          <div class="flex flex-col gap-space-md font-body-default text-body-default text-on-surface leading-relaxed">
            <h3 class="font-headline-md text-headline-md text-on-surface">Narasi Tapak &amp; Konteks Ekologis</h3>
            <div class="space-y-4">
              {!! nl2br(e($destination->description)) !!}
            </div>
          </div>

          @if($destination->research_focus)
            <div class="p-space-xl bg-surface-container-low rounded-xl border border-outline-variant/30 flex flex-col gap-space-sm">
              <span class="font-label-action text-secondary font-semibold">Fokus Riset &amp; Pembelajaran</span>
              <p class="font-body-default text-on-surface">
                {{ $destination->research_focus }}
              </p>
            </div>
          @endif
        </div>

        <!-- Sidebar / Dossier Summary -->
        <div class="lg:col-span-4 flex flex-col gap-space-lg sticky top-28">
          <div class="bg-surface-container-lowest p-space-xl rounded-2xl shadow-sm border border-outline-variant/30 flex flex-col gap-space-md">
            <h4 class="font-headline-sm text-headline-sm text-on-surface">Ringkasan Dokumen Tapak</h4>
            <div class="flex flex-col gap-space-sm border-t border-outline-variant/20 pt-space-sm text-body-sm">
              <div>
                <span class="text-on-surface-variant block text-xs">Lokasi Administratif</span>
                <span class="font-medium text-on-surface">{{ $destination->location }}</span>
              </div>
              <div>
                <span class="text-on-surface-variant block text-xs">Kategori Lanskap</span>
                <span class="font-medium text-on-surface uppercase">{{ $destination->category }}</span>
              </div>
              <div>
                <span class="text-on-surface-variant block text-xs">Modul Pembelajaran Lapangan</span>
                <span class="font-medium text-on-surface">{{ $destination->module_name ?? 'Kurikulum Kontekstual' }}</span>
              </div>
              <div>
                <span class="text-on-surface-variant block text-xs">Kapasitas Maksimal Rombongan</span>
                <span class="font-medium text-secondary">{{ $destination->capacity ?? '20-30 Peserta' }}</span>
              </div>
              <div>
                <span class="text-on-surface-variant block text-xs">Protokol Budaya</span>
                <span class="font-medium text-on-surface">Persetujuan FPIC Terverifikasi</span>
              </div>
            </div>

            <div class="pt-space-sm border-t border-outline-variant/20 flex flex-col gap-space-xs">
              <a href="{{ route('contact.index') }}" class="w-full bg-primary-container text-on-primary font-label-action text-label-action py-space-sm px-space-md rounded-lg text-center hover:bg-primary transition-colors shadow-sm">
                Ajukan Program ke Tapak Ini
              </a>
              <a href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp', '6281288904411') }}?text=Halo%20Destinara,%20saya%20tertarik%20dengan%20tapak%20{{ urlencode($destination->name) }}" target="_blank" rel="noopener" class="w-full bg-surface-container text-on-surface font-label-action text-body-sm py-space-sm px-space-md rounded-lg text-center hover:bg-surface-container-high transition-colors border border-outline-variant/30 flex items-center justify-center gap-1.5">
                <span class="material-symbols-outlined text-[18px]">chat</span>
                <span>Konsultasi WhatsApp Cepat</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
</main>
@endsection
