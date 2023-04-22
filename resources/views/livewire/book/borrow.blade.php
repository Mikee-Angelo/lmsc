<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    @if (!$hasTransaction)
        <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmTransactionCreate'>
            {{ __('Borrow Book') }}
        </x-primary-button>
    @else
        {{-- <x-danger-button type="button" class="mb-4" wire:loading.attr='disabled'>
            {{ __('Return Book') }}
        </x-danger-button> --}}

        @livewire('book.returned', ['book_id' => $book_id])
    @endif

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingTransactionCreate">
            <x-slot name="title">
                {{ __('Borrow Book') }}
            </x-slot>

            <x-slot name="content">
                {{-- Title --}}
                <x-input-label for="name" :value="__('Find Student Number')" />
                
                <div class="flex flex-row mt-1">
                        <x-text-input id="student_number" name="student_number" type="text" class="block w-full"
                            :value="old('student_id.student_number', $student_id->student_number)" wire:model="student_id.student_number"
                            required />
                    <x-primary-button type="button" class="ml-3 " wire:loading.attr="disabled" wire:click='onSearch'>
                        {{ __('Search') }}
                    </x-primary-button>
                </div>

                <x-input-error class="mt-2" for="student_id.student_number" />
                
                @if (isset($student->id))

                    {{-- Name --}}
                    <div class="mt-5">
                        <x-input-label for="name" :value="__('Student Name')" />
                        <x-text-input id="name" type="text" class="block w-full mt-1" wire:model="student.name" disabled />
                    </div>
                    
                    <div class="flex flex-row w-full mt-5 space-x-3">
                        {{-- Course --}}
                        <div>
                            <x-input-label for="course" :value="__('Course')" />
                            <x-text-input id="course" type="text" class="block w-full mt-1" wire:model="student.course" disabled />
                        </div>
                    
                        {{-- Year Level --}}
                        <div>
                            <x-input-label for="year_level" :value="__('Year/Level')" />
                            <x-text-input id="year_level" type="text" class="block w-full mt-1" wire:model="student.yearLevel" disabled />
                        </div>
                    
                        {{-- Status --}}
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input id="status" type="text" class="block w-full mt-1" wire:model="student.status" disabled />
                        </div>

                        {{-- Notes --}}
                       
                    </div>

                    <label for="notes" class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Add Note:</label>
                    <textarea id="notes" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model='transaction.notes' placeholder="Write your notes here..."></textarea>
                @endif
                
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingTransactionCreate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Borrow') }}
                </x-primary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>