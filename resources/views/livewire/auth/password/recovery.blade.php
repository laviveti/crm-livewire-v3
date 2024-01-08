<x-card class="mx-auto w-[450px]">
  @if ($message)
    <x-alert icon="o-exclamation-triangle"
      class="alert-success mb-4 text-sm font-semibold">
      <span>You will receive an email with the password recovery link</span>
    </x-alert>
  @endif

  <h2 class="mb-10 text-center text-2xl font-bold">Password recovery</h2>

  <x-form wire:submit="startPasswordRecovery">
    <x-input label="E-mail" wire:model="email" placeholder="Your account e-mail"
      class="placeholder:text-sm placeholder:text-zinc-500" />

    <x-slot:actions>
      <div class="flex w-full items-center justify-between">
        <a wire:navigate href="{{ route('login') }}" class="link link-primary">
          Never mind, get back to login page
        </a>

        <div>
          <x-button label="Submit" class="btn-primary" type="submit" spinner="submit" />
        </div>
      </div>
    </x-slot:actions>
  </x-form>
</x-card>
