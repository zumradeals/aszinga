<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'A.S ZINGA — Club de football à Abobo')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-zinc-50 text-zinc-950">
<header class="sticky top-0 z-50 border-b border-black/10 bg-white/95 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 lg:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3"><div class="grid size-11 place-items-center rounded-xl bg-orange-500 font-black text-white">ASZ</div><div><strong class="block leading-none">A.S ZINGA</strong><span class="text-xs text-zinc-500">Abobo • Abidjan</span></div></a>
        <nav class="hidden gap-6 text-sm font-semibold lg:flex"><a href="{{ route('club') }}">Le Club</a><a href="{{ route('team') }}">Équipe</a><a href="{{ route('matches') }}">Matchs</a><a href="{{ route('news.index') }}">Actualités</a><a href="{{ route('gallery') }}">Galerie</a><a href="{{ route('contact') }}">Contact</a></nav>
        <a href="{{ route('contact') }}" class="rounded-full bg-orange-500 px-4 py-2 text-sm font-bold text-white">Rejoindre le club</a>
    </div>
</header>
<main>@yield('content')</main>
<footer class="mt-16 bg-zinc-950 text-white"><div class="mx-auto max-w-7xl px-4 py-10 lg:px-8"><strong>A.S ZINGA</strong><p class="mt-2 text-sm text-zinc-400">Association Sportive Zinga • Abobo, Abidjan, Côte d'Ivoire</p></div></footer>
</body></html>
