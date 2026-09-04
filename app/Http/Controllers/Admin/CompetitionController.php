<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index()
    {
        return view('admin.competitions.index', ['competitions' => Competition::withCount('standings')->orderBy('sort_order')->orderBy('name')->get()]);
    }

    public function create()
    {
        return view('admin.competitions.form', ['competition' => new Competition()]);
    }

    public function store(Request $request)
    {
        Competition::create($this->validated($request));
        return redirect()->route('admin.competitions.index')->with('success', 'Compétition créée.');
    }

    public function edit(Competition $competition)
    {
        $competition->load('standings');
        return view('admin.competitions.form', compact('competition'));
    }

    public function update(Request $request, Competition $competition)
    {
        $competition->update($this->validated($request));
        return redirect()->route('admin.competitions.index')->with('success', 'Compétition mise à jour.');
    }

    public function destroy(Competition $competition)
    {
        $competition->delete();
        return redirect()->route('admin.competitions.index')->with('success', 'Compétition supprimée.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'season' => ['nullable','string','max:100'],
            'description' => ['nullable','string'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        $data['is_active'] = $request->boolean('is_active');
        return $data;
    }
}
