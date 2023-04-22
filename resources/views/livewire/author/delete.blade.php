<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-danger-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmAuthorDelete'>
        {{ __('Delete') }}
    </x-danger-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingAuthorDelete">
            <x-slot name="title">
                {{ __('Delete '. $name) }}
            </x-slot>

            <x-slot name="content">
                <p>Are you sure you want to delete ?</p>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingAuthorDelete')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button type="submit" class="ml-3" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-danger-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>