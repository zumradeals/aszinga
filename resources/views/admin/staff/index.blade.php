@extends('layouts.admin')
@section('title','Staff')
@section('content')
<div class="flex items-center justify-between gap-4">
    <div><p class="text-sm font-bold text-orange-600">Encadrement</p><h1 class="text-3xl font-black">Staff</h1></div>
    <a href="{{ route('admin.staff.create') }}" class="rounded-xl bg-orange-500 px-4 py-3 font-bold text-white">+ Membre</a>
</div>
<div class="mt-6 overflow-hidden rounded-2xl bg-white shadow-sm">
@forelse($members as $member)
    <div class="flex items-center justify-between gap-4 border-b border-zinc-100 p-4 last:border-0">
        <div class="min-w-0"><strong class="block truncate">{{ $member->name }}</strong><span class="text-sm text-zinc-500">{{ $member->role }} · {{ $member->is_active ? 'Actif' : 'Inactif' }}</span></div>
        <a href="{{ route('admin.staff.edit',$member) }}" class="shrink-0 text-sm font-bold text-orange-600">Modifier</a>
    </div>
@empty
    <div class="p-8 text-center text-zinc-500">Aucun membre du staff enregistré.</div>
@endforelse
</div>
<div class="mt-5">{{ $members->links() }}</div>
@endsection
