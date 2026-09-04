<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClubSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClubSettingController extends Controller
{
    public function edit()
    {
        return view('admin.club-settings.edit', ['settings' => ClubSetting::current()]);
    }

    public function update(Request $request)
    {
        $settings = ClubSetting::current();
        $data = $request->validate([
            'official_name' => 'required|string|max:160',
            'short_name' => 'required|string|max:80',
            'slogan' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:3000',
            'phone' => 'nullable|string|max:60',
            'email' => 'nullable|email|max:160',
            'address' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|url|max:500',
            'instagram_url' => 'nullable|url|max:500',
            'youtube_url' => 'nullable|url|max:500',
            'tiktok_url' => 'nullable|url|max:500',
            'recruitment_text' => 'nullable|string|max:3000',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'remove_logo' => 'nullable|boolean',
        ]);
        unset($data['logo'], $data['remove_logo']);

        if ($request->boolean('remove_logo') && $settings->logo_path) {
            Storage::disk('public')->delete($settings->logo_path);
            $data['logo_path'] = null;
        }
        if ($request->hasFile('logo')) {
            $newPath = $request->file('logo')->store('club', 'public');
            if ($settings->logo_path) Storage::disk('public')->delete($settings->logo_path);
            $data['logo_path'] = $newPath;
        }

        $settings->update($data);
        return back()->with('success', 'Paramètres du club enregistrés.');
    }
}
