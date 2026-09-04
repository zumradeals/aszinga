<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\StaffMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class StaffMemberController extends Controller {
 public function index(){return view('admin.staff.index',['members'=>StaffMember::orderBy('sort_order')->paginate(20)]);}
 public function create(){return view('admin.staff.form',['member'=>new StaffMember]);}
 public function store(Request $r){$d=$this->data($r);if($r->hasFile('photo'))$d['photo_path']=$r->file('photo')->store('staff','public');StaffMember::create($d);return redirect()->route('admin.staff.index')->with('success','Membre du staff ajouté.');}
 public function edit(StaffMember $staff){return view('admin.staff.form',['member'=>$staff]);}
 public function update(Request $r,StaffMember $staff){$d=$this->data($r);if($r->boolean('remove_photo')&&$staff->photo_path){Storage::disk('public')->delete($staff->photo_path);$d['photo_path']=null;}if($r->hasFile('photo')){if($staff->photo_path)Storage::disk('public')->delete($staff->photo_path);$d['photo_path']=$r->file('photo')->store('staff','public');}$staff->update($d);return redirect()->route('admin.staff.index')->with('success','Staff mis à jour.');}
 public function destroy(StaffMember $staff){if($staff->photo_path)Storage::disk('public')->delete($staff->photo_path);$staff->delete();return back()->with('success','Membre supprimé.');}
 private function data(Request $r): array{$d=$r->validate(['name'=>'required|string|max:150','role'=>'required|string|max:120','bio'=>'nullable|string|max:2000','phone'=>'nullable|string|max:40','sort_order'=>'nullable|integer|min:0','is_active'=>'nullable|boolean','photo'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120','remove_photo'=>'nullable|boolean']);unset($d['photo'],$d['remove_photo']);return $d;}
}
