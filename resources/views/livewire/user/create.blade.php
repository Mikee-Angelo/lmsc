<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmUserCreate'>
        {{ __('Add New') }}
    </x-primary-button>

    <form wire:submit.prevent='submit'>
        <x-dialog-modal wire:model='confirmingUserCreate'>
            <x-slot name="title">
                {{ __('Add New User') }}
            </x-slot>

            <x-slot name="content">
                {{-- Full Name --}}
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('user.name', $user->name)"
                        wire:model="user.name" required />
                    <x-input-error class="mt-2" for="user.name" />
                </div>
                
                {{-- Email --}}
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" name="email" type="email" class="block w-full mt-1"
                        :value="old('user.email', $user->email)" wire:model="user.email" required />
                    <x-input-error class="mt-2" for="user.email" />
                </div>
                
                {{-- Password --}}
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" name="password" type="password" class="block w-full mt-1"
                        :value="old('password', $password)" wire:model="password" required  />
                    <x-input-error class="mt-2" for="password" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserCreate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
            
                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Add User') }}
                </x-primary-button>
            </x-slot>
            
        </x-dialog-modal>
    </form>
</div>
