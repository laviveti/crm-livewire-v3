<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Auth\Password;
use App\Livewire\Auth\Register;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('auth.register');
Route::get('/logout', Logout::class)->name('logout');
Route::get('/password/reset', Password\Reset::class)->name('password.reset');
Route::get('/password/recovery', Password\Recovery::class)->name('password.recovery');

Route::middleware('auth')->group(function () {
    Route::get('/', Welcome::class)->name('dashboard');

    //region Admin routes
    Route::prefix('/admin')->middleware('can:be-an-admin')->group(function () {
        Route::get('/dashboard', fn () => 'admin.dashboard')->name('admin.dashboard');
    });
    //endregion
});
