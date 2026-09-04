<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class NewsPostController extends Controller {
 public function index(){return view('admin.news.index',['posts'=>NewsPost::latest()->paginate(20)]);}
 public function create(){return view('admin.news.form',['post'=>new NewsPost]);}
 public function store(Request $r){$d=$this->data($r);$d['slug']=$this->slug($d['title']);$d['author_id']=$r->user()->id;if($r->hasFile('cover_image'))$d['cover_image_path']=$r->file('cover_image')->store('news','public');NewsPost::create($d);return redirect()->route('admin.news.index')->with('success','Actualité créée.');}
 public function edit(NewsPost $news){return view('admin.news.form',['post'=>$news]);}
 public function update(Request $r,NewsPost $news){$d=$this->data($r);if($news->title!==$d['title'])$d['slug']=$this->slug($d['title'],$news->id);if($r->boolean('remove_cover')&&$news->cover_image_path){Storage::disk('public')->delete($news->cover_image_path);$d['cover_image_path']=null;}if($r->hasFile('cover_image')){if($news->cover_image_path)Storage::disk('public')->delete($news->cover_image_path);$d['cover_image_path']=$r->file('cover_image')->store('news','public');}$news->update($d);return redirect()->route('admin.news.index')->with('success','Actualité mise à jour.');}
 public function destroy(NewsPost $news){if($news->cover_image_path)Storage::disk('public')->delete($news->cover_image_path);$news->delete();return back()->with('success','Actualité supprimée.');}
 private function data(Request $r): array {$d=$r->validate(['title'=>'required|string|max:180','excerpt'=>'nullable|string|max:500','body'=>'required|string','status'=>'required|in:draft,published','published_at'=>'nullable|date','cover_image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120','remove_cover'=>'nullable|boolean']);unset($d['cover_image'],$d['remove_cover']);return $d;}
 private function slug(string $title,?int $ignore=null): string {$base=Str::slug($title);$slug=$base;$i=2;while(NewsPost::where('slug',$slug)->when($ignore,fn($q)=>$q->whereKeyNot($ignore))->exists())$slug=$base.'-'.$i++;return $slug;}
}
