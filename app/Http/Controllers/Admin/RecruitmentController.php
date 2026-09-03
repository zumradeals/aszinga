<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecruitmentApplication;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function index(){ return view('admin.recruitment.index',['applications'=>RecruitmentApplication::orderByDesc('created_at')->paginate(25)]); }
    public function edit(RecruitmentApplication $recruitment){ return view('admin.recruitment.edit',['application'=>$recruitment]); }
    public function update(Request $request, RecruitmentApplication $recruitment){ $data=$request->validate(['status'=>'required|in:new,reviewing,contacted,accepted,rejected','admin_notes'=>'nullable|string|max:5000']); $recruitment->update($data); return redirect()->route('admin.recruitment.index')->with('success','Candidature mise à jour.'); }
    public function destroy(RecruitmentApplication $recruitment){ $recruitment->delete(); return back()->with('success','Candidature supprimée.'); }
}
