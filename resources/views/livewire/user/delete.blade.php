<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-danger-button type="button" wire:loading.attr='disabled' wire:click='confirmUserDelete'>
        {{ __('Deactivate') }}
    </x-danger-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingUserDelete">
            <x-slot name="title">
                {{ __('Deactivate'. $name) }}
            </x-slot>

            <x-slot name="content">
                <p>Are you sure you want to deactivate this account ?</p>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserDelete')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button type="submit" class="ml-3" wire:loading.attr="disabled">
                    {{ __('Deactivate') }}
                </x-danger-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>