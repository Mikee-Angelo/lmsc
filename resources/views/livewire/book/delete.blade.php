<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-danger-button type="button" wire:loading.attr='disabled' wire:click='confirmBookDelete'>
        {{ __('Remove this book') }}
    </x-danger-button>

    <x-dialog-modal wire:model="confirmingBookDelete">
        <x-slot name="title">
            {{ __('Delete '. $title) }}
        </x-slot>

        <x-slot name="content">
            <p>Are you sure you want to delete ?</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingBookDelete')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button type="button" class="ml-3" wire:loading.attr="disabled" wire:click="submit">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>

    </x-dialog-modal>
</div>