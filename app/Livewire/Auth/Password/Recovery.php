<?php

namespace App\Livewire\Auth\Password;

use App\Models\User;
use App\Notifications\PasswordRecoveryNotification;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Recovery extends Component
{
    public ?string $message = null;

    #[Rule(['email', 'required'])]
    public ?string $email = null;

    public function render(): View
    {
        return view('livewire.auth.password.recovery');
    }

    public function startPasswordRecovery(): void
    {
        $this->validate();
        $user = User::whereEmail($this->email)->first();

        // if ($user) {
        //     $user->notify(new PasswordRecoveryNotification());
        // } mesma coisa que embaixo, de forma simplificada

        $user?->notify(new PasswordRecoveryNotification());

        $this->message = 'You will receive an email with the password recovery link';
    }
}