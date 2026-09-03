<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\MatchGame;
use Illuminate\Http\Request;
class MatchController extends Controller {
 public function index(){return view('admin.matches.index',['matches'=>MatchGame::orderByDesc('kickoff_at')->paginate(20)]);}
 public function create(){return view('admin.matches.form',['match'=>new MatchGame]);}
 public function store(Request $r){MatchGame::create($this->validated($r));return redirect()->route('admin.matches.index')->with('success','Match ajouté.');}
 public function edit(MatchGame $match){return view('admin.matches.form',compact('match'));}
 public function update(Request $r,MatchGame $match){$match->update($this->validated($r));return redirect()->route('admin.matches.index')->with('success','Match mis à jour.');}
 public function destroy(MatchGame $match){$match->delete();return back()->with('success','Match supprimé.');}
 private function validated(Request $r): array {return $r->validate(['opponent_name'=>'required|string|max:150','competition'=>'nullable|string|max:150','venue_type'=>'required|in:home,away,neutral','kickoff_at'=>'required|date','venue'=>'nullable|string|max:180','status'=>'required|in:programme,termine,reporte,annule','as_zinga_score'=>'nullable|integer|min:0|max:99','opponent_score'=>'nullable|integer|min:0|max:99','summary'=>'nullable|string|max:5000']);}
}
