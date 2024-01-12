<?php

namespace App\Livewire\Admin;

use App\Enum\Can;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount(): void
    {
        $this->authorize(Can::BE_AN_ADMIN->value); // app\Providers\AuthServiceProvider.php
    }

    public function render(): View
    {
        return view('livewire.admin.dashboard');
    }
}
