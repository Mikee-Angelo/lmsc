<div class="flex justify-around space-x-1">
    @if (auth()->user()->hasDirectPermission('delete penalty'))
        @livewire('penalty.delete', ['penalty_id' => $id, 'name' => $name], key($id))
    @endif
</div>