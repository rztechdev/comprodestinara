@extends('layouts.app')

@section('title', $story->title . ' — Destinara')
@section('meta_description', Str::limit(strip_tags($story->excerpt ?? $story->content ?? $story->title), 155))
@section('meta_keywords', ($story->category ?? 'Warta Tapak') . ', ' . ($story->author_name ?? 'Destinara') . ', monograf lapangan, etnografi nusantara, kearifan lokal, destinara')
@section('og_type', 'article')
@section('og_image', $story->image_url ?? asset('assets/img/hd/hero-about.jpg'))

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@graph": [
    {
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
          "name": "Cerita Tapak",
          "item": "{{ route('stories.index') }}"
        },
        {
          "@type": "ListItem",
          "position": 3,
          "name": "{{ addslashes($story->title) }}",
          "item": "{{ url()->current() }}"
        }
      ]
    },
    {
      "@type": "Article",
      "@id": "{{ url()->current() }}#article",
      "headline": "{{ addslashes($story->title) }}",
      "description": "{{ addslashes(Str::limit(strip_tags($story->excerpt ?? $story->content ?? ''), 250)) }}",
      "image": "{{ $story->image_url ?? asset('assets/img/hd/hero-about.jpg') }}",
      "author": {
        "@type": "Person",
        "name": "{{ addslashes($story->author_name ?? 'Kurator Destinara') }}"
      },
      "publisher": {
        "@id": "{{ url('/') }}/#organization"
      },
      "datePublished": "{{ ($story->published_at ?? $story->created_at)->toIso8601String() }}",
      "dateModified": "{{ $story->updated_at->toIso8601String() }}",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}"
      }
    }
  ]
}
</script>
@endpush

@section('content')
<main class="w-full pt-20 lg:pt-[124px] xl:pt-[132px] bg-surface pb-16 lg:pb-0">
  <div class="flex flex-col w-full">

    <!-- Header Article -->
    <section class="w-full bg-surface-container-low py-space-2xl md:py-space-3xl border-b border-outline-variant/30">
      <div class="max-w-[880px] mx-auto px-gutter-mobile md:px-gutter-desktop flex flex-col gap-space-md">
        <a href="{{ route('stories.index') }}" class="inline-flex items-center gap-1.5 text-secondary font-label-action text-body-sm hover:underline">
          <span class="material-symbols-outlined text-[18px]">arrow_back</span>
          <span>Kembali ke Warta &amp; Cerita</span>
        </a>
        <div class="flex items-center gap-space-sm text-xs text-secondary font-label-tag">
          <span class="bg-surface px-2.5 py-1 rounded-none border border-outline-variant/30">{{ $story->category }}</span>
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
      <div class="relative w-full aspect-[16/9] rounded-none overflow-hidden border border-outline-variant/30 shadow-none">
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
        <a href="{{ route('contact.index') }}" class="rgs-btn rgs-btn-primary rounded-none inline-flex items-center justify-center text-body-sm">
          Bahas Topik Ini Bersama Kami
        </a>
      </div>
    </article>

  </div>
</main>
@endsection
