@extends('layouts.app')

@section('title', $story->title . ' — Destinara')

@section('content')
<main class="w-full pt-20 bg-surface">
  <div class="flex flex-col w-full">

    <!-- Header Article -->
    <section class="w-full bg-surface-container-low py-space-2xl md:py-space-3xl border-b border-outline-variant/30">
      <div class="max-w-[880px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col gap-space-md">
        <a href="{{ route('stories.index') }}" class="inline-flex items-center gap-1.5 text-secondary font-label-action text-body-sm hover:underline">
          <span class="material-symbols-outlined text-[18px]">arrow_back</span>
          <span>Kembali ke Warta &amp; Cerita</span>
        </a>
        <div class="flex items-center gap-space-sm text-xs text-secondary font-label-tag">
          <span class="bg-surface-container-highest px-2 py-1 rounded">{{ $story->category }}</span>
          <span>{{ $story->archive_no }}</span>
          <span>• {{ $story->read_time }}</span>
        </div>
        <h1 class="font-display-hero text-2xl sm:text-4xl md:text-5xl text-on-surface tracking-tight leading-tight">
          {{ $story->title }}
        </h1>
        <div class="flex items-center gap-3 pt-space-xs text-body-sm text-on-surface-variant">
          <span class="font-medium text-on-surface">{{ $story->author_name }}</span>
          @if($story->author_role)
            <span>• {{ $story->author_role }}</span>
          @endif
          <span>• {{ $story->published_at ? $story->published_at->format('d M Y') : date('d M Y') }}</span>
        </div>
      </div>
    </section>

    <!-- Article Content -->
    <article class="max-w-[880px] mx-auto px-gutter-mobile md:px-gutter-desktop py-space-3xl w-full flex flex-col gap-space-xl">
      <div class="relative w-full aspect-[16/9] rounded-2xl overflow-hidden shadow-md">
        <img src="{{ $story->image_url }}" alt="{{ $story->title }}" class="w-full h-full object-cover">
      </div>

      <div class="prose prose-lg max-w-none font-body-default text-body-default text-on-surface leading-relaxed space-y-6">
        @if($story->content)
          {!! $story->content !!}
        @else
          <p>{{ $story->excerpt }}</p>
        @endif
      </div>

      <div class="pt-space-xl border-t border-outline-variant/30 flex flex-col sm:flex-row items-center justify-between gap-space-md">
        <div class="font-caption-fieldnote italic text-secondary text-body-sm">
          Disimpan dalam Arsip Pengetahuan Lapangan Destinara Nusantara
        </div>
        <a href="{{ route('contact.index') }}" class="bg-primary-container text-on-primary font-label-action text-body-sm px-space-lg py-space-sm rounded-lg hover:bg-primary transition-colors">
          Bahas Topik Ini Bersama Kami
        </a>
      </div>
    </article>

  </div>
</main>
@endsection
