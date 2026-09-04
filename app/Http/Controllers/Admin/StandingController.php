<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Standing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StandingController extends Controller
{
    public function create(Competition $competition)
    {
        return view('admin.standings.form', ['competition' => $competition, 'standing' => new Standing()]);
    }

    public function store(Request $request, Competition $competition)
    {
        $competition->standings()->create($this->validated($request, $competition));
        return redirect()->route('admin.competitions.edit', $competition)->with('success', 'Ligne de classement ajoutée.');
    }

    public function edit(Competition $competition, Standing $standing)
    {
        abort_unless($standing->competition_id === $competition->id, 404);
        return view('admin.standings.form', compact('competition','standing'));
    }

    public function update(Request $request, Competition $competition, Standing $standing)
    {
        abort_unless($standing->competition_id === $competition->id, 404);
        $standing->update($this->validated($request, $competition, $standing));
        return redirect()->route('admin.competitions.edit', $competition)->with('success', 'Classement mis à jour.');
    }

    public function destroy(Competition $competition, Standing $standing)
    {
        abort_unless($standing->competition_id === $competition->id, 404);
        $standing->delete();
        return redirect()->route('admin.competitions.edit', $competition)->with('success', 'Ligne supprimée.');
    }

    private function validated(Request $request, Competition $competition, ?Standing $standing = null): array
    {
        return $request->validate([
            'team_name' => ['required','string','max:255', Rule::unique('standings')->where(fn ($q) => $q->where('competition_id', $competition->id))->ignore($standing?->id)],
            'position' => ['required','integer','min:1', Rule::unique('standings')->where(fn ($q) => $q->where('competition_id', $competition->id))->ignore($standing?->id)],
            'played' => ['required','integer','min:0'], 'won' => ['required','integer','min:0'], 'drawn' => ['required','integer','min:0'], 'lost' => ['required','integer','min:0'],
            'goals_for' => ['required','integer','min:0'], 'goals_against' => ['required','integer','min:0'], 'points' => ['required','integer'],
        ]);
    }
}
