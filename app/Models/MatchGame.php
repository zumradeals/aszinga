<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MatchGame extends Model { protected $table = 'matches'; protected $guarded = []; protected function casts(): array { return ['kickoff_at'=>'datetime']; } }
