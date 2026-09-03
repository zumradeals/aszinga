<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentApplication;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function create(){ return view('recruitment'); }
    public function store(Request $request){ $data=$request->validate(['full_name'=>'required|string|max:180','birth_date'=>'required|date|before:today','phone'=>'required|string|max:40','email'=>'nullable|email|max:180','position'=>'nullable|string|max:100','current_club'=>'nullable|string|max:180','city'=>'nullable|string|max:120','message'=>'nullable|string|max:3000']); $data['status']='new'; RecruitmentApplication::create($data); return redirect()->route('recruitment')->with('success','Votre candidature a bien été envoyée à A.S ZINGA.'); }
}
