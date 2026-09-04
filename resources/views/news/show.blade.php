@extends('layouts.app')
@section('title', $post->title.' — A.S ZINGA')
@section('content')
<article>
 <header class="bg-zinc-950 text-white">
  <div class="mx-auto max-w-4xl px-4 py-14 md:px-6 md:py-20">
   <a href="{{ route('news.index') }}" class="text-sm font-bold uppercase tracking-[.22em] text-orange-400">← Toutes les actualités</a>
   <p class="mt-10 text-sm font-bold uppercase tracking-[.25em] text-orange-400">Actualité A.S ZINGA</p>
   <h1 class="mt-3 text-4xl font-black leading-tight tracking-tight md:text-6xl">{{ $post->title }}</h1>
   <p class="mt-5 text-sm text-zinc-400">Publié le {{ $post->published_at->format('d/m/Y') }}</p>
   @if($post->excerpt)<p class="mt-6 max-w-3xl text-xl leading-8 text-zinc-300">{{ $post->excerpt }}</p>@endif
  </div>
 </header>
 @if($post->cover_image_path)
  <div class="mx-auto -mb-6 max-w-5xl px-4 pt-10 md:px-6"><img src="{{ asset('storage/'.$post->cover_image_path) }}" alt="{{ $post->title }}" class="max-h-[600px] w-full rounded-3xl object-cover"></div>
 @endif
 <div class="mx-auto max-w-3xl px-4 py-16 md:px-6 md:py-20">
  <div class="whitespace-pre-line text-lg leading-8 text-zinc-700">{{ $post->body }}</div>
  <div class="mt-14 border-t border-zinc-200 pt-8"><a href="{{ route('news.index') }}" class="font-bold text-orange-600">← Retour aux actualités</a></div>
 </div>
</article>
@endsection
