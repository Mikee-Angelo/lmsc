<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" wire:loading.attr='disabled' wire:click='confirmCardGenerate'>
        {{ __('Generare Library Card') }}
    </x-primary-button>

    <x-dialog-modal wire:model="confirmingCardGenerate">
        <x-slot name="title">
            {{ __('Generate Library Card') }}
        </x-slot>

        <x-slot name="content">

            {{-- Title --}}
            <div>
                <x-input-label for="reason" :value="__('Reason')" />
                <select id="reason"
                    name="reason" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" wire:model="library_card.reason">
                    <option selected>Select Option...</option>
                    @foreach ($reasons as $k => $v)
                        <option value="{{ $k }}">{{ $v }}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('confirmingCardGenerate')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-primary-button type="button" wire:click="submit"  class="ml-3" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-primary-button>
        </x-slot>

    </x-dialog-modal>
</div>