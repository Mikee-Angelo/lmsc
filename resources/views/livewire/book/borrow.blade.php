<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    @if (!$hasTransaction)
        <x-primary-button type="button" class="mb-4 bg-emerald-700" wire:loading.attr='disabled' wire:click='confirmTransactionCreate'>
            {{ __('Borrow') }}
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
                        <p class="text-base text-gray-90">{{ $student->name }}</p>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-3 mt-5">
                        {{-- Course --}}
                        <div>
                            <x-input-label for="course" :value="__('Course')" />
                            <p class="text-base text-gray-90">{{ $student->course }}</p>
                        </div>
                    
                        {{-- Year Level --}}
                        <div>
                            <x-input-label for="year_level" :value="__('Year')" />
                            <p class="text-base text-gray-90">{{ $student->year }}</p>
                        </div>

                        {{-- Year Level --}}
                        <div>
                            <x-input-label for="year_level" :value="__('Semester')" />
                            <p class="text-base text-gray-90">{{ $student->level }}</p>
                        </div>
                    
                        {{-- Status --}}
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <p class="text-base text-gray-90">{{ $student->status }}</p>
                        </div>
                    </div>

                    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                    
                    {{-- Book Details --}}
                    <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                        {{ __('Book Information') }}
                    </h2>
                    
                    {{-- Title --}}
                    <div>
                        <x-input-label for="title" :value="__('Title:')" />
                        <p class="text-base text-gray-90">{{ $book->title }}</p>
                    </div>
                    
                    {{-- Description --}}
                    <div class="mt-5">
                        <x-input-label for="description" :value="__('Description:')" />
                        <p class="text-base text-gray-90">{{ $book->description }}</p>
                    </div>
                    
                    <div class="grid grid-cols-4 gap-4 mt-5">
                        {{-- Edition --}}
                        <div>
                            <x-input-label for="edition" :value="__('Edition:')" />
                            <p class="text-base text-gray-90">{{ $book->edition }}</p>
                        </div>
                    
                        {{-- ISBN --}}
                        <div>
                            <x-input-label for="isbn" :value="__('ISBN:')" />
                            <p class="text-base text-gray-90">{{ $book->isbn }}</p>
                        </div>
                    
                        {{-- Copyright Year --}}
                        <div>
                            <x-input-label for="copyright_year" :value="__('Copyright Year:')" />
                            <p class="text-base text-gray-90">{{ $book->copyright_year }}</p>
                    
                        </div>
                    </div>
                    
                    {{-- Number of Pages --}}
                    <div class="grid grid-cols-4 gap-4 mt-5">
                        <div>
                            <x-input-label for="pages" :value="__('No. of Pages:')" />
                            <p class="text-base text-gray-90">{{ $book->pages }}</p>
                        </div>
                    
                        {{-- Height --}}
                        <div>
                            <x-input-label for="height" :value="__('Height:')" />
                            <p class="text-base text-gray-90">{{ $book->height }}</p>
                        </div>
                    
                        {{-- Width --}}
                        <div>
                            <x-input-label for="width" :value="__('Width:')" />
                            <p class="text-base text-gray-90">{{ $book->width }}</p>
                        </div>
                    
                        {{-- Depth --}}
                        <div>
                            <x-input-label for="depth" :value="__('Depth:')" />
                            <p class="text-base text-gray-90">{{ $book->depth }}</p>
                        </div>
                    </div>

                    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">

                    {{-- Transaction Details --}}
                    <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                        {{ __('Transaction Details') }}
                    </h2>
                    
                    {{-- Title --}}
                    <x-input-label for="name" :value="__('Duration (days)')" />
                    
                    <div class="flex flex-row mt-1">
                        <x-text-input id="duration" name="duration" type="text" class="block w-full"
                            :value="old('transaction.duration', $transaction->duration)" placeholder="Default is 1 day..." wire:model="transaction.duration" value="1"/>
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