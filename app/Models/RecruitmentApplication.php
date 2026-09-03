<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class RecruitmentApplication extends Model { protected $guarded = []; protected function casts(): array { return ['birth_date'=>'date']; } }
