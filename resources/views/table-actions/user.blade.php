<div class="flex space-x-4">

    @if (auth()->user()->hasDirectPermission('update account'))
        @livewire('user.update', ['name' => $name, 'user_id' => $id], key($id))
    @endif
   
    @if (!$is_deleted)
        @if (auth()->user()->hasDirectPermission('disable account'))
            @livewire('user.delete', ['name' => $name, 'user_id' => $id], key($id))
        @endif
    @else
        <p class="text-red-600">Deactivated</p>
    @endif
</div>