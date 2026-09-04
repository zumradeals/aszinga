@extends('layouts.app')
@section('title', 'A.S ZINGA — La passion du football, l’avenir de nos jeunes')
@section('content')
@php
 $dynamicHero = $hero && $hero->is_active;
 $heroEyebrow = $dynamicHero ? $hero->eyebrow : 'Abobo • Abidjan • Côte d’Ivoire';
 $heroTitle = $dynamicHero ? $hero->title : 'ENSEMBLE';
 $heroHighlight = $dynamicHero ? $hero->highlight : 'PLUS FORTS';
 $heroSubtitle = $dynamicHero ? $hero->subtitle : 'Formation, Discipline, Ambition';
 $heroDescription = $dynamicHero && $hero->description ? $hero->description : 'A.S ZINGA construit aujourd’hui les talents de demain, à Abobo et partout.';
 $showTiger = !$dynamicHero || $hero->show_tiger;
@endphp
<section class="relative isolate overflow-hidden bg-[#070707] text-white">
 <div class="absolute inset-0 bg-[radial-gradient(circle_at_78%_38%,rgba(249,115,22,.32),transparent_27%),radial-gradient(circle_at_18%_75%,rgba(249,115,22,.12),transparent_28%)]"></div>
 <div class="absolute inset-x-0 bottom-0 h-52 bg-gradient-to-t from-black via-black/70 to-transparent"></div>
 <div class="absolute -right-24 top-20 h-72 w-72 rounded-full border border-orange-500/15 sm:h-[30rem] sm:w-[30rem]"></div>
 @if($showTiger)
  <div aria-hidden="true" class="pointer-events-none absolute right-[-5rem] top-16 hidden select-none text-[22rem] font-black leading-none text-orange-500/[.055] lg:block">🐯</div>
 @endif
 <div class="relative mx-auto min-h-[760px] max-w-7xl px-4 pb-10 pt-16 sm:pt-20 lg:min-h-[820px] lg:px-8 lg:pt-24">
  <div class="relative z-30 max-w-3xl">
   <span class="inline-flex rounded-full border border-orange-400/35 bg-black/35 px-4 py-2 text-[11px] font-black uppercase tracking-[.24em] text-orange-400 backdrop-blur">{{ $heroEyebrow }}</span>
   <h1 class="mt-7 text-5xl font-black uppercase leading-[.84] tracking-[-.055em] sm:text-7xl lg:text-[7.6rem]">{{ $heroTitle }}<br><span class="text-orange-500">{{ $heroHighlight }}</span></h1>
   <p class="mt-5 text-sm font-black uppercase tracking-[.28em] text-zinc-300 sm:text-base">{{ $heroSubtitle }}</p>
   <p class="mt-6 max-w-xl text-base leading-7 text-zinc-400 sm:text-lg">{{ $heroDescription }}</p>
   <div class="mt-8 flex flex-wrap gap-3"><a href="{{ route('matches') }}" class="rounded-full bg-orange-500 px-7 py-3.5 font-black text-white transition hover:bg-orange-400">Voir nos matchs</a><a href="{{ route('team') }}" class="rounded-full border border-white/25 bg-black/20 px-7 py-3.5 font-black backdrop-blur transition hover:bg-white hover:text-zinc-950">Découvrir l’équipe</a></div>
  </div>

  @if(count($heroPlayers))
   <div class="relative z-20 mx-auto mt-12 h-[390px] max-w-3xl sm:h-[500px] lg:absolute lg:bottom-0 lg:right-0 lg:mt-0 lg:h-[720px] lg:w-[62%] lg:max-w-none">
    <div class="absolute bottom-0 left-1/2 h-20 w-[82%] -translate-x-1/2 rounded-[100%] bg-orange-500/20 blur-3xl"></div>
    @foreach($heroPlayers as $index => $heroPlayer)
     @php
      $count = count($heroPlayers);
      $position = $count === 1 ? 'left-1/2 -translate-x-1/2 w-[72%] lg:w-[58%]' : ($count === 2 ? ($index === 0 ? 'left-[8%] w-[58%]' : 'right-[4%] w-[58%]') : ($index === 0 ? 'left-[-2%] w-[48%]' : ($index === 1 ? 'left-1/2 z-20 -translate-x-1/2 w-[54%]' : 'right-[-2%] w-[48%]')));
      $layer = $count === 3 && $index === 1 ? 'z-20' : 'z-10';
     @endphp
     <a href="{{ route('players.show',$heroPlayer) }}" class="group absolute bottom-0 {{ $position }} {{ $layer }} block h-[96%] transition duration-500 hover:-translate-y-2">
      <div class="absolute inset-x-[12%] bottom-[5%] h-[65%] rounded-full bg-orange-500/10 blur-3xl transition group-hover:bg-orange-500/20"></div>
      <img src="{{ asset('storage/'.$heroPlayer->photo_path) }}" alt="{{ $heroPlayer->display_name ?: $heroPlayer->first_name.' '.$heroPlayer->last_name }}" class="relative h-full w-full object-contain object-bottom drop-shadow-[0_24px_30px_rgba(0,0,0,.75)]">
     </a>
    @endforeach
   </div>
  @else
   <div class="relative z-10 mt-14 ml-auto max-w-xl lg:absolute lg:bottom-20 lg:right-8 lg:w-[44%]">
    <div class="rounded-[2rem] border border-white/10 bg-white/[.055] p-7 shadow-2xl backdrop-blur"><p class="text-xs font-black uppercase tracking-[.25em] text-orange-400">L’identité A.S ZINGA</p><h2 class="mt-4 text-3xl font-black">Les visages du club seront ici.</h2><p class="mt-3 leading-7 text-zinc-400">Depuis l’administration, sélectionnez jusqu’à trois joueurs disposant d’une vraie photo. Le Hero prendra automatiquement vie sans inventer aucun joueur.</p></div>
   </div>
  @endif

  <div class="relative z-30 mt-10 grid gap-3 border-t border-white/10 pt-6 sm:grid-cols-3 lg:absolute lg:bottom-8 lg:left-8 lg:w-[43%]">
   <div><strong class="block text-lg text-white">Abobo</strong><span class="text-xs uppercase tracking-wider text-zinc-500">Notre territoire</span></div><div><strong class="block text-lg text-white">Jeunesse</strong><span class="text-xs uppercase tracking-wider text-zinc-500">Notre priorité</span></div><div><strong class="block text-lg text-white">Football</strong><span class="text-xs uppercase tracking-wider text-zinc-500">Notre passion</span></div>
  </div>
 </div>
</section>

<section class="border-y border-zinc-200 bg-white"><div class="mx-auto max-w-7xl px-4 py-6 lg:px-8"><div class="grid gap-4 lg:grid-cols-[1fr_auto] lg:items-center"><div>@if($nextMatch)<p class="text-xs font-black uppercase tracking-[.2em] text-orange-600">Prochain rendez-vous</p><div class="mt-1 flex flex-wrap items-center gap-x-3 gap-y-1"><strong>A.S ZINGA</strong><span class="rounded-full bg-zinc-950 px-2.5 py-1 text-[10px] font-black text-white">VS</span><strong>{{ $nextMatch->opponent_name }}</strong><span class="text-sm text-zinc-500">{{ $nextMatch->kickoff_at->format('d/m/Y • H:i') }}{{ $nextMatch->venue ? ' • '.$nextMatch->venue : '' }}</span></div>@else<p class="font-bold text-zinc-600">Le prochain match sera affiché dès sa programmation par le club.</p>@endif</div>@if($lastMatch)<a href="{{ route('matches.show',$lastMatch) }}" class="text-sm font-black text-zinc-950">Dernier résultat : A.S ZINGA {{ $lastMatch->as_zinga_score }} — {{ $lastMatch->opponent_score }} {{ $lastMatch->opponent_name }} →</a>@endif</div></div></section>

<section class="bg-white"><div class="mx-auto max-w-7xl px-4 py-20 lg:px-8"><div class="grid gap-12 lg:grid-cols-[.8fr_1.2fr] lg:items-center"><div><p class="text-sm font-black uppercase tracking-[.2em] text-orange-600">Notre identité</p><h2 class="mt-3 text-4xl font-black tracking-tight sm:text-5xl">Former, progresser, représenter.</h2></div><div class="text-lg leading-8 text-zinc-600"><p>A.S ZINGA est une association sportive implantée à Abobo. Le club veut offrir aux jeunes un cadre où le talent rencontre l’encadrement, où la passion devient discipline et où l’ambition se construit collectivement.</p><a href="{{ route('club') }}" class="mt-5 inline-flex font-black text-zinc-950">Découvrir l’histoire et le projet du club →</a></div></div><div class="mt-12 grid gap-4 md:grid-cols-3"><div class="rounded-3xl bg-zinc-950 p-7 text-white"><span class="text-3xl">⚽</span><h3 class="mt-5 text-xl font-black">Formation</h3><p class="mt-2 text-sm leading-6 text-zinc-400">Faire progresser les qualités techniques, tactiques et physiques de chaque joueur.</p></div><div class="rounded-3xl bg-orange-500 p-7"><span class="text-3xl">◆</span><h3 class="mt-5 text-xl font-black">Discipline</h3><p class="mt-2 text-sm leading-6 text-orange-950/80">Apprendre le respect, l’effort, la ponctualité et la responsabilité à travers le sport.</p></div><div class="rounded-3xl bg-zinc-100 p-7"><span class="text-3xl">↗</span><h3 class="mt-5 text-xl font-black">Ambition</h3><p class="mt-2 text-sm leading-6 text-zinc-600">Créer des opportunités et permettre aux talents de viser plus haut.</p></div></div></div></section>

<section class="bg-zinc-100"><div class="mx-auto max-w-7xl px-4 py-20 lg:px-8"><div class="grid gap-10 lg:grid-cols-2"><div class="rounded-[2rem] bg-orange-500 p-8 sm:p-12"><p class="text-sm font-black uppercase tracking-[.2em]">Le mot du président</p><blockquote class="mt-7 text-3xl font-black leading-tight sm:text-4xl">« Notre ambition est de donner à nos jeunes un cadre sérieux pour apprendre, grandir et croire en leur potentiel. »</blockquote><p class="mt-7 leading-7 text-orange-950/80">À A.S ZINGA, le résultat sportif compte, mais notre responsabilité va plus loin. Nous voulons bâtir un club respecté, proche de sa communauté et capable d’accompagner durablement les talents d’Abobo.</p><p class="mt-8 font-black">La Présidence<br><span class="font-medium text-orange-950/70">Association Sportive Zinga</span></p></div><div class="rounded-[2rem] bg-zinc-950 p-8 text-white sm:p-12"><p class="text-sm font-black uppercase tracking-[.2em] text-orange-400">Notre vision</p><h2 class="mt-5 text-4xl font-black">Faire du football un moteur d’avenir.</h2><p class="mt-5 leading-7 text-zinc-400">Le club veut créer une passerelle entre pratique sportive, éducation, valeurs humaines et opportunités. Chaque jeune doit pouvoir trouver ici un espace pour progresser et être considéré.</p><div class="mt-9 grid grid-cols-2 gap-3 text-sm"><div class="rounded-2xl border border-white/10 p-4"><strong class="block text-orange-400">01</strong><span class="mt-2 block font-bold">Respect</span></div><div class="rounded-2xl border border-white/10 p-4"><strong class="block text-orange-400">02</strong><span class="mt-2 block font-bold">Travail</span></div><div class="rounded-2xl border border-white/10 p-4"><strong class="block text-orange-400">03</strong><span class="mt-2 block font-bold">Solidarité</span></div><div class="rounded-2xl border border-white/10 p-4"><strong class="block text-orange-400">04</strong><span class="mt-2 block font-bold">Excellence</span></div></div></div></div></div></section>

@if($players->isNotEmpty())<section class="bg-white"><div class="mx-auto max-w-7xl px-4 py-20 lg:px-8"><div class="flex items-end justify-between gap-6"><div><p class="text-sm font-black uppercase tracking-[.2em] text-orange-600">L’effectif</p><h2 class="mt-2 text-4xl font-black">Nos joueurs</h2></div><a href="{{ route('team') }}" class="font-black">Voir l’équipe →</a></div><div class="mt-9 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">@foreach($players as $player)<a href="{{ route('players.show',$player) }}" class="group overflow-hidden rounded-3xl bg-zinc-100">@if($player->photo_path)<img src="{{ asset('storage/'.$player->photo_path) }}" alt="{{ $player->display_name ?: $player->first_name.' '.$player->last_name }}" class="aspect-[4/5] w-full object-cover transition duration-500 group-hover:scale-[1.03]">@else<div class="grid aspect-[4/5] place-items-center bg-zinc-200 text-5xl font-black text-zinc-300">ASZ</div>@endif<div class="p-5"><p class="text-xs font-black uppercase tracking-wider text-orange-600">{{ $player->position }}</p><h3 class="mt-1 text-xl font-black">{{ $player->display_name ?: $player->first_name.' '.$player->last_name }}</h3></div></a>@endforeach</div></div></section>@endif

<section class="bg-zinc-950 text-white"><div class="mx-auto max-w-7xl px-4 py-20 lg:px-8"><div class="flex items-end justify-between gap-6"><div><p class="text-sm font-black uppercase tracking-[.2em] text-orange-400">Dans la vie du club</p><h2 class="mt-2 text-4xl font-black">Dernières actualités</h2></div><a href="{{ route('news.index') }}" class="font-black text-orange-400">Toutes les actualités →</a></div>@if($news->isEmpty())<div class="mt-9 rounded-3xl border border-dashed border-white/20 p-10 text-zinc-400">Les premières actualités du club seront bientôt publiées.</div>@else<div class="mt-9 grid gap-5 md:grid-cols-3">@foreach($news as $post)<a href="{{ route('news.show',$post) }}" class="rounded-3xl border border-white/10 bg-white/[.05] p-7 transition hover:border-orange-500/40"><p class="text-xs font-black uppercase tracking-wider text-orange-400">{{ $post->published_at->format('d/m/Y') }}</p><h3 class="mt-3 text-2xl font-black">{{ $post->title }}</h3><p class="mt-4 leading-7 text-zinc-400">{{ $post->excerpt }}</p></a>@endforeach</div>@endif</div></section>

<section class="bg-orange-500"><div class="mx-auto max-w-7xl px-4 py-20 lg:px-8"><div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end"><div><p class="text-sm font-black uppercase tracking-[.2em]">Détection & recrutement</p><h2 class="mt-3 max-w-3xl text-4xl font-black tracking-tight sm:text-6xl">Ton histoire avec A.S ZINGA peut commencer ici.</h2><p class="mt-5 max-w-2xl text-lg text-orange-950/80">Tu es joueur et tu souhaites rejoindre le projet ? Présente ton profil directement au club.</p></div><a href="{{ route('recruitment') }}" class="inline-flex justify-center rounded-full bg-zinc-950 px-8 py-4 font-black text-white">Déposer ma candidature →</a></div></div></section>
@endsection
