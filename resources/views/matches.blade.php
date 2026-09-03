@extends('layouts.app')
@section('title','Matchs — A.S ZINGA')
@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 lg:px-8 lg:py-16">
    <p class="font-black uppercase tracking-widest text-orange-600">Calendrier & résultats</p><h1 class="mt-2 text-4xl font-black">Matchs</h1>
    <h2 class="mt-10 text-2xl font-black">Prochains matchs</h2>
    <div class="mt-5 grid gap-4 lg:grid-cols-2">
    @forelse($upcomingMatches as $match)
        <article class="rounded-2xl border border-zinc-200 bg-white p-5 shadow-sm"><div class="flex items-center justify-between gap-3"><span class="text-xs font-black uppercase tracking-wider text-orange-600">{{ $match->competition ?: 'Match' }}</span><time class="text-sm font-bold text-zinc-500">{{ $match->kickoff_at->format('d/m/Y · H:i') }}</time></div><div class="mt-5 flex items-center justify-between gap-4 text-lg font-black"><span>A.S ZINGA</span><span class="text-zinc-400">VS</span><span class="text-right">{{ $match->opponent_name }}</span></div>@if($match->venue)<p class="mt-4 text-sm text-zinc-500">{{ $match->venue }}</p>@endif</article>
    @empty
        <div class="col-span-full rounded-2xl border border-dashed border-zinc-300 p-8 text-center text-zinc-500">Aucun match programmé pour le moment.</div>
    @endforelse
    </div>

    <h2 class="mt-12 text-2xl font-black">Derniers résultats</h2>
    <div class="mt-5 grid gap-4 lg:grid-cols-2">
    @forelse($results as $match)
        <article class="rounded-2xl bg-zinc-950 p-5 text-white"><div class="flex items-center justify-between gap-3"><span class="text-xs font-black uppercase tracking-wider text-orange-500">{{ $match->competition ?: 'Résultat' }}</span><time class="text-sm text-zinc-400">{{ $match->kickoff_at->format('d/m/Y') }}</time></div><div class="mt-5 grid grid-cols-[1fr_auto_1fr] items-center gap-4 text-lg font-black"><span>A.S ZINGA</span><strong class="rounded-xl bg-white px-4 py-2 text-xl text-zinc-950">{{ $match->as_zinga_score }} - {{ $match->opponent_score }}</strong><span class="text-right">{{ $match->opponent_name }}</span></div>@if($match->summary)<p class="mt-4 text-sm leading-6 text-zinc-300">{{ $match->summary }}</p>@endif</article>
    @empty
        <div class="col-span-full rounded-2xl border border-dashed border-zinc-300 p-8 text-center text-zinc-500">Aucun résultat publié pour le moment.</div>
    @endforelse
    </div>
</section>
@endsection
