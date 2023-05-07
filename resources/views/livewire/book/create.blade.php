<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmBookCreate'>
        {{ __('Add New') }}
    </x-primary-button>
    
    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingBookCreate">
                <x-slot name="title">
                    {{ __('Add New Book') }}
                </x-slot>
            
                <x-slot name="content">

                    {{-- Accetion Number --}}
                    <div>
                        <x-input-label for="accession_number" :value="__('Accession Number')" />
                        <x-text-input id="accession_number" name="accession_number" type="text" class="block w-full mt-1" :value="old('book.accession_number', $book->accession_number)"
                            wire:model="book.accession_number" required />
                        <x-input-error class="mt-2" for="book.accession_number" />
                    </div>

                    {{-- Title --}}
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" name="title" type="text" class="block w-full mt-1" :value="old('book.title', $book->title)" wire:model="book.title" required
                            />
                        <x-input-error class="mt-2" for="book.title"/>
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
                            <x-text-input id="edition" name="edition" type="number" class="block w-full mt-1"
                                :value="old('book.edition', $book->edition)" wire:model="book.edition" required />
                            <x-input-error class="mt-2" for="book.edition" />
                        </div>
                        
                        {{-- ISBN --}}
                        <div>
                            <x-input-label for="isbn" :value="__('ISBN')" />
                            <x-text-input id="isbn" name="isbn" type="text" class="block w-full mt-1" :value="old('book.isbn', $book->isbn)"
                                wire:model="book.isbn" required />
                            <x-input-error class="mt-2" for="book.isbn" />
                        </div>
                        
                        {{-- Copyright Year --}}
                        <div>
                            <x-input-label for="copyright_year" :value="__('Copyright Year')" />
                            <x-text-input id="copyright_year" name="copyright_year" type="number" class="block w-full mt-1"
                                :value="old('book.copyright_year', $book->copyright_year)" wire:model="book.copyright_year" required />
                            <x-input-error class="mt-2" for="book.copyright_year" />
                        </div>
                   </div>
                   
                   <div class="flex flex-row mt-4 space-x-4">
                    {{-- Number of Pages --}}
                    <div>
                        <x-input-label for="pages" :value="__('No. of Pages')" />
                        <x-text-input id="pages" name="pages" type="number" class="block w-full mt-1"
                            :value="old('book.pages', $book->pages)" wire:model="book.pages" required />
                        <x-input-error class="mt-2" for="book.pages" />
                    </div>
                    
                    {{-- Height --}}
                    <div>
                        <x-input-label for="height" :value="__('Height')" />
                        <x-text-input id="height" name="height" type="number" class="block w-full mt-1"
                            :value="old('book.height', $book->height)" wire:model="book.height" />
                        <x-input-error class="mt-2" for="book.height" />
                    </div>
                    
                    {{-- Width --}}
                    <div>
                        <x-input-label for="width" :value="__('Width')" />
                        <x-text-input id="width" name="width" type="number" class="block w-full mt-1"
                            :value="old('book.width', $book->width)" wire:model="book.width" />
                        <x-input-error class="mt-2" for="book.width" />
                    </div>
                    
                    {{-- Depth --}}
                    <div>
                        <x-input-label for="depth" :value="__('Depth')" />
                        <x-text-input id="depth" name="depth" type="number" class="block w-full mt-1"
                            :value="old('book.depth', $book->depth)" wire:model="book.depth" />
                        <x-input-error class="mt-2" for="book.depth" />
                    </div>
                   </div>
                </x-slot>
            
                <x-slot name="footer">
                    <x-secondary-button wire:click="$toggle('confirmingBookCreate')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>
            
                    <x-primary-button class="ml-3" wire:loading.attr="disabled">
                        {{ __('Add Book') }}
                    </x-primary-button>
                </x-slot>
                
        </x-dialog-modal>
    </form>
</div>
