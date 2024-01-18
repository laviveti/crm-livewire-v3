<div>
  <x-header title="Users" separator />
  <div class="mb-4 flex gap-4">
    <div class="w-1/3">
      <x-input
        icon="o-magnifying-glass"
        class="input-sm placeholder:pl-6"
        placeholder="Search by email or name"
        wire:model.live="search" />
    </div>

    <x-select class="select-sm">
      <option value="">opt</option>
    </x-select>
  </div>

  <x-table :headers="$this->headers" :rows="$this->users">
    @scope('cell_permissions', $user)
      @if ($user->permissions->contains('key', 'be an admin'))
        <x-badge :value="'admin'" class="badge-primary select-none" />
      @else
        <x-badge :value="'common'" class="badge-secondary select-none" />
      @endif
    @endscope

    @scope('actions', $user)
      <x-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm text-red-500" />
    @endscope
  </x-table>
</div>
