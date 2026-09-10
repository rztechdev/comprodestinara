@extends('layouts.app')

@section('title', ($hero?->title ?? __('sections.contact.hero.title')) . ' — ' . __('site.nav.contact_full') . ' | Destinara')
@section('meta_description', $hero?->subtitle ?? __('sections.contact.hero.subtitle'))
@section('meta_keywords', 'kontak destinara, narahubung destinara, konsultasi study tour edukasi, kantor destinara yogyakarta jakarta, kemitraan desa')
@section('og_image', asset('assets/img/hd/hero-about.jpg'))

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
      "name": "{{ __('site.nav.contact') }}",
      "item": "{{ route('contact.index') }}"
    }
  ]
}
</script>
@endpush

@section('content')
@php
  $hero = $sections['hero'] ?? null;
  $officeHours = $sections['office_hours'] ?? null;
@endphp
<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
    <div class="flex flex-col w-full">

      <!-- 1. Header Section -->
      <section class="w-full bg-surface-container-low/60 py-space-2xl md:py-space-3xl px-gutter-mobile md:px-gutter-desktop border-b border-outline-variant/30">
        <div class="max-w-[1280px] mx-auto flex flex-col gap-space-sm md:gap-space-md">
          <div class="inline-flex items-center gap-space-xs text-secondary font-label-tag text-label-tag">
            <span class="w-2 h-2 rounded-none bg-secondary"></span>
            <span>{{ $hero?->badge ?? __('sections.contact.hero.badge') }}</span>
          </div>
          <h1 class="font-display-hero text-3xl sm:text-4xl md:text-display-hero text-on-surface tracking-tight">{{ $hero?->title ?? __('sections.contact.hero.title') }}</h1>
          <p class="font-body-lead text-body-default md:text-body-lead text-on-surface-variant max-w-3xl leading-relaxed">
            {{ $hero?->subtitle ?? __('sections.contact.hero.subtitle') }}
          </p>
        </div>
      </section>

      <!-- 2. Form & Direct Contact Info Grid -->
      <section class="w-full py-space-2xl md:py-space-3xl px-gutter-mobile md:px-gutter-desktop">
        <div class="max-w-[1280px] mx-auto grid grid-cols-1 lg:grid-cols-12 gap-space-xl lg:gap-space-2xl items-start">
          
          <!-- Kolom Kiri: Formulir Konsultasi Lega (Architectural Plinth Style) -->
          <div class="lg:col-span-6 bg-surface p-space-lg sm:p-space-xl md:p-space-2xl rounded-none shadow-none border-l-4 border-l-primary border-t border-r border-b border-outline-variant/30 flex flex-col gap-space-lg md:gap-space-xl">
            <div class="flex flex-col gap-space-xs">
              <span class="font-caption-fieldnote text-caption-fieldnote text-secondary italic">{{ __('sections.contact.form.tag') }}</span>
              <h2 class="font-headline-md text-headline-md text-on-surface">{{ __('sections.contact.form.title') }}</h2>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ __('sections.contact.form.subtitle') }}
              </p>
            </div>

            <form class="flex flex-col gap-space-md md:gap-space-lg" id="form-konsultasi" action="{{ route('contact.send') }}" method="POST">
              @csrf
              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="full_name">
                  {{ __('sections.contact.form.name_label') }} <span class="text-primary">*</span>
                </label>
                <input class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-none placeholder:text-outline border border-outline-variant/40 focus:border-primary focus:outline-none focus:bg-surface transition-colors shadow-none" id="full_name" name="full_name" value="{{ old('full_name') }}" placeholder="{{ __('sections.contact.form.name_placeholder') }}" required type="text"/>
              </div>

              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="institution">
                  {{ __('sections.contact.form.inst_label') }} <span class="text-primary">*</span>
                </label>
                <input class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-none placeholder:text-outline border border-outline-variant/40 focus:border-primary focus:outline-none focus:bg-surface transition-colors shadow-none" id="institution" name="institution" value="{{ old('institution') }}" placeholder="{{ __('sections.contact.form.inst_placeholder') }}" required type="text"/>
              </div>

              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="whatsapp">
                  {{ __('sections.contact.form.wa_label') }} <span class="text-primary">*</span>
                </label>
                <input class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-none placeholder:text-outline border border-outline-variant/40 focus:border-primary focus:outline-none focus:bg-surface transition-colors shadow-none" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="{{ __('sections.contact.form.wa_placeholder') }}" required type="tel"/>
              </div>

              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="topic">
                  {{ __('sections.contact.form.topic_label') }}
                </label>
                <select class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-none border border-outline-variant/40 focus:border-primary focus:outline-none focus:bg-surface transition-colors shadow-none" id="topic" name="topic">
                  <option value="sekolah">{{ __('sections.contact.form.topic_school') }}</option>
                  <option value="riset">{{ __('sections.contact.form.topic_research') }}</option>
                  <option value="desa">{{ __('sections.contact.form.topic_village') }}</option>
                  <option value="kurikulum">{{ __('sections.contact.form.topic_curriculum') }}</option>
                  <option value="lainnya">{{ __('sections.contact.form.topic_other') }}</option>
                </select>
              </div>

              <div class="flex flex-col gap-space-2xs">
                <label class="font-label-action text-label-action text-on-surface" for="notes">
                  {{ __('sections.contact.form.notes_label') }}
                </label>
                <textarea class="w-full bg-surface-container-low px-space-md py-space-sm text-body-default text-on-surface rounded-none placeholder:text-outline border border-outline-variant/40 focus:border-primary focus:outline-none focus:bg-surface transition-colors shadow-none resize-y" id="notes" name="notes" placeholder="{{ __('sections.contact.form.notes_placeholder') }}" rows="4"></textarea>
              </div>

              <div class="bg-surface-container p-space-md rounded-none flex items-start gap-space-sm border-l-2 border-l-secondary">
                <span class="material-symbols-outlined text-secondary text-[22px] flex-shrink-0 mt-0.5">verified_user</span>
                <p class="font-body-sm text-body-sm text-on-surface-variant">
                  {{ __('sections.contact.form.fpic_notice') }}
                </p>
              </div>

              <button class="rgs-btn rgs-btn-primary rounded-none w-full text-center py-space-md flex items-center justify-center gap-space-xs cursor-pointer shadow-none" type="submit">
                <span class="material-symbols-outlined text-[20px]">outgoing_mail</span>
                <span>{{ __('sections.contact.form.submit_btn') }}</span>
              </button>
            </form>

            <div class="hidden p-space-md bg-secondary-container text-on-secondary-fixed rounded-none flex items-center gap-space-sm border border-secondary/30" id="confirm-box">
              <span class="material-symbols-outlined text-secondary text-[24px]">check_circle</span>
              <p class="font-body-sm text-body-sm">
                {{ __('sections.contact.form.confirm_msg') }}
              </p>
            </div>
          </div>

          <!-- Kolom Kanan: Info Kontak Langsung (Unboxed Cards with Bottom Demarcation Lines) -->
          <div class="lg:col-span-6 flex flex-col gap-space-xl">
            
            <!-- Kartu Narahubung WhatsApp Resmi (Maya, Azki, Ryan) -->
            <div class="rgs-card-alt group flex flex-col gap-space-md pt-0 pb-6">
              <div class="flex items-center justify-between">
                <span class="inline-flex items-center gap-space-xs font-label-tag text-label-tag text-secondary">
                  <span class="material-symbols-outlined text-[18px]">bolt</span>
                  {{ __('sections.contact.wa_card.title') }}
                </span>
                <span class="font-caption-fieldnote text-caption-fieldnote italic text-on-surface-variant">{{ $officeHours?->label ?? __('sections.contact.office_hours.label') }}</span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ __('sections.contact.wa_card.desc') }}
              </p>

              <div class="flex flex-col divide-y divide-[#8C5151]/15 pt-space-2xs">
                <!-- 1. Maya -->
                <div class="py-space-sm flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm">
                  <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                      <span class="font-headline-sm text-lg font-bold text-on-surface">Maya</span>
                      <span class="text-[11px] uppercase tracking-wider bg-surface-container-high px-2 py-0.5 text-secondary border border-outline-variant/30 font-sans">{{ __('sections.contact.wa_card.maya_tag') }}</span>
                    </div>
                    <span class="font-body-sm text-xs text-on-surface-variant mt-0.5">{{ __('sections.contact.wa_card.maya_desc') }}</span>
                    <a class="font-serif font-semibold text-primary hover:text-primary-container text-base mt-1" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_maya', '6282116200363') }}?text={{ urlencode('Halo Maya, saya ingin berkonsultasi mengenai program sekolah dan kemitraan Destinara.') }}" target="_blank" rel="noopener">
                      +62 821-1620-0363
                    </a>
                  </div>
                  <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center gap-1.5 !py-2 !px-4 text-xs shrink-0 self-start sm:self-center" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_maya', '6282116200363') }}?text={{ urlencode('Halo Maya, saya ingin berkonsultasi mengenai program sekolah dan kemitraan Destinara.') }}" target="_blank" rel="noopener">
                    <span class="material-symbols-outlined text-[16px]">chat</span>
                    <span>{{ __('sections.contact.wa_card.chat_btn', ['name' => 'Maya']) }}</span>
                  </a>
                </div>

                <!-- 2. Azki -->
                <div class="py-space-sm flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm">
                  <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                      <span class="font-headline-sm text-lg font-bold text-on-surface">Azki</span>
                      <span class="text-[11px] uppercase tracking-wider bg-surface-container-high px-2 py-0.5 text-secondary border border-outline-variant/30 font-sans">{{ __('sections.contact.wa_card.azki_tag') }}</span>
                    </div>
                    <span class="font-body-sm text-xs text-on-surface-variant mt-0.5">{{ __('sections.contact.wa_card.azki_desc') }}</span>
                    <a class="font-serif font-semibold text-primary hover:text-primary-container text-base mt-1" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_azki', '6285894860696') }}?text={{ urlencode('Halo Azki, saya ingin berdiskusi mengenai penelitian lapangan dan kliring etik FPIC.') }}" target="_blank" rel="noopener">
                      +62 858-9486-0696
                    </a>
                  </div>
                  <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center gap-1.5 !py-2 !px-4 text-xs shrink-0 self-start sm:self-center" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_azki', '6285894860696') }}?text={{ urlencode('Halo Azki, saya ingin berdiskusi mengenai penelitian lapangan dan kliring etik FPIC.') }}" target="_blank" rel="noopener">
                    <span class="material-symbols-outlined text-[16px]">chat</span>
                    <span>{{ __('sections.contact.wa_card.chat_btn', ['name' => 'Azki']) }}</span>
                  </a>
                </div>

                <!-- 3. Ryan -->
                <div class="py-space-sm flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm">
                  <div class="flex flex-col">
                    <div class="flex items-center gap-2">
                      <span class="font-headline-sm text-lg font-bold text-on-surface">Ryan</span>
                      <span class="text-[11px] uppercase tracking-wider bg-surface-container-high px-2 py-0.5 text-secondary border border-outline-variant/30 font-sans">{{ __('sections.contact.wa_card.ryan_tag') }}</span>
                    </div>
                    <span class="font-body-sm text-xs text-on-surface-variant mt-0.5">{{ __('sections.contact.wa_card.ryan_desc') }}</span>
                    <a class="font-serif font-semibold text-primary hover:text-primary-container text-base mt-1" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_ryan', '6285774410978') }}?text={{ urlencode('Halo Ryan, kami ingin berkonsultasi mengenai kemitraan desa adat dan operasional tapak.') }}" target="_blank" rel="noopener">
                      +62 857-7441-0978
                    </a>
                  </div>
                  <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center gap-1.5 !py-2 !px-4 text-xs shrink-0 self-start sm:self-center" href="https://wa.me/{{ \App\Models\SiteSetting::get('contact_whatsapp_ryan', '6285774410978') }}?text={{ urlencode('Halo Ryan, kami ingin berkonsultasi mengenai kemitraan desa adat dan operasional tapak.') }}" target="_blank" rel="noopener">
                    <span class="material-symbols-outlined text-[16px]">chat</span>
                    <span>{{ __('sections.contact.wa_card.chat_btn', ['name' => 'Ryan']) }}</span>
                  </a>
                </div>
              </div>
            </div>

            <!-- Surel Resmi & Dokumen Formal -->
            <div class="rgs-card-alt group flex flex-col gap-space-sm pt-0 pb-6">
              <div class="flex items-center gap-space-xs text-on-surface-variant">
                <span class="material-symbols-outlined text-primary text-[20px]">mark_email_read</span>
                <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ __('sections.contact.email_card.title') }}</h3>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ __('sections.contact.email_card.desc') }}
              </p>
              
              <!-- 1. Kemitraan & Riset -->
              <div class="p-space-md bg-surface-container-low rounded-none flex flex-col sm:flex-row sm:items-center justify-between gap-3 border border-outline-variant/30">
                <div class="flex flex-col">
                  <span class="text-xs uppercase font-semibold text-on-surface tracking-wider">{{ __('sections.contact.email_card.partnership_label') }}</span>
                  <span class="font-label-action text-label-action text-primary select-all">partnership@destinara.id</span>
                  <span class="text-[12px] text-on-surface-variant">{{ __('sections.contact.email_card.partnership_sub') }}</span>
                </div>
                <a class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center gap-1.5 !py-1.5 !px-3.5 text-xs shrink-0 self-start sm:self-center" href="mailto:partnership@destinara.id">
                  <span class="material-symbols-outlined text-[16px]">mail</span>
                  {{ __('sections.contact.email_card.write_email') }}
                </a>
              </div>

              <!-- 2. Umum & Sapaan -->
              <div class="p-space-md bg-surface-container-low rounded-none flex flex-col sm:flex-row sm:items-center justify-between gap-3 border border-outline-variant/30">
                <div class="flex flex-col">
                  <span class="text-xs uppercase font-semibold text-on-surface tracking-wider">{{ __('sections.contact.email_card.general_label') }}</span>
                  <span class="font-label-action text-label-action text-primary select-all">hello@destinara.id</span>
                  <span class="text-[12px] text-on-surface-variant">{{ __('sections.contact.email_card.general_sub') }}</span>
                </div>
                <a class="rgs-btn rgs-btn-outline rounded-none inline-flex items-center justify-center gap-1.5 !py-1.5 !px-3.5 text-xs shrink-0 self-start sm:self-center" href="mailto:hello@destinara.id">
                  <span class="material-symbols-outlined text-[16px]">mail</span>
                  {{ __('sections.contact.email_card.write_email') }}
                </a>
              </div>
            </div>

            <!-- Sanggar Lapangan Yogyakarta dengan Foto/Peta -->
            <div class="rgs-card-alt group flex flex-col gap-space-md pt-0 pb-6">
              <div class="flex items-start justify-between">
                <div class="flex flex-col">
                  <div class="inline-flex items-center gap-space-2xs text-secondary font-label-tag text-label-tag">
                    <span class="material-symbols-outlined text-[16px]">cottage</span>
                    <span>{{ $officeHours?->sleman_lab ?? __('sections.contact.office_hours.sleman_lab') }}</span>
                  </div>
                  <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $officeHours?->sleman_title ?? __('sections.contact.office_hours.sleman_title') }}</h3>
                </div>
                <span class="px-space-sm py-space-2xs bg-surface-container text-on-surface-variant rounded-none border border-outline-variant/30 font-label-tag text-label-tag">{{ __('sections.contact.office_hours.sleman_badge') }}</span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ $officeHours?->sleman_desc ?? __('sections.contact.office_hours.sleman_desc') }}
              </p>
              <div class="flex items-center gap-space-xs text-on-surface-variant font-caption-fieldnote text-caption-fieldnote italic">
                <span class="material-symbols-outlined text-[18px] text-tertiary">schedule</span>
                <span>{{ $officeHours?->sleman_time ?? __('sections.contact.office_hours.sleman_time') }}</span>
              </div>
              
              <!-- Foto Sanggar & Penanda Lokasi -->
              <div class="w-full h-52 rounded-none bg-cover bg-center relative overflow-hidden border border-outline-variant/30 flex items-end p-space-md" data-location="Jl. Palagan Tentara Pelajar Km 9 Sleman Yogyakarta" style="background-image: url('{{ asset('assets/img/hd/contact-map.jpg') }}')">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                <div class="relative z-10 bg-surface/90 backdrop-blur-sm px-space-md py-space-xs rounded-none border border-outline-variant/30 flex items-center gap-space-xs">
                  <span class="material-symbols-outlined text-primary text-[18px]">location_on</span>
                  <span class="font-body-sm text-body-sm font-medium text-on-surface">{{ __('sections.contact.office_hours.sleman_map') }}</span>
                </div>
              </div>
            </div>

            <!-- Ruang Dialog Jakarta -->
            <div class="rgs-card-alt group flex flex-col gap-space-sm pt-0 pb-6">
              <div class="flex items-start justify-between">
                <div class="flex flex-col">
                  <div class="inline-flex items-center gap-space-2xs text-secondary font-label-tag text-label-tag">
                    <span class="material-symbols-outlined text-[16px]">apartment</span>
                    <span>{{ $officeHours?->jakarta_office ?? __('sections.contact.office_hours.jakarta_office') }}</span>
                  </div>
                  <h3 class="font-headline-sm text-headline-sm text-on-surface">{{ $officeHours?->jakarta_title ?? __('sections.contact.office_hours.jakarta_title') }}</h3>
                </div>
                <span class="px-space-sm py-space-2xs bg-surface-container text-on-surface-variant rounded-none border border-outline-variant/30 font-label-tag text-label-tag">{{ __('sections.contact.office_hours.jakarta_badge') }}</span>
              </div>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ $officeHours?->jakarta_desc ?? __('sections.contact.office_hours.jakarta_desc') }}
              </p>
              <p class="font-body-sm text-body-sm text-on-surface-variant">
                {{ $officeHours?->jakarta_time ?? __('sections.contact.office_hours.jakarta_time') }}
              </p>
            </div>

          </div>
        </div>
      </section>

      <!-- 3. Section Komitmen Etika Nusantara: 3 Unboxed Cards with Bottom Demarcation Lines -->
      <section class="w-full bg-surface-container px-gutter-mobile md:px-gutter-desktop py-space-2xl md:py-space-3xl mt-space-xl border-t border-outline-variant/30">
        <div class="max-w-[1280px] mx-auto">
          <div class="text-center max-w-2xl mx-auto mb-space-xl">
            <span class="text-secondary font-label-tag text-label-tag tracking-wider uppercase">{{ __('sections.contact.ethics.tag') }}</span>
            <h3 class="font-headline-md text-headline-md text-on-surface mt-space-2xs">{{ __('sections.contact.ethics.title') }}</h3>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg md:gap-space-xl items-stretch">
            <div class="rgs-card-alt group flex flex-col gap-space-xs pt-4 pb-4">
              <div class="w-12 h-12 rounded-none bg-secondary/10 flex items-center justify-center mb-space-xs border border-outline-variant/20">
                <span class="material-symbols-outlined text-secondary text-[28px]">nature_people</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface">{{ __('sections.contact.ethics.p1_title') }}</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                {{ __('sections.contact.ethics.p1_desc') }}
              </p>
            </div>

            <div class="rgs-card-alt group flex flex-col gap-space-xs pt-4 pb-4">
              <div class="w-12 h-12 rounded-none bg-primary/10 flex items-center justify-center mb-space-xs border border-outline-variant/20">
                <span class="material-symbols-outlined text-primary text-[28px]">local_library</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface">{{ __('sections.contact.ethics.p2_title') }}</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                {{ __('sections.contact.ethics.p2_desc') }}
              </p>
            </div>

            <div class="rgs-card-alt group flex flex-col gap-space-xs pt-4 pb-4">
              <div class="w-12 h-12 rounded-none bg-tertiary/10 flex items-center justify-center mb-space-xs border border-outline-variant/20">
                <span class="material-symbols-outlined text-tertiary text-[28px]">account_balance_wallet</span>
              </div>
              <h4 class="font-headline-sm text-headline-sm text-on-surface">{{ __('sections.contact.ethics.p3_title') }}</h4>
              <p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
                {{ __('sections.contact.ethics.p3_desc') }}
              </p>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main>
@endsection
