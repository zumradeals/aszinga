@extends('layouts.app')
@section('title','Actualités — A.S ZINGA')
@section('content')
<section class="mx-auto max-w-7xl px-4 py-12 lg:px-8 lg:py-16">
    <p class="font-black uppercase tracking-widest text-orange-600">Le club au quotidien</p><h1 class="mt-2 text-4xl font-black">Actualités</h1><p class="mt-3 max-w-2xl text-zinc-600">Communiqués, vie du club, rencontres et informations officielles A.S ZINGA.</p>
    <div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
    @forelse($posts as $post)
        <article class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm">
            @if($post->cover_image_path)<img src="{{ asset('storage/'.$post->cover_image_path) }}" alt="{{ $post->title }}" class="aspect-video w-full object-cover">@else<div class="grid aspect-video place-items-center bg-zinc-950 text-2xl font-black text-orange-500">A.S ZINGA</div>@endif
            <div class="p-5"><time class="text-xs font-bold uppercase tracking-wider text-orange-600">{{ optional($post->published_at)->format('d/m/Y') }}</time><h2 class="mt-2 text-xl font-black">{{ $post->title }}</h2>@if($post->excerpt)<p class="mt-3 text-sm leading-6 text-zinc-600">{{ $post->excerpt }}</p>@else<p class="mt-3 text-sm leading-6 text-zinc-600">{{ \Illuminate\Support\Str::limit(strip_tags($post->body), 150) }}</p>@endif</div>
        </article>
    @empty
        <div class="col-span-full rounded-2xl border border-dashed border-zinc-300 p-10 text-center text-zinc-500">Aucune actualité publiée pour le moment.</div>
    @endforelse
    </div>
    <div class="mt-8">{{ $posts->links() }}</div>
</section>
@endsection
