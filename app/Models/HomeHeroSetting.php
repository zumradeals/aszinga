<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeHeroSetting extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'show_tiger' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function playerOne(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_one_id');
    }

    public function playerTwo(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_two_id');
    }

    public function playerThree(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_three_id');
    }

    public function selectedPlayers(): array
    {
        return collect([$this->playerOne, $this->playerTwo, $this->playerThree])
            ->filter(fn ($player) => $player && $player->is_active && $player->photo_path)
            ->unique('id')
            ->values()
            ->all();
    }
}
