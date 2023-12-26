<x-card class="mx-auto w-[450px]">
  <h2 class="mb-2 text-center text-2xl font-bold">Register</h2>
  <x-form wire:submit="submit">
    <x-input
      label="Name"
      wire:model="name"
    />
    <x-input
      label="E-mail"
      wire:model="email"
    />
    <x-input
      label="Confirm your e-mail"
      wire:model="email_confirmation"
    />
    <x-input
      label="Password"
      wire:model="password"
      type="password"
    />
    <x-slot:actions>
      <div class="flex w-full items-center justify-between">
        <a
          wire:navigate
          href="{{ route('login') }}"
          class="link link-primary"
        >
          I already have an account
        </a>
        <div>
          <x-button
            label="Reset"
            type="reset"
          />
          <x-button
            label="Register"
            class="btn-primary"
            type="submit"
            spinner="submit"
          />
        </div>
      </div>
    </x-slot:actions>
  </x-form>
</x-card>
