<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Welcome extends Component
{
    public function render(): View
    {
        ds()->commandsOn('running a command');
        Artisan::call('inspire');
        ds()->commandsOff();

        // ds()->model($user);
        return view('livewire.welcome');
    }
}
