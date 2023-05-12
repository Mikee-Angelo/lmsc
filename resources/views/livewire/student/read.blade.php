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
                        <x-input-label for="name" :value="__('ID Number')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            value="{{ $student->student_number }}" disabled />
                    </div>

                    {{-- Name --}}
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Course')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            value="{{ $student->student_latest->course }}" disabled />
                    </div>
                </div>

                <div class="flex flex-row mt-4 space-x-4">
                    
                    {{-- Name --}}

                    @if (!is_null($student->student_latest->year))
                        <div class="w-full">
                            <x-input-label for="name" :value="__('Year')" />
                            <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                                value="{{ $student->student_latest->year }}" disabled />
                        </div>
                    @endif

                    {{-- Name --}}
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Level')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            value="{{ $student->student_latest->level }}" disabled />
                    </div>

                    @if (!is_null($student->student_latest->status))
                    {{-- Name --}}
                    <div class="w-full">
                        <x-input-label for="name" :value="__('Status')" />
                        <x-text-input id="name" name="name" type="text" class="block w-full mt-1"
                            value="{{ $student->student_latest->status }}" disabled />
                    </div>
                    @endif
                </div>
                
                @if ($student->student_latest->remarks == 'STUDENT')
                    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                    
                    {{-- Book Details --}}
                    <h2 class="-mb-5 text-lg font-medium leading-tight text-gray-800 ">
                        {{ __('Library Card History') }}
                    </h2>
                    
                    @livewire('tables.library-card-table', ['student_id' => $student_id], key($student_id));
                    
                    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                    
                    {{-- Book Details --}}
                    <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                        {{ __('Actions') }}
                    </h2>
                    
                    <div class="-mt-2 -mb-4">
                        @livewire('student.generate', ['student_id' => $student_id], key($student_id));
                    </div>
                @endif
                
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingStudentRead')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>