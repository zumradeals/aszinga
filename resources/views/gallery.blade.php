@extends('layouts.app')
@section('title','Galerie — A.S ZINGA')
@section('content')
<section class="bg-orange-500 text-zinc-950"><div class="mx-auto max-w-7xl px-4 py-16 lg:px-8 lg:py-20"><p class="text-xs font-black uppercase tracking-[.3em]">Dans l’objectif</p><h1 class="mt-4 text-4xl font-black tracking-tight sm:text-5xl lg:text-6xl">La vie du club en images.</h1><p class="mt-5 max-w-2xl text-base font-medium leading-7 text-zinc-900/75">Entraînements, rencontres et moments officiels publiés directement par A.S ZINGA.</p></div></section>
<section class="mx-auto max-w-7xl px-4 py-12 lg:px-8 lg:py-16">
 <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
 @forelse($items as $item)
  <figure class="group overflow-hidden rounded-3xl bg-zinc-950 shadow-sm"><div class="overflow-hidden"><img src="{{ asset('storage/'.$item->image_path) }}" alt="{{ $item->title ?: 'A.S ZINGA' }}" class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105"></div><figcaption class="p-5 text-white">@if($item->title)<strong class="text-lg">{{ $item->title }}</strong>@endif @if($item->caption)<p class="mt-2 text-sm leading-6 text-zinc-400">{{ $item->caption }}</p>@endif @if($item->taken_at)<time class="mt-3 block text-xs font-bold uppercase tracking-wider text-orange-500">{{ $item->taken_at->format('d/m/Y') }}</time>@endif</figcaption></figure>
 @empty
  <div class="sm:col-span-2 lg:col-span-3 rounded-3xl border border-dashed border-zinc-300 bg-white p-12 text-center text-zinc-500">Les photos officielles seront publiées ici depuis l’administration.</div>
 @endforelse
 </div><div class="mt-10">{{ $items->links() }}</div>
</section>
@endsection
