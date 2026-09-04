@extends('layouts.admin')
@section('title',$player->exists?'Modifier joueur':'Ajouter joueur')
@section('content')
<h1 class="text-3xl font-black">{{ $player->exists?'Modifier le joueur':'Ajouter un joueur' }}</h1>
<form method="POST" enctype="multipart/form-data" action="{{ $player->exists?route('admin.players.update',$player):route('admin.players.store') }}" class="mt-6 max-w-3xl rounded-2xl bg-white p-5 sm:p-7">
    @csrf
    @if($player->exists) @method('PUT') @endif
    @if($errors->any())<div class="mb-5 rounded-xl bg-red-50 p-4 text-red-700">{{ $errors->first() }}</div>@endif

    <div class="mb-7 rounded-2xl border border-zinc-200 bg-zinc-50 p-5">
        <label class="block text-sm font-black">Photo du joueur</label>
        <p class="mt-1 text-xs text-zinc-500">JPG, PNG ou WebP — maximum 5 Mo. Une photo verticale nette donnera le meilleur rendu dans l’équipe et le Hero.</p>
        @if($player->photo_path)
            <div class="mt-4 flex flex-wrap items-end gap-5">
                <img src="{{ asset('storage/'.$player->photo_path) }}" alt="Photo actuelle" class="h-40 w-32 rounded-2xl border border-zinc-200 bg-white object-cover">
                <label class="flex items-center gap-2 text-sm font-bold text-red-700"><input type="hidden" name="remove_photo" value="0"><input type="checkbox" name="remove_photo" value="1"> Supprimer la photo actuelle</label>
            </div>
        @endif
        <input name="photo" type="file" accept="image/jpeg,image/png,image/webp" class="mt-4 block w-full rounded-xl border border-zinc-300 bg-white px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-orange-500 file:px-4 file:py-2 file:font-black file:text-white">
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        @foreach([['first_name','Prénom','text'],['last_name','Nom','text'],['display_name','Nom affiché','text'],['shirt_number','Numéro','number'],['position','Poste','text'],['birth_date','Date de naissance','date'],['height_cm','Taille (cm)','number'],['sort_order','Ordre','number']] as [$name,$label,$type])
            <label class="text-sm font-bold">{{ $label }}<input name="{{ $name }}" type="{{ $type }}" value="{{ old($name,$player->$name) }}" class="mt-2 w-full rounded-xl border border-zinc-300 px-4 py-3 font-normal"></label>
        @endforeach
        <label class="text-sm font-bold">Pied fort<select name="preferred_foot" class="mt-2 w-full rounded-xl border border-zinc-300 px-4 py-3 font-normal"><option value="">—</option>@foreach(['droit'=>'Droit','gauche'=>'Gauche','ambidextre'=>'Ambidextre'] as $v=>$l)<option value="{{ $v }}" @selected(old('preferred_foot',$player->preferred_foot)===$v)>{{ $l }}</option>@endforeach</select></label>
        <label class="flex items-center gap-2 self-end py-3 text-sm font-bold"><input type="hidden" name="is_active" value="0"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$player->exists?$player->is_active:true))> Joueur actif</label>
    </div>
    <label class="mt-5 block text-sm font-bold">Biographie<textarea name="bio" rows="4" class="mt-2 w-full rounded-xl border border-zinc-300 px-4 py-3 font-normal">{{ old('bio',$player->bio) }}</textarea></label>
    <div class="mt-6 flex gap-3"><button class="rounded-xl bg-orange-500 px-5 py-3 font-black text-white">Enregistrer</button><a href="{{ route('admin.players.index') }}" class="rounded-xl border border-zinc-300 px-5 py-3 font-bold">Annuler</a></div>
</form>
@endsection
