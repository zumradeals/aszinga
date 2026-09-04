@extends('layouts.admin')
@section('title','Paramètres du club')
@section('content')
<h1 class="text-3xl font-black">Paramètres du club</h1>
<p class="mt-2 text-zinc-600">Identité et coordonnées officielles de A.S ZINGA.</p>
<form method="POST" enctype="multipart/form-data" action="{{ route('admin.club-settings.update') }}" class="mt-7 max-w-4xl rounded-3xl bg-white p-6">
@csrf @method('PUT')
@if($errors->any())<div class="mb-5 rounded-xl bg-red-50 p-4 text-red-700">{{ $errors->first() }}</div>@endif
<div class="grid gap-5 sm:grid-cols-2">
<label class="text-sm font-bold">Nom officiel<input name="official_name" value="{{ old('official_name',$settings->official_name) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold">Nom court<input name="short_name" value="{{ old('short_name',$settings->short_name) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold sm:col-span-2">Slogan<input name="slogan" value="{{ old('slogan',$settings->slogan) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold">Téléphone<input name="phone" value="{{ old('phone',$settings->phone) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold">Email<input name="email" value="{{ old('email',$settings->email) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold sm:col-span-2">Adresse<input name="address" value="{{ old('address',$settings->address) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold">Facebook<input name="facebook_url" value="{{ old('facebook_url',$settings->facebook_url) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold">Instagram<input name="instagram_url" value="{{ old('instagram_url',$settings->instagram_url) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold">YouTube<input name="youtube_url" value="{{ old('youtube_url',$settings->youtube_url) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
<label class="text-sm font-bold">TikTok<input name="tiktok_url" value="{{ old('tiktok_url',$settings->tiktok_url) }}" class="mt-2 w-full rounded-xl border px-4 py-3"></label>
</div>
<label class="mt-5 block text-sm font-bold">Description<textarea name="description" rows="5" class="mt-2 w-full rounded-xl border px-4 py-3">{{ old('description',$settings->description) }}</textarea></label>
<label class="mt-5 block text-sm font-bold">Texte recrutement<textarea name="recruitment_text" rows="4" class="mt-2 w-full rounded-xl border px-4 py-3">{{ old('recruitment_text',$settings->recruitment_text) }}</textarea></label>
<div class="mt-6 rounded-2xl border bg-zinc-50 p-5"><strong class="text-sm">Logo du club</strong>@if($settings->logo_path)<img src="{{ asset('storage/'.$settings->logo_path) }}" class="mt-4 h-28 w-28 object-contain"><label class="mt-3 flex gap-2 text-sm"><input type="checkbox" name="remove_logo" value="1"> Supprimer le logo actuel</label>@endif<input type="file" name="logo" accept="image/jpeg,image/png,image/webp" class="mt-4 block w-full"></div>
<button class="mt-7 rounded-xl bg-orange-500 px-6 py-3 font-black text-white">Enregistrer</button>
</form>
@endsection
