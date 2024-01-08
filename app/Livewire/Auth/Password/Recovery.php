<?php

namespace App\Livewire\Auth\Password;

use App\Models\User;
use App\Notifications\PasswordRecoveryNotification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Recovery extends Component
{
    public ?string $message = null;

    #[Rule(['email', 'required'])]
    public ?string $email = null;

    #[Layout('components.layouts.guest')]
    public function render(): View
    {
        return view('livewire.auth.password.recovery');
    }

    public function startPasswordRecovery(): void
    {
        $this->validate();

        Password::sendResetLink($this->only(['email']));

        $this->message = 'You will receive an email with the password recovery link';
    }
}
/**
 * Observaçao:
 *
 * if ($user) {
 *   user->notify(new PasswordRecoveryNotification());
 *}
 * mesma coisa que $user?->notify(new PasswordRecoveryNotification());
 * */
