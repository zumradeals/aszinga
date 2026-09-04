<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSetting;
use App\Models\Player;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeHeroController extends Controller
{
    public function edit(): View
    {
        return view('admin.home-hero.edit', [
            'hero' => HomeHeroSetting::query()->first(),
            'players' => Player::query()->where('is_active', true)->orderBy('sort_order')->orderBy('last_name')->get(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'eyebrow' => ['required', 'string', 'max:120'],
            'title' => ['required', 'string', 'max:80'],
            'highlight' => ['required', 'string', 'max:80'],
            'subtitle' => ['required', 'string', 'max:140'],
            'description' => ['nullable', 'string', 'max:500'],
            'player_one_id' => ['nullable', 'exists:players,id'],
            'player_two_id' => ['nullable', 'exists:players,id'],
            'player_three_id' => ['nullable', 'exists:players,id'],
        ]);

        $selected = array_filter([$data['player_one_id'] ?? null, $data['player_two_id'] ?? null, $data['player_three_id'] ?? null]);
        if (count($selected) !== count(array_unique($selected))) {
            return back()->withErrors(['player_one_id' => 'Un même joueur ne peut pas occuper plusieurs positions dans le Hero.'])->withInput();
        }

        $data['show_tiger'] = $request->boolean('show_tiger');
        $data['is_active'] = $request->boolean('is_active');

        HomeHeroSetting::query()->updateOrCreate(['id' => 1], $data);

        return redirect()->route('admin.home-hero.edit')->with('success', 'Hero de la page d’accueil mis à jour.');
    }
}
