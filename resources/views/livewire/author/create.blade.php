<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmAuthorCreate'>
        {{ __('Add New') }}
    </x-primary-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingAuthorCreate">
            <x-slot name="title">
                {{ __('Add New Author') }}
            </x-slot>

            <x-slot name="content">

                {{-- Title --}}
                <div>
                    <x-input-label for="name" :value="__('Author Name')" />
                    <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                        :value="old('author.name', $author->name)" wire:model="author.name" required />
                    <x-input-error class="mt-2" for="author.name" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingAuthorCreate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Create') }}
                </x-primary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>