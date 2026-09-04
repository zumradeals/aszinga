<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\GalleryItem;
use App\Models\MatchGame;
use App\Models\NewsPost;
use App\Models\Partner;
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

    public function player(Player $player)
    {
        abort_unless($player->is_active, 404);
        return view('players.show', compact('player'));
    }

    public function matches()
    {
        return view('matches', [
            'upcomingMatches' => MatchGame::where('status', 'programme')->orderBy('kickoff_at')->get(),
            'results' => MatchGame::where('status', 'termine')->orderByDesc('kickoff_at')->get(),
        ]);
    }

    public function match(MatchGame $match)
    {
        return view('matches.show', compact('match'));
    }

    public function standings()
    {
        return view('standings', [
            'competitions' => Competition::where('is_active', true)
                ->with('standings')
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function news()
    {
        return view('news.index', [
            'posts' => NewsPost::where('status', 'published')->whereNotNull('published_at')->where('published_at', '<=', now())->orderByDesc('published_at')->paginate(9),
        ]);
    }

    public function newsShow(NewsPost $newsPost)
    {
        abort_unless($newsPost->status === 'published' && $newsPost->published_at && $newsPost->published_at->lte(now()), 404);
        return view('news.show', ['post' => $newsPost]);
    }

    public function gallery()
    {
        return view('gallery', ['items' => GalleryItem::where('is_published', true)->orderByDesc('taken_at')->orderByDesc('created_at')->paginate(18)]);
    }

    public function partners()
    {
        return view('partners', ['partners' => Partner::where('is_active', true)->orderBy('sort_order')->orderBy('name')->get()]);
    }
}
