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

                <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                
                {{-- Book Details --}}
                <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                    {{ __('Book Information') }}
                </h2>
                
                {{-- Title --}}
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="block w-full mt-1" value="{{ $book->title }}"
                        disabled />
                </div>
                
                {{-- Description --}}
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" name="description" type="text" class="block w-full mt-1"
                        value="{{ $book->description }}" disabled />
                </div>
                
                <div class="flex flex-row mt-4 space-x-5">
                    {{-- Edition --}}
                    <div>
                        <x-input-label for="edition" :value="__('Edition')" />
                        <x-text-input id="edition" name="edition" type="number" class="block w-full mt-1"
                            value="{{ $book->edition }}" disabled />
                    </div>
                
                    {{-- ISBN --}}
                    <div>
                        <x-input-label for="isbn" :value="__('ISBN')" />
                        <x-text-input id="isbn" name="isbn" type="text" class="block w-full mt-1" value="{{ $book->isbn }}"
                            disabled />
                    </div>
                
                    {{-- Copyright Year --}}
                    <div>
                        <x-input-label for="copyright_year" :value="__('Copyright Year')" />
                        <x-text-input id="copyright_year" name="copyright_year" type="number" class="block w-full mt-1"
                            value="{{ $book->copyright_year }}" disabled />
                    </div>
                </div>
                
                {{-- Number of Pages --}}
                <div class="flex flex-row mt-4 space-x-5">
                    <div>
                        <x-input-label for="pages" :value="__('No. of Pages')" />
                        <x-text-input id="pages" name="pages" type="number" class="block w-full mt-1"
                            value="{{ $book->pages }}" disabled />
                    </div>
                
                    {{-- Height --}}
                    <div>
                        <x-input-label for="height" :value="__('Height')" />
                        <x-text-input id="height" name="height" type="number" class="block w-full mt-1"
                            value="{{ $book->height }}" disabled />
                    </div>
                
                    {{-- Width --}}
                    <div>
                        <x-input-label for="width" :value="__('Width')" />
                        <x-text-input id="width" name="width" type="number" class="block w-full mt-1"
                            value="{{ $book->width }}" disabled />
                    </div>
                
                    {{-- Depth --}}
                    <div>
                        <x-input-label for="depth" :value="__('Depth')" />
                        <x-text-input id="depth" name="depth" type="number" class="block w-full mt-1"
                            value="{{ $book->depth }}" disabled />
                    </div>
                </div>
                
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