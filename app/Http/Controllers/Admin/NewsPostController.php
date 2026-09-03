<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class NewsPostController extends Controller {
 public function index(){return view('admin.news.index',['posts'=>NewsPost::latest()->paginate(20)]);}
 public function create(){return view('admin.news.form',['post'=>new NewsPost]);}
 public function store(Request $r){$d=$this->data($r);$d['slug']=$this->slug($d['title']);$d['author_id']=$r->user()->id;NewsPost::create($d);return redirect()->route('admin.news.index')->with('success','Actualité créée.');}
 public function edit(NewsPost $news){return view('admin.news.form',['post'=>$news]);}
 public function update(Request $r,NewsPost $news){$d=$this->data($r);if($news->title!==$d['title'])$d['slug']=$this->slug($d['title'],$news->id);$news->update($d);return redirect()->route('admin.news.index')->with('success','Actualité mise à jour.');}
 public function destroy(NewsPost $news){$news->delete();return back()->with('success','Actualité supprimée.');}
 private function data(Request $r): array {return $r->validate(['title'=>'required|string|max:180','excerpt'=>'nullable|string|max:500','body'=>'required|string','status'=>'required|in:draft,published','published_at'=>'nullable|date']);}
 private function slug(string $title,?int $ignore=null): string {$base=Str::slug($title);$slug=$base;$i=2;while(NewsPost::where('slug',$slug)->when($ignore,fn($q)=>$q->whereKeyNot($ignore))->exists())$slug=$base.'-'.$i++;return $slug;}
}
