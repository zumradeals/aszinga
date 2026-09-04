@extends('layouts.app')
@php($away=$match->venue_type==='away')
@section('title', ($away?$match->opponent_name.' vs A.S ZINGA':'A.S ZINGA vs '.$match->opponent_name).' — Match')
@section('content')
<section class="bg-zinc-950 text-white">
 <div class="mx-auto max-w-5xl px-4 py-16 md:px-6 md:py-24">
  <a href="{{ route('matches') }}" class="text-sm font-bold uppercase tracking-[.22em] text-orange-400">← Tous les matchs</a>
  <div class="mt-8 rounded-3xl border border-white/10 bg-white/5 p-6 md:p-10">
   <div class="text-center"><p class="text-sm font-bold uppercase tracking-[.22em] text-orange-400">{{ $match->competition ?: 'Match A.S ZINGA' }}</p><p class="mt-3 text-zinc-400">{{ $match->kickoff_at?->format('d/m/Y à H:i') }}</p></div>
   <div class="my-10 grid grid-cols-[1fr_auto_1fr] items-center gap-4 text-center">
    <div><div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full {{ $away?'border border-white/10 bg-zinc-900':'bg-orange-500' }} text-2xl font-black">{{ $away?'?':'ASZ' }}</div><h1 class="mt-4 text-xl font-black md:text-3xl">{{ $away?$match->opponent_name:'A.S ZINGA' }}</h1></div>
    <div>@if($match->status === 'termine' && $match->as_zinga_score !== null && $match->opponent_score !== null)<div class="rounded-2xl bg-white px-5 py-3 text-3xl font-black text-zinc-950 md:text-5xl">{{ $away?$match->opponent_score:$match->as_zinga_score }} - {{ $away?$match->as_zinga_score:$match->opponent_score }}</div><p class="mt-2 text-xs font-bold uppercase tracking-wider text-zinc-500">Terminé</p>@else<div class="text-xl font-black text-zinc-500">VS</div>@endif</div>
    <div><div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full {{ $away?'bg-orange-500':'border border-white/10 bg-zinc-900' }} text-2xl font-black">{{ $away?'ASZ':'?' }}</div><h2 class="mt-4 text-xl font-black md:text-3xl">{{ $away?'A.S ZINGA':$match->opponent_name }}</h2></div>
   </div>
   <div class="grid gap-3 border-t border-white/10 pt-6 sm:grid-cols-2"><div class="rounded-2xl bg-zinc-900 p-4"><span class="text-xs uppercase text-zinc-500">Lieu</span><p class="mt-1 font-bold">{{ $match->venue ?: 'À confirmer' }}</p></div><div class="rounded-2xl bg-zinc-900 p-4"><span class="text-xs uppercase text-zinc-500">Configuration</span><p class="mt-1 font-bold">{{ $away ? 'Extérieur' : 'Domicile' }}</p></div></div>
   @if($match->summary)<div class="mt-8 rounded-2xl bg-white p-6 text-zinc-700"><h3 class="font-black uppercase text-zinc-950">Résumé du match</h3><p class="mt-3 whitespace-pre-line leading-7">{{ $match->summary }}</p></div>@endif
  </div>
 </div>
</section>
@endsection
