<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmRoleCreate'>
        {{ __('Add New') }}
    </x-primary-button>
    
    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingRoleCreate">
                <x-slot name="title">
                    {{ __('Add New Role') }}
                </x-slot>
            
                <x-slot name="content">

                    {{-- Name --}}
                    <div>
                        <x-input-label for="name" :value="__('Role Name')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('role.name', $role->name)" wire:model="role.name" required
                            />
                        <x-input-error class="mt-2" for="role.name"/>
                    </div>

                </x-slot>
            
                <x-slot name="footer">
                    <x-secondary-button wire:click="$toggle('confirmingRoleCreate')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>
            
                    <x-primary-button class="ml-3" wire:loading.attr="disabled">
                        {{ __('Add Role') }}
                    </x-primary-button>
                </x-slot>
                
        </x-dialog-modal>
    </form>
</div>
