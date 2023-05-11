<div class="flex justify-around space-x-1">
    @if (!$is_deleted)
        @if (auth()->user()->hasDirectPermission('disable account'))
            @livewire('user.delete', ['name' => $name, 'user_id' => $id], key($id))
        @endif
    @else
        <p class="text-red-600">Deactivated</p>
    @endif
</div>