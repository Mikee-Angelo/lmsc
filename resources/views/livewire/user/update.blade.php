<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" wire:loading.attr='disabled' wire:click='confirmUserUpdate'>
        {{ __('Update') }}
    </x-primary-button>

    <form wire:submit.prevent='submit'>
        <x-dialog-modal wire:model='confirmingUserUpdate'>
            <x-slot name="title">
                {{ __('Add New User') }}
            </x-slot>

            <x-slot name="content">

                <h3 class="mt-4 text-lg font-medium text-gray-900">Information</h3>
                {{-- Full Name --}}
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input type="text" class="block w-full mt-1"
                        :value="old('user.name', $user->name)" wire:model="user.name" pattern="^[a-zA-Z\s]+$"
                        required />
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
                    <x-input-label for="password" :value="__('New Password')" />
                    <x-text-input id="password" name="password" type="password" class="block w-full mt-1"
                        :value="old('password', $password)" wire:model="password"  />
                    <x-input-error class="mt-2" for="password" />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                        name="password_confirmation" wire:model="password_confirmation"
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-input-label for="role" :value="__('Select Role')" />
                    <select id="role" wire:model="selectedRole" name="role"
                        wire:change="$emit('loadSelectedRolePermissions')"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-1">
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <h3 class="mt-4 text-lg font-medium text-gray-900">Permissions</h3>

                <div class="mt-4">
                    @foreach ($permissions as $permission)
                    <label class="flex my-2">
                        <input class="inline-block" wire:model="selectedPermissions" value="{{ $permission->id }}"
                            type="checkbox">
                        <span class="inline-block text-sm ml-7">
                            {{ $permission->name }}
                        </span>
                    </label>
                    @endforeach
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingUserUpdate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Update User') }}
                </x-primary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>