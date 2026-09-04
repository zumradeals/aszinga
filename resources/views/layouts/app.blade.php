<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#18181b">
    <title>@yield('title', 'A.S ZINGA — Club de football à Abobo')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-zinc-50 text-zinc-950">
<header class="sticky top-0 z-50 border-b border-black/10 bg-white/95 shadow-sm backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-4 py-3 lg:px-8">
        <a href="{{ route('home') }}" class="flex min-w-0 items-center gap-3"><div class="grid size-12 shrink-0 place-items-center rounded-xl bg-zinc-950 font-black text-orange-500 ring-2 ring-orange-500">ASZ</div><div class="min-w-0"><strong class="block truncate text-base leading-none">A.S ZINGA</strong><span class="mt-1 block truncate text-[11px] font-semibold uppercase tracking-wider text-zinc-500">Abobo • Abidjan</span></div></a>
        <nav class="hidden items-center gap-5 text-sm font-bold xl:flex"><a class="{{ request()->routeIs('club') ? 'text-orange-600' : 'hover:text-orange-600' }}" href="{{ route('club') }}">Le Club</a><a class="{{ request()->routeIs('team') ? 'text-orange-600' : 'hover:text-orange-600' }}" href="{{ route('team') }}">Équipe</a><a class="{{ request()->routeIs('matches') ? 'text-orange-600' : 'hover:text-orange-600' }}" href="{{ route('matches') }}">Matchs</a><a class="{{ request()->routeIs('news.*') ? 'text-orange-600' : 'hover:text-orange-600' }}" href="{{ route('news.index') }}">Actualités</a><a class="{{ request()->routeIs('gallery') ? 'text-orange-600' : 'hover:text-orange-600' }}" href="{{ route('gallery') }}">Galerie</a><a class="{{ request()->routeIs('partners') ? 'text-orange-600' : 'hover:text-orange-600' }}" href="{{ route('partners') }}">Partenaires</a><a class="{{ request()->routeIs('contact') ? 'text-orange-600' : 'hover:text-orange-600' }}" href="{{ route('contact') }}">Contact</a></nav>
        <div class="flex shrink-0 items-center gap-2"><a href="{{ route('recruitment') }}" class="hidden rounded-full bg-orange-500 px-4 py-2.5 text-sm font-black text-white sm:inline-flex">Rejoindre</a><button id="mobile-menu-button" type="button" aria-expanded="false" aria-controls="mobile-menu" aria-label="Ouvrir le menu" class="grid size-11 place-items-center rounded-xl border border-zinc-200 bg-white xl:hidden"><span id="mobile-menu-icon" class="text-xl">☰</span></button></div>
    </div>
    <div id="mobile-menu" class="hidden border-t border-zinc-200 bg-white xl:hidden">
      <nav class="mx-auto grid max-w-7xl grid-cols-2 gap-2 px-4 py-4 text-sm font-bold">
       <a class="rounded-xl bg-zinc-50 px-4 py-3" href="{{ route('club') }}">Le Club</a><a class="rounded-xl bg-zinc-50 px-4 py-3" href="{{ route('team') }}">Équipe</a><a class="rounded-xl bg-zinc-50 px-4 py-3" href="{{ route('matches') }}">Matchs</a><a class="rounded-xl bg-zinc-50 px-4 py-3" href="{{ route('news.index') }}">Actualités</a><a class="rounded-xl bg-zinc-50 px-4 py-3" href="{{ route('gallery') }}">Galerie</a><a class="rounded-xl bg-zinc-50 px-4 py-3" href="{{ route('partners') }}">Partenaires</a><a class="rounded-xl bg-zinc-50 px-4 py-3" href="{{ route('contact') }}">Contact</a><a class="rounded-xl bg-orange-500 px-4 py-3 text-white" href="{{ route('recruitment') }}">Rejoindre le club</a>
      </nav>
    </div>
</header>
<main>@yield('content')</main>
<footer class="bg-zinc-950 text-white">
 <div class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
  <div class="grid gap-12 border-b border-white/10 pb-12 md:grid-cols-2 lg:grid-cols-4">
   <div><div class="flex items-center gap-3"><div class="grid size-14 place-items-center rounded-xl border-2 border-orange-500 font-black text-orange-500">ASZ</div><div><strong class="text-xl">A.S ZINGA</strong><p class="text-xs uppercase tracking-wider text-zinc-500">Association Sportive</p></div></div><p class="mt-5 max-w-xs text-sm leading-6 text-zinc-400">La passion du football, l’avenir de nos jeunes. Un club enraciné à Abobo et tourné vers la formation, la discipline et l’ambition.</p></div>
   <div><h3 class="font-black">Le club</h3><div class="mt-5 grid gap-3 text-sm text-zinc-400"><a class="hover:text-white" href="{{ route('club') }}">Notre histoire</a><a class="hover:text-white" href="{{ route('team') }}">Notre équipe</a><a class="hover:text-white" href="{{ route('matches') }}">Matchs & résultats</a><a class="hover:text-white" href="{{ route('news.index') }}">Actualités</a></div></div>
   <div><h3 class="font-black">Découvrir</h3><div class="mt-5 grid gap-3 text-sm text-zinc-400"><a class="hover:text-white" href="{{ route('gallery') }}">Galerie</a><a class="hover:text-white" href="{{ route('partners') }}">Partenaires</a><a class="hover:text-white" href="{{ route('recruitment') }}">Recrutement / Détection</a><a class="hover:text-white" href="{{ route('contact') }}">Nous contacter</a></div></div>
   <div><h3 class="font-black">A.S ZINGA</h3><div class="mt-5 space-y-3 text-sm text-zinc-400"><p>Abobo, Abidjan<br>Côte d’Ivoire</p><p><a class="hover:text-white" href="tel:+2250708252046">+225 07 08 25 20 46</a></p><p>Suivez la vie du club et ses prochaines rencontres sur nos canaux officiels.</p></div></div>
  </div>
  <div class="flex flex-col gap-3 pt-7 text-xs text-zinc-500 sm:flex-row sm:items-center sm:justify-between"><p>© {{ date('Y') }} Association Sportive Zinga. Tous droits réservés.</p><p>Formation • Travail • Discipline • Ambition</p></div>
 </div>
</footer>
</body></html>
