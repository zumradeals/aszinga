<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MatchGame;
use App\Models\NewsPost;
use App\Models\Player;
use App\Models\RecruitmentApplication;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'playerCount' => Player::where('is_active', true)->count(),
            'matchCount' => MatchGame::count(),
            'publishedNewsCount' => NewsPost::where('status', 'published')->count(),
            'newApplicationsCount' => RecruitmentApplication::where('status', 'nouvelle')->count(),
        ]);
    }
}
