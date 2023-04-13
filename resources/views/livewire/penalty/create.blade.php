<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmPenaltyCreate'>
        {{ __('Add New') }}
    </x-primary-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingPenaltyCreate">
            <x-slot name="title">
                {{ __('Add New Book') }}
            </x-slot>
    
            <x-slot name="content">
    
                {{-- Title --}}
                <div>
                    <x-input-label for="name" :value="__('Penalty Name')" />
                    <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                        :value="old('penalty.name', $penalty->name)" wire:model="penalty.name" required />
                    <x-input-error class="mt-2" for="penalty.name" />
                </div>
    
                {{-- Fee --}}
                <div class="mt-4">
                    <x-input-label for="fee" :value="__('Fee')" />
                    <x-text-input id="fee" name="fee" type="number" class="block w-full mt-1"
                        :value="old('penalty.fee', $penalty->fee)" wire:model="penalty.fee" required />
                    <x-input-error class="mt-2" for="penalty.fee" />
                </div>
    
            </x-slot>
    
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingPenaltyCreate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
    
                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-primary-button>
            </x-slot>
    
        </x-dialog-modal>
    </form>
</div>
