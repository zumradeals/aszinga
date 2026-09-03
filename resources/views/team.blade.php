@extends('layouts.app')
@section('title','Équipe — A.S ZINGA')
@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 lg:px-8 lg:py-16">
    <p class="font-black uppercase tracking-widest text-orange-600">Effectif</p>
    <h1 class="mt-2 text-4xl font-black">L’équipe A.S ZINGA</h1>
    <p class="mt-3 max-w-2xl text-zinc-600">Découvrez les joueurs actifs enregistrés officiellement par le club.</p>

    <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @forelse($players as $player)
        <article class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm">
            @if($player->photo_path)
                <img src="{{ asset('storage/'.$player->photo_path) }}" alt="{{ $player->display_name ?: $player->first_name.' '.$player->last_name }}" class="aspect-[4/3] w-full object-cover">
            @else
                <div class="grid aspect-[4/3] w-full place-items-center bg-zinc-950 text-5xl font-black text-orange-500">{{ $player->shirt_number ?? 'ASZ' }}</div>
            @endif
            <div class="p-5"><p class="text-xs font-black uppercase tracking-wider text-orange-600">{{ $player->position }}</p><h2 class="mt-1 text-xl font-black">{{ $player->display_name ?: $player->first_name.' '.$player->last_name }}</h2>@if($player->shirt_number)<p class="mt-2 text-sm text-zinc-500">N° {{ $player->shirt_number }}</p>@endif</div>
        </article>
    @empty
        <div class="col-span-full rounded-2xl border border-dashed border-zinc-300 p-10 text-center text-zinc-500">L’effectif officiel sera affiché ici dès son enregistrement par l’administration.</div>
    @endforelse
    </div>
</section>

<section class="bg-zinc-100">
    <div class="mx-auto max-w-7xl px-4 py-12 lg:px-8">
        <p class="font-black uppercase tracking-widest text-orange-600">Encadrement</p><h2 class="mt-2 text-3xl font-black">Staff technique & administratif</h2>
        <div class="mt-7 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($staff as $member)
            <article class="rounded-2xl bg-white p-5 shadow-sm"><p class="text-sm font-black text-orange-600">{{ $member->role }}</p><h3 class="mt-1 text-xl font-black">{{ $member->name }}</h3>@if($member->bio)<p class="mt-3 text-sm leading-6 text-zinc-600">{{ $member->bio }}</p>@endif</article>
        @empty
            <div class="col-span-full rounded-2xl border border-dashed border-zinc-300 p-8 text-center text-zinc-500">Le staff apparaîtra ici dès son enregistrement.</div>
        @endforelse
        </div>
    </div>
</section>
@endsection
