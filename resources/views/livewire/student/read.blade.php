<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-primary-button type="button" wire:loading.attr='disabled' wire:click='confirmStudentRead'>
        {{ __('View') }}
    </x-primary-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingStudentRead">
            <x-slot name="title">
                {{ __('Information') }}
            </x-slot>

            <x-slot name="content">
                <div class="flex flex-row mt-4 space-x-4">
                    {{-- Name --}}
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            value="{{ $student->student_latest->name }}" disabled />
                    </div>

                    {{-- Name --}}
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Student Number')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            value="{{ $student->student_number }}" disabled />
                    </div>
                </div>

                <div class="flex flex-row mt-4 space-x-4">
                    {{-- Name --}}
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Course')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            value="{{ $student->student_latest->course }}" disabled />
                    </div>
                
                    {{-- Name --}}
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Year/Level')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1" value="{{ $student->student_latest->yearLevel }}"
                            disabled />
                    </div>

                    {{-- Name --}}
                    <div>
                        <x-input-label for="name" :value="__('Status')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            value="{{ $student->student_latest->status }}" disabled />
                    </div>
                </div>
                
                <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">

                {{-- Book Details --}}
                <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                    {{ __('Actions') }}
                </h2>
                
                <div class="mt-6 mb-2">
                    <a href="{{ route('lc.show', ['student' => $student->student_latest->id ]) }}"
                        class="text-white mb-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Generate
                        Library Card</a>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingStudentRead')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Add Role') }}
                </x-primary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>