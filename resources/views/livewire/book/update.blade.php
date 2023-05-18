<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button"  wire:loading.attr='disabled' wire:click='confirmBookUpdate'>
        {{ __('Edit') }}
    </x-primary-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingBookUpdate">
            <x-slot name="title">
                {{ __('Update Book - '. $title ) }}
            </x-slot>

            <x-slot name="content">

                <div class="flex flex-row space-x-4">
                    {{-- Accetion Number --}}
                    <div class="w-full">
                        <x-input-label for="accession_number" :value="__('Accession Number')" />
                        <x-text-input id="accession_number" name="accession_number" type="text" class="block w-full mt-1"
                            :value="old('book.accession_number', $book->accession_number)" wire:model="book.accession_number"
                            required />
                        <x-input-error class="mt-2" for="book.accession_number" />
                    </div>
                
                    {{-- Call Number --}}
                    <div class="w-full">
                        <x-input-label for="call_number" :value="__('Call Number')" />
                        <x-text-input id="call_number" name="accession_number" type="text" class="block w-full mt-1"
                            :value="old('book.call_number', $book->call_number)" wire:model="book.call_number" required />
                        <x-input-error class="mt-2" for="book.call_number" />
                    </div>
                </div>

                {{-- Title --}}
                <div class="mt-4">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                        :value="old('book.title', $book->title)" wire:model="book.title" required />
                    <x-input-error class="mt-2" for="book.title" />
                </div>

                {{-- Description --}}
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="notes" rows="4"
                        class="mt-1 block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        value="{{ old('book.description', $book->description) }}" wire:model='book.description'></textarea>
                    <x-input-error class="mt-2" for="book.description" />
                </div>


                <div class="flex flex-row mt-4 space-x-4">
                    {{-- Edition --}}
                    <div>
                        <x-input-label for="edition" :value="__('Edition')" />
                        <x-text-input id="edition" name="edition" type="text" class="block w-full mt-1"
                            :value="old('book.edition', $book->edition)" wire:model="book.edition" required />
                        <x-input-error class="mt-2" for="book.edition" />
                    </div>

                    {{-- ISBN --}}
                    <div>
                        <x-input-label for="isbn" :value="__('ISBN')" />
                        <x-text-input id="isbn" name="isbn" type="text" class="block w-full mt-1"
                            :value="old('book.isbn', $book->isbn)" wire:model="book.isbn" required />
                        <x-input-error class="mt-2" for="book.isbn" />
                    </div>

                    {{-- Copyright Year --}}
                    <div>
                        <x-input-label for="copyright_year" :value="__('Copyright Year')" />
                        <x-text-input id="copyright_year" name="copyright_year" type="text" class="block w-full mt-1"
                            :value="old('book.copyright_year', $book->copyright_year)" wire:model="book.copyright_year"
                            required />
                        <x-input-error class="mt-2" for="book.copyright_year" />
                    </div>

                    {{-- Year Published --}}
                    <div>
                        <x-input-label for="year_published" :value="__('Year Published')" />
                        <x-text-input id="year_published" name="year_published" type="text" class="block w-full mt-1"
                            :value="old('book.year_published', $book->year_published)" wire:model="book.year_published" required />
                        <x-input-error class="mt-2" for="book.year_published" />
                    </div>
                </div>

                <div class="flex flex-row mt-4 space-x-5">
                    {{-- Number of Pages --}}
                    <div>
                        <x-input-label for="pages" :value="__('No. of Pages')" />
                        <x-text-input id="pages" name="pages" type="number" class="block w-full mt-1"
                            :value="old('book.pages', $book->pages)" wire:model="book.pages" required />
                        <x-input-error class="mt-2" for="book.pages" />
                    </div>

                    {{-- Height --}}
                    <div>
                        <x-input-label for="height" :value="__('Height (cm)')" />
                        <x-text-input id="height" name="height" type="number" class="block w-full mt-1"
                            :value="old('book.height', $book->height)" wire:model="book.height" />
                        <x-input-error class="mt-2" for="book.height" />
                    </div>

                    <div class="flex flex-row space-x-4">
                        {{-- Number of Pages --}}
                        <div>
                            <x-input-label for="price" :value="__('Price')" />
                    
                            <div class="flex mt-1">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    ₱
                                </span>
                                <x-text-input id="price" name="price" type="number"
                                    class="brounded-none rounded-r-lg bg-white border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    :value="old('book.price', $book->price)" wire:model="book.price" required />
                                <x-input-error class="mt-2" for="book.price" />
                            </div>
                    
                        </div>
                    
                    </div>

                </div>

               
                
                @if (auth()->user()->hasDirectPermission('delete books'))
                    @if (!$hasTransaction) 
                        <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                        @livewire('book.delete', ['title' => $title, 'book_id' => $book_id], key($book_id))
                    @endif
                @endif
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingBookUpdate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Update Book') }}
                </x-primary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>