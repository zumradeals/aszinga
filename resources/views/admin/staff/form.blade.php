@extends('layouts.admin')
@section('title',$member->exists?'Modifier le staff':'Ajouter au staff')
@section('content')
<h1 class="text-3xl font-black">{{ $member->exists?'Modifier le membre':'Ajouter un membre du staff' }}</h1>
<form method="POST" action="{{ $member->exists?route('admin.staff.update',$member):route('admin.staff.store') }}" class="mt-6 max-w-3xl rounded-2xl bg-white p-5 sm:p-7">
    @csrf
    @if($member->exists) @method('PUT') @endif
    @if($errors->any())<div class="mb-5 rounded-xl bg-red-50 p-4 text-red-700">{{ $errors->first() }}</div>@endif
    <div class="grid gap-5 sm:grid-cols-2">
        <label class="text-sm font-bold">Nom<input name="name" value="{{ old('name',$member->name) }}" required class="mt-2 w-full rounded-xl border border-zinc-300 px-4 py-3 font-normal"></label>
        <label class="text-sm font-bold">Fonction<input name="role" value="{{ old('role',$member->role) }}" required class="mt-2 w-full rounded-xl border border-zinc-300 px-4 py-3 font-normal"></label>
        <label class="text-sm font-bold">Téléphone<input name="phone" value="{{ old('phone',$member->phone) }}" class="mt-2 w-full rounded-xl border border-zinc-300 px-4 py-3 font-normal"></label>
        <label class="text-sm font-bold">Ordre<input name="sort_order" type="number" min="0" value="{{ old('sort_order',$member->sort_order ?? 0) }}" class="mt-2 w-full rounded-xl border border-zinc-300 px-4 py-3 font-normal"></label>
        <label class="flex items-center gap-2 self-end py-3 text-sm font-bold"><input type="hidden" name="is_active" value="0"><input type="checkbox" name="is_active" value="1" @checked(old('is_active',$member->exists?$member->is_active:true))> Membre actif</label>
    </div>
    <label class="mt-5 block text-sm font-bold">Présentation<textarea name="bio" rows="5" class="mt-2 w-full rounded-xl border border-zinc-300 px-4 py-3 font-normal">{{ old('bio',$member->bio) }}</textarea></label>
    <div class="mt-6 flex gap-3"><button class="rounded-xl bg-orange-500 px-5 py-3 font-black text-white">Enregistrer</button><a href="{{ route('admin.staff.index') }}" class="rounded-xl border border-zinc-300 px-5 py-3 font-bold">Annuler</a></div>
</form>
@endsection
