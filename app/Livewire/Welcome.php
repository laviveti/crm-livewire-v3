<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Welcome extends Component
{
    public function render(): View
    {
        // ds()->model($user);
        return view('livewire.welcome');
    }
}
