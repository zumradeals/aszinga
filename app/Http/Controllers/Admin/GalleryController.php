<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index() { return view('admin.gallery.index', ['items' => GalleryItem::orderByDesc('created_at')->paginate(20)]); }
    public function create() { return view('admin.gallery.form', ['item' => new GalleryItem]); }
    public function store(Request $request) { $data=$this->validated($request); if($request->hasFile('image')) $data['image_path']=$request->file('image')->store('gallery','public'); GalleryItem::create($data); return redirect()->route('admin.gallery.index')->with('success','Photo ajoutée.'); }
    public function edit(GalleryItem $gallery) { return view('admin.gallery.form',['item'=>$gallery]); }
    public function update(Request $request, GalleryItem $gallery) { $data=$this->validated($request); if($request->hasFile('image')) { if($gallery->image_path) Storage::disk('public')->delete($gallery->image_path); $data['image_path']=$request->file('image')->store('gallery','public'); } $gallery->update($data); return redirect()->route('admin.gallery.index')->with('success','Photo mise à jour.'); }
    public function destroy(GalleryItem $gallery) { if($gallery->image_path) Storage::disk('public')->delete($gallery->image_path); $gallery->delete(); return back()->with('success','Photo supprimée.'); }
    private function validated(Request $request): array { $request->validate(['title'=>'nullable|string|max:180','caption'=>'nullable|string|max:1000','taken_at'=>'nullable|date','image'=>'nullable|image|max:8192','is_published'=>'required|boolean']); return $request->only(['title','caption','taken_at','is_published']); }
}
