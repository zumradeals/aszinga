<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::view('/club', 'club')->name('club');
Route::view('/equipe', 'team')->name('team');
Route::view('/matchs', 'matches')->name('matches');
Route::view('/actualites', 'news.index')->name('news.index');
Route::view('/galerie', 'gallery')->name('gallery');
Route::view('/partenaires', 'partners')->name('partners');
Route::view('/contact', 'contact')->name('contact');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [LoginController::class, 'create'])->name('login');
    Route::post('/admin/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('players', PlayerController::class)->except('show');
    Route::resource('matches', MatchController::class)->except('show')->parameters(['matches'=>'match']);
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
