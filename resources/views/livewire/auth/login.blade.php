<x-card class="mx-auto w-[450px]">

  @if ($message = session()->get('status'))
    <x-alert icon="o-exclamation-triangle" class="alert-error mb-14">
      {{ $message }}
    </x-alert>
  @endif

  @if ($errors->hasAny(['invalidCredentials', 'rateLimiter']))
    <x-alert icon="o-exclamation-triangle" class="alert-warning mb-4 text-sm font-semibold">
      @error('invalidCredentials')
        <span>{{ $message }}</span>
      @enderror
      @error('rateLimiter')
        <span>{{ $message }}</span>
      @enderror
    </x-alert>
  @endif

  <h2 class="mb-2 text-center text-2xl font-bold">Login</h2>

  <x-form wire:submit="tryToLogin">
    <x-input label="E-mail" wire:model="email" />
    <x-input label="Password" wire:model="password" type="password" />
    <div class="w-full text-right text-sm">
      <a href="{{ route('password.recovery') }}" class="link link-primary text-sm">
        Forgot your password?
      </a>
    </div>
    <x-slot:actions>
      <div class="flex w-full items-center justify-between">
        <a wire:navigate href="{{ route('auth.register') }}" class="link link-primary">
          I want to create an account
        </a>

        <div>
          <x-button label="Reset" type="reset" />
          <x-button label="Login" class="btn-primary" type="submit" spinner="submit" />
        </div>
      </div>
    </x-slot:actions>
  </x-form>
</x-card>
