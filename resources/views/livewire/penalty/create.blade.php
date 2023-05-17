<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmPenaltyCreate'>
        {{ __('Add New') }}
    </x-primary-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingPenaltyCreate">
            <x-slot name="title">
                {{ __('Add New Penalty') }}
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
                        :value="old('penalty.fee', $penalty->fee)" wire:model="penalty.fee" required pattern='[0-9]+(\\.[0-9][0-9]?)?'/>
                    <x-input-error class="mt-2" for="penalty.fee" />
                </div>

                {{-- Fee --}}
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Pricing Type')" />
                    <select id="type" name="type"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model="penalty.type">
                        <option selected>Select Option...</option>
                        @foreach ($types as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Excludes From --}}
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Exclude Role')" />
                    <select id="type" name="type"
                        class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model="penalty.excludes_from">
                        <option value="null" selected>Select Option...</option>
                        @foreach ($remarks as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach
                    </select>
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
