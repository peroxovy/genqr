<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\GoogleController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Dashboard;
use App\Livewire\Codes\User\UserCodes;
use App\Livewire\Codes\Community\CommunityCodes;
use App\Livewire\Profile\Edit\Profile;
use App\Livewire\Profile\Show\ShowUserProfile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function(){
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/qrcodes', UserCodes::class)->name('qrcodes');
    Route::get('/community', CommunityCodes::class)->name('community');

    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/user/{id}/show', ShowUserProfile::class)->name('user.show');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');

    Route::get('/login/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('/login/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});
