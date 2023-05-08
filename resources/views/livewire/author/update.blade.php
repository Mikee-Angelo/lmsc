<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" wire:loading.attr='disabled' wire:click='confirmAuthorUpdate'>
        {{ __('Edit') }}
    </x-primary-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingAuthorUpdate">
            <x-slot name="title">
                {{ __('Details') }}
            </x-slot>

            <x-slot name="content">
                {{-- Title --}}
                <div>
                    <x-input-label for="name" :value="__('Author Name')" />
                    <x-text-input id="name" type="text" class="block w-full mt-1"
                        :value="old('author.name', $author->name)" wire:model="author.name" required />
                    <x-input-error class="mt-2" for="author.name" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingAuthorUpdate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-primary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>