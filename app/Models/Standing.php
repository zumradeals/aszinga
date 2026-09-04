<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Standing extends Model
{
    protected $guarded = [];

    public function competition(): BelongsTo
    {
        return $this->belongsTo(Competition::class);
    }

    public function getGoalDifferenceAttribute(): int
    {
        return $this->goals_for - $this->goals_against;
    }
}
