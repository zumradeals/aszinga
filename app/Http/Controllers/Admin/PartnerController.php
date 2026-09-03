<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index(){ return view('admin.partners.index',['partners'=>Partner::orderBy('sort_order')->orderBy('name')->paginate(20)]); }
    public function create(){ return view('admin.partners.form',['partner'=>new Partner]); }
    public function store(Request $request){ $data=$this->validated($request); if($request->hasFile('logo')) $data['logo_path']=$request->file('logo')->store('partners','public'); Partner::create($data); return redirect()->route('admin.partners.index')->with('success','Partenaire ajouté.'); }
    public function edit(Partner $partner){ return view('admin.partners.form',compact('partner')); }
    public function update(Request $request, Partner $partner){ $data=$this->validated($request); if($request->hasFile('logo')) { if($partner->logo_path) Storage::disk('public')->delete($partner->logo_path); $data['logo_path']=$request->file('logo')->store('partners','public'); } $partner->update($data); return redirect()->route('admin.partners.index')->with('success','Partenaire mis à jour.'); }
    public function destroy(Partner $partner){ if($partner->logo_path) Storage::disk('public')->delete($partner->logo_path); $partner->delete(); return back()->with('success','Partenaire supprimé.'); }
    private function validated(Request $request): array { return $request->validate(['name'=>'required|string|max:180','website_url'=>'nullable|url|max:500','logo'=>'nullable|image|max:4096','sort_order'=>'nullable|integer|min:0','is_active'=>'required|boolean']); }
}
