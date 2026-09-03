<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\NewsPostController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\StaffMemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicContentController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::view('/club', 'club')->name('club');
Route::get('/equipe', [PublicContentController::class, 'team'])->name('team');
Route::get('/matchs', [PublicContentController::class, 'matches'])->name('matches');
Route::get('/actualites', [PublicContentController::class, 'news'])->name('news.index');
Route::view('/galerie', 'gallery')->name('gallery');
Route::view('/partenaires', 'partners')->name('partners');
Route::view('/contact', 'contact')->name('contact');

Route::middleware('guest')->group(function () {
 Route::get('/admin/login',[LoginController::class,'create'])->name('login');
 Route::post('/admin/login',[LoginController::class,'store'])->name('login.store');
});
Route::middleware(['auth','admin'])->prefix('admin')->name('admin.')->group(function () {
 Route::get('/',DashboardController::class)->name('dashboard');
 Route::resource('players',PlayerController::class)->except('show');
 Route::resource('matches',MatchController::class)->except('show')->parameters(['matches'=>'match']);
 Route::resource('news',NewsPostController::class)->except('show')->parameters(['news'=>'news']);
 Route::resource('staff',StaffMemberController::class)->except('show')->parameters(['staff'=>'staff']);
 Route::post('/logout',[LoginController::class,'destroy'])->name('logout');
});
