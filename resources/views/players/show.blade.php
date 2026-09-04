@extends('layouts.app')
@section('title', ($player->display_name ?: trim($player->first_name.' '.$player->last_name)).' — A.S ZINGA')
@section('content')
<section class="bg-zinc-950 text-white">
 <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 md:grid-cols-[0.8fr_1.2fr] md:px-6 md:py-20">
  <div class="overflow-hidden rounded-3xl border border-white/10 bg-zinc-900">
   @if($player->photo_path)
    <img src="{{ asset('storage/'.$player->photo_path) }}" alt="{{ $player->display_name ?: $player->first_name.' '.$player->last_name }}" class="aspect-[4/5] h-full w-full object-cover">
   @else
    <div class="flex aspect-[4/5] items-center justify-center bg-gradient-to-br from-orange-500 to-zinc-950 text-7xl font-black">{{ $player->shirt_number ?: 'ASZ' }}</div>
   @endif
  </div>
  <div class="flex flex-col justify-center">
   <a href="{{ route('team') }}" class="mb-8 text-sm font-bold uppercase tracking-[.22em] text-orange-400">← Retour à l’équipe</a>
   <p class="text-sm font-bold uppercase tracking-[.25em] text-orange-400">Effectif A.S ZINGA</p>
   <h1 class="mt-3 text-4xl font-black uppercase tracking-tight md:text-6xl">{{ $player->display_name ?: trim($player->first_name.' '.$player->last_name) }}</h1>
   <p class="mt-4 text-xl text-zinc-300">{{ $player->position }}</p>
   <div class="mt-8 grid grid-cols-2 gap-3 sm:grid-cols-3">
    <div class="rounded-2xl border border-white/10 bg-white/5 p-4"><span class="text-xs uppercase text-zinc-500">Numéro</span><p class="mt-1 text-2xl font-black">{{ $player->shirt_number ?: '—' }}</p></div>
    <div class="rounded-2xl border border-white/10 bg-white/5 p-4"><span class="text-xs uppercase text-zinc-500">Pied préféré</span><p class="mt-1 font-bold">{{ $player->preferred_foot ?: '—' }}</p></div>
    <div class="rounded-2xl border border-white/10 bg-white/5 p-4"><span class="text-xs uppercase text-zinc-500">Taille</span><p class="mt-1 font-bold">{{ $player->height_cm ? $player->height_cm.' cm' : '—' }}</p></div>
   </div>
   @if($player->bio)<div class="mt-8 border-l-4 border-orange-500 pl-5 text-lg leading-8 text-zinc-300">{{ $player->bio }}</div>@endif
  </div>
 </div>
</section>
@endsection
