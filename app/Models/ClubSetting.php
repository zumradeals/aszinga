<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClubSetting extends Model
{
    protected $guarded = [];

    public static function current(): self
    {
        return static::firstOrCreate([], [
            'official_name' => 'Association Sportive Zinga',
            'short_name' => 'A.S ZINGA',
            'slogan' => 'La passion du football, l’avenir de nos jeunes.',
            'description' => 'A.S ZINGA est un club de football basé à Abobo, Abidjan.',
            'phone' => '0708252046',
            'address' => 'Abobo, Abidjan, Côte d’Ivoire',
        ]);
    }
}
