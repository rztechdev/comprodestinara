@extends('layouts.app')

@section('title', 'Cerita & Monograf Lapangan — Destinara')

@section('content')
<main class="w-full pt-20 bg-surface">
  <div class="flex flex-col w-full">

    <!-- Header Section -->
    <section class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop w-full pt-space-2xl pb-space-xl">
      <div class="flex flex-col gap-space-sm max-w-3xl">
        <span class="font-caption-fieldnote text-caption-fieldnote italic text-secondary">
          Warta &amp; Arsip Pengetahuan Tapak
        </span>
        <h1 class="font-display-hero text-3xl sm:text-4xl md:text-display-hero text-on-surface tracking-tight leading-tight">
          Cerita dari Garis Depan Komunitas
        </h1>
        <p class="font-body-lead text-body-default md:text-body-lead text-on-surface-variant leading-relaxed">
          Catatan lapangan, monograf etnobotani, dan refleksi pedagogis yang disusun bersama para peneliti dan tetua adat mitra di seluruh Nusantara.
        </p>
      </div>
    </section>

    <!-- Featured Story -->
    @if($featuredStory)
      <section class="w-full bg-surface-container-low py-space-2xl border-y border-outline-variant/30">
        <div class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
            <div class="lg:col-span-7">
              <a href="{{ route('stories.show', $featuredStory->slug) }}" class="block relative w-full aspect-[16/10] rounded-xl overflow-hidden shadow-md group">
                <img src="{{ $featuredStory->image_url }}" alt="{{ $featuredStory->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                <div class="absolute inset-0 bg-primary/10 mix-blend-multiply pointer-events-none"></div>
              </a>
            </div>
            <div class="lg:col-span-5 flex flex-col gap-space-md">
              <div class="flex items-center gap-space-sm text-xs text-secondary font-label-tag">
                <span class="bg-surface-container-highest px-2 py-1 rounded">{{ $featuredStory->category }}</span>
                <span>{{ $featuredStory->archive_no }}</span>
                <span>• {{ $featuredStory->read_time }}</span>
              </div>
              <h2 class="font-headline-lg text-2xl sm:text-3xl text-on-surface leading-snug">
                <a href="{{ route('stories.show', $featuredStory->slug) }}" class="hover:text-primary transition-colors">
                  {{ $featuredStory->title }}
                </a>
              </h2>
              <p class="font-body-default text-on-surface-variant">
                {{ $featuredStory->excerpt }}
              </p>
              <div class="flex items-center justify-between pt-space-xs border-t border-outline-variant/30 text-body-sm text-on-surface-variant">
                <span>Oleh {{ $featuredStory->author_name }}</span>
                <a href="{{ route('stories.show', $featuredStory->slug) }}" class="text-primary font-label-action inline-flex items-center gap-1 hover:underline">
                  <span>Baca Selengkapnya</span>
                  <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif

    <!-- Stories Grid -->
    <section class="max-w-[1280px] mx-auto px-gutter-mobile md:px-gutter-desktop py-space-3xl w-full">
      <h3 class="font-headline-md text-headline-md text-on-surface mb-space-xl">Arsip Catatan Terbaru</h3>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-space-xl">
        @forelse($stories as $story)
          <article class="flex flex-col bg-surface-container-lowest rounded-xl overflow-hidden shadow-sm border border-outline-variant/30 hover:shadow-md transition-shadow">
            <a href="{{ route('stories.show', $story->slug) }}" class="relative w-full aspect-[16/10] overflow-hidden block group">
              <img src="{{ $story->image_url }}" alt="{{ $story->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
              <div class="absolute inset-0 bg-primary/10 mix-blend-multiply pointer-events-none"></div>
            </a>
            <div class="p-space-lg flex flex-col justify-between flex-grow gap-space-md">
              <div class="flex flex-col gap-space-xs">
                <div class="flex items-center gap-space-xs text-xs text-secondary font-label-tag">
                  <span>{{ $story->category }}</span>
                  <span>•</span>
                  <span>{{ $story->read_time }}</span>
                </div>
                <h4 class="font-headline-sm text-lg text-on-surface leading-snug">
                  <a href="{{ route('stories.show', $story->slug) }}" class="hover:text-primary transition-colors">
                    {{ $story->title }}
                  </a>
                </h4>
                <p class="font-body-sm text-body-sm text-on-surface-variant line-clamp-3">
                  {{ $story->excerpt }}
                </p>
              </div>
              <div class="pt-space-sm border-t border-outline-variant/20 flex items-center justify-between text-caption-fieldnote text-xs text-on-surface-variant italic">
                <span>{{ $story->author_name }}</span>
                <span>{{ $story->published_at ? $story->published_at->format('d M Y') : '' }}</span>
              </div>
            </div>
          </article>
        @empty
          <p class="text-on-surface-variant col-span-3 text-center py-8">Belum ada cerita yang diterbitkan.</p>
        @endforelse
      </div>

      <div class="mt-space-2xl">
        {{ $stories->links() }}
      </div>
    </section>

  </div>
</main>
@endsection
