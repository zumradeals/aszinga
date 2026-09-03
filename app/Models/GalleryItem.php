<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GalleryItem extends Model { protected $guarded=[]; protected function casts(): array { return ['taken_at'=>'date','is_published'=>'boolean']; } }
