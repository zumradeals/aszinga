@extends('layouts.app')
@section('title','Actualités — A.S ZINGA')
@section('content')
<section class="relative overflow-hidden bg-zinc-950 text-white">
 <div class="absolute inset-y-0 right-0 w-1/2 bg-gradient-to-l from-orange-500/15 to-transparent"></div>
 <div class="relative mx-auto max-w-7xl px-4 py-16 lg:px-8 lg:py-24">
  <p class="text-xs font-black uppercase tracking-[.3em] text-orange-500">Le club au quotidien</p>
  <h1 class="mt-4 max-w-3xl text-4xl font-black tracking-tight sm:text-5xl lg:text-6xl">L’actualité A.S ZINGA.</h1>
  <p class="mt-5 max-w-2xl text-base leading-7 text-zinc-300 sm:text-lg">Communiqués, vie du groupe, rencontres et informations officielles publiées par le club.</p>
 </div>
</section>
<section class="mx-auto max-w-7xl px-4 py-12 lg:px-8 lg:py-16">
 <div class="flex items-end justify-between gap-4"><div><p class="font-black uppercase tracking-widest text-orange-600">À la une</p><h2 class="mt-2 text-3xl font-black">Dernières publications</h2></div></div>
 <div class="mt-8 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
 @forelse($posts as $post)
  <article class="group overflow-hidden rounded-3xl border border-zinc-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
   <div class="overflow-hidden">@if($post->cover_image_path)<img src="{{ asset('storage/'.$post->cover_image_path) }}" alt="{{ $post->title }}" class="aspect-[16/10] w-full object-cover transition duration-500 group-hover:scale-105">@else<div class="grid aspect-[16/10] place-items-center bg-zinc-950"><span class="rounded-full border border-orange-500/40 px-5 py-2 text-sm font-black tracking-widest text-orange-500">A.S ZINGA</span></div>@endif</div>
   <div class="p-6"><time class="text-xs font-black uppercase tracking-[.18em] text-orange-600">{{ optional($post->published_at)->format('d/m/Y') }}</time><h3 class="mt-3 text-2xl font-black leading-tight">{{ $post->title }}</h3><p class="mt-4 text-sm leading-6 text-zinc-600">{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->body), 150) }}</p></div>
  </article>
 @empty
  <div class="col-span-full rounded-3xl border border-dashed border-zinc-300 bg-white p-12 text-center text-zinc-500">Aucune actualité publiée pour le moment.</div>
 @endforelse
 </div>
 <div class="mt-10">{{ $posts->links() }}</div>
</section>
@endsection
