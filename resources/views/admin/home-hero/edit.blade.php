@extends('layouts.admin')
@section('title','Hero Accueil')
@section('content')
<div class="mx-auto max-w-5xl">
 <div class="mb-7"><p class="text-sm font-black uppercase tracking-[.2em] text-orange-600">Identité média</p><h1 class="mt-2 text-3xl font-black">Hero de la page d’accueil</h1><p class="mt-2 text-zinc-600">Choisissez jusqu’à trois vrais joueurs A.S ZINGA. Seuls les joueurs actifs possédant une photo pourront apparaître dans la composition publique.</p></div>
 @if($errors->any())<div class="mb-6 rounded-2xl bg-red-50 p-5 text-sm text-red-800"><ul class="list-disc space-y-1 pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
 <form method="POST" action="{{ route('admin.home-hero.update') }}" class="space-y-6">@csrf @method('PUT')
  <div class="grid gap-5 rounded-3xl bg-white p-6 shadow-sm md:grid-cols-2">
   <label class="md:col-span-2"><span class="mb-2 block text-sm font-bold">Ligne de contexte</span><input name="eyebrow" value="{{ old('eyebrow',$hero?->eyebrow ?? 'Abobo • Abidjan • Côte d’Ivoire') }}" class="w-full rounded-xl border border-zinc-300 px-4 py-3"></label>
   <label><span class="mb-2 block text-sm font-bold">Titre</span><input name="title" value="{{ old('title',$hero?->title ?? 'ENSEMBLE') }}" class="w-full rounded-xl border border-zinc-300 px-4 py-3"></label>
   <label><span class="mb-2 block text-sm font-bold">Titre orange</span><input name="highlight" value="{{ old('highlight',$hero?->highlight ?? 'PLUS FORTS') }}" class="w-full rounded-xl border border-zinc-300 px-4 py-3"></label>
   <label class="md:col-span-2"><span class="mb-2 block text-sm font-bold">Sous-titre</span><input name="subtitle" value="{{ old('subtitle',$hero?->subtitle ?? 'Formation, Discipline, Ambition') }}" class="w-full rounded-xl border border-zinc-300 px-4 py-3"></label>
   <label class="md:col-span-2"><span class="mb-2 block text-sm font-bold">Description</span><textarea name="description" rows="3" class="w-full rounded-xl border border-zinc-300 px-4 py-3">{{ old('description',$hero?->description ?? 'A.S ZINGA construit aujourd’hui les talents de demain, à Abobo et partout.') }}</textarea></label>
  </div>
  <div class="rounded-3xl bg-zinc-950 p-6 text-white"><div class="mb-5"><p class="text-sm font-black uppercase tracking-[.18em] text-orange-400">Composition joueurs</p><p class="mt-2 text-sm text-zinc-400">L’ordre 1, 2, 3 détermine la mise en avant. Un emplacement vide ne crée jamais de joueur fictif.</p></div><div class="grid gap-4 md:grid-cols-3">@foreach([1=>'one',2=>'two',3=>'three'] as $number=>$key)<label><span class="mb-2 block text-sm font-bold">Joueur {{ $number }}</span><select name="player_{{ $key }}_id" class="w-full rounded-xl border border-white/15 bg-zinc-900 px-4 py-3"><option value="">Aucun</option>@foreach($players as $player)<option value="{{ $player->id }}" @selected(old('player_'.$key.'_id',$hero?->{'player_'.$key.'_id'})==$player->id)>{{ $player->display_name ?: $player->first_name.' '.$player->last_name }}{{ $player->photo_path ? '' : ' — sans photo' }}</option>@endforeach</select></label>@endforeach</div></div>
  <div class="flex flex-wrap gap-6 rounded-3xl bg-white p-6 shadow-sm"><label class="flex items-center gap-3 font-bold"><input type="checkbox" name="show_tiger" value="1" @checked(old('show_tiger',$hero?->show_tiger ?? true)) class="h-5 w-5">Afficher l’identité tigre 🐯</label><label class="flex items-center gap-3 font-bold"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$hero?->is_active ?? true)) class="h-5 w-5">Hero dynamique actif</label></div>
  <button class="rounded-full bg-orange-500 px-7 py-3.5 font-black text-white hover:bg-orange-400">Enregistrer le Hero</button>
 </form>
</div>
@endsection
