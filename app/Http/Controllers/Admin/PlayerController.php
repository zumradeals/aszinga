<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
 public function index(){return view('admin.players.index',['players'=>Player::orderBy('sort_order')->orderBy('last_name')->paginate(20)]);}
 public function create(){return view('admin.players.form',['player'=>new Player]);}
 public function store(Request $r){Player::create($this->validated($r));return redirect()->route('admin.players.index')->with('success','Joueur ajouté.');}
 public function edit(Player $player){return view('admin.players.form',compact('player'));}
 public function update(Request $r,Player $player){$player->update($this->validated($r));return redirect()->route('admin.players.index')->with('success','Joueur mis à jour.');}
 public function destroy(Player $player){$player->delete();return back()->with('success','Joueur supprimé.');}
 private function validated(Request $r): array {return $r->validate(['first_name'=>'required|string|max:100','last_name'=>'required|string|max:100','display_name'=>'nullable|string|max:150','shirt_number'=>'nullable|integer|min:0|max:99','position'=>'required|string|max:80','birth_date'=>'nullable|date','height_cm'=>'nullable|integer|min:100|max:250','preferred_foot'=>'nullable|in:droit,gauche,ambidextre','bio'=>'nullable|string|max:2000','sort_order'=>'nullable|integer|min:0','is_active'=>'nullable|boolean']);}
}
