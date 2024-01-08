<x-card class="mx-auto w-[450px]">
  @if ($message = session()->get('status'))
    <x-alert icon="o-exclamation-triangle" class="alert-error mb-4 text-sm font-semibold">
      <span>{{ $message }}</span>
    </x-alert>
  @endif

  <h2 class="mb-10 text-center text-2xl font-bold">Password reset</h2>

  <x-form wire:submit="updatePassword">
    <x-input label="E-mail" value="{{ $this->obfuscatedEmail }}" readonly @class([$errors->has('email') ? 'input-error' : '']) />
    <x-input type="hidden" wire:model="email" />
    <x-input label="E-mail confirmation" wire:model="email_confirmation" @class([$errors->has('email') ? 'input-error' : '']) />
    <x-input label="Password" wire:model="password" type="password" />
    <x-input label="Password confirmation" wire:model="password_confirmation" type="password"
      @class([$errors->has('password') ? 'input-error' : '']) />

    <x-slot:actions>
      <div class="flex w-full items-center justify-between">
        <a wire:navigate href="{{ route('login') }}" class="link link-primary">
          Never mind, get back to login page
        </a>

        <div>
          <x-button label="Reset" class="btn-primary" type="submit" spinner="submit" />
        </div>
      </div>
    </x-slot:actions>
  </x-form>
</x-card>
