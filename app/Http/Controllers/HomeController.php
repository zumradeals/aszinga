<?php

namespace App\Http\Controllers;

use App\Models\MatchGame;
use App\Models\NewsPost;
use App\Models\Player;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'nextMatch' => MatchGame::query()->where('status', 'programme')->where('kickoff_at', '>=', now())->orderBy('kickoff_at')->first(),
            'lastMatch' => MatchGame::query()->where('status', 'termine')->whereNotNull('as_zinga_score')->orderByDesc('kickoff_at')->first(),
            'news' => NewsPost::query()->where('status', 'published')->where('published_at', '<=', now())->latest('published_at')->limit(3)->get(),
            'players' => Player::query()->where('is_active', true)->orderBy('sort_order')->limit(4)->get(),
        ]);
    }
}
