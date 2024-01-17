<div>
  <x-header title="Users" separator />
  <div class="flex justify-between">
    <div>
      asdgya
    </div>

    <div>
      create
    </div>
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
