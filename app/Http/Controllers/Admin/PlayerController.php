<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    public function index()
    {
        return view('admin.players.index', ['players' => Player::orderBy('sort_order')->orderBy('last_name')->paginate(20)]);
    }

    public function create()
    {
        return view('admin.players.form', ['player' => new Player]);
    }

    public function store(Request $request)
    {
        $data = $this->playerData($request);

        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('players', 'public');
        }

        Player::create($data);

        return redirect()->route('admin.players.index')->with('success', 'Joueur ajouté.');
    }

    public function edit(Player $player)
    {
        return view('admin.players.form', compact('player'));
    }

    public function update(Request $request, Player $player)
    {
        $data = $this->playerData($request);

        if ($request->boolean('remove_photo') && $player->photo_path) {
            Storage::disk('public')->delete($player->photo_path);
            $data['photo_path'] = null;
        }

        if ($request->hasFile('photo')) {
            $newPhotoPath = $request->file('photo')->store('players', 'public');

            if ($player->photo_path) {
                Storage::disk('public')->delete($player->photo_path);
            }

            $data['photo_path'] = $newPhotoPath;
        }

        $player->update($data);

        return redirect()->route('admin.players.index')->with('success', 'Joueur mis à jour.');
    }

    public function destroy(Player $player)
    {
        if ($player->photo_path) {
            Storage::disk('public')->delete($player->photo_path);
        }

        $player->delete();

        return back()->with('success', 'Joueur supprimé.');
    }

    private function playerData(Request $request): array
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'display_name' => 'nullable|string|max:150',
            'shirt_number' => 'nullable|integer|min:0|max:99',
            'position' => 'required|string|max:80',
            'birth_date' => 'nullable|date',
            'height_cm' => 'nullable|integer|min:100|max:250',
            'preferred_foot' => 'nullable|in:droit,gauche,ambidextre',
            'bio' => 'nullable|string|max:2000',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'remove_photo' => 'nullable|boolean',
        ]);

        unset($validated['photo'], $validated['remove_photo']);

        return $validated;
    }
}
