<?php

namespace App\Http\Controllers;

use App\Models\MatchGame;
use App\Models\NewsPost;
use App\Models\Player;
use App\Models\StaffMember;

class PublicContentController extends Controller
{
    public function team()
    {
        return view('team', [
            'players' => Player::where('is_active', true)->orderBy('sort_order')->orderBy('shirt_number')->get(),
            'staff' => StaffMember::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function matches()
    {
        return view('matches', [
            'upcomingMatches' => MatchGame::where('status', 'programme')->orderBy('kickoff_at')->get(),
            'results' => MatchGame::where('status', 'termine')->orderByDesc('kickoff_at')->get(),
        ]);
    }

    public function news()
    {
        return view('news.index', [
            'posts' => NewsPost::where('status', 'published')
                ->whereNotNull('published_at')
                ->where('published_at', '<=', now())
                ->orderByDesc('published_at')
                ->paginate(9),
        ]);
    }
}
