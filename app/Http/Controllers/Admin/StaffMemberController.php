<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\StaffMember;
use Illuminate\Http\Request;
class StaffMemberController extends Controller {
 public function index(){return view('admin.staff.index',['members'=>StaffMember::orderBy('sort_order')->paginate(20)]);}
 public function create(){return view('admin.staff.form',['member'=>new StaffMember]);}
 public function store(Request $r){StaffMember::create($this->data($r));return redirect()->route('admin.staff.index')->with('success','Membre du staff ajouté.');}
 public function edit(StaffMember $staff){return view('admin.staff.form',['member'=>$staff]);}
 public function update(Request $r,StaffMember $staff){$staff->update($this->data($r));return redirect()->route('admin.staff.index')->with('success','Staff mis à jour.');}
 public function destroy(StaffMember $staff){$staff->delete();return back()->with('success','Membre supprimé.');}
 private function data(Request $r): array{return $r->validate(['name'=>'required|string|max:150','role'=>'required|string|max:120','bio'=>'nullable|string|max:2000','phone'=>'nullable|string|max:40','sort_order'=>'nullable|integer|min:0','is_active'=>'nullable|boolean']);}
}
