<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Password;
use App\Livewire\Auth\Register;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', Welcome::class)->name('dashboard');
});

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('auth.register');
Route::get('/logout', Logout::class)->name('logout');
Route::get('/password/reset', Password\Reset::class)->name('password.reset');
Route::get('/password/recovery', Password\Recovery::class)->name('password.recovery');
