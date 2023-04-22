<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-danger-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmReturnCreate'>
        {{ __('Return Book') }}
    </x-danger-button>

    <form wire:submit.prevent="submit">
        <x-dialog-modal wire:model="confirmingReturnCreate">
            <x-slot name="title">
                {{ __('Return Book') }}
            </x-slot>
    
            <x-slot name="content">

                <h2 class="mt-5 text-lg font-medium leading-tight text-gray-800">
                    {{ __('Borrower Details') }}
                </h2>
                
                {{-- Name --}}
                <div class="mt-5">
                    <x-input-label for="name" :value="__('Student Name')" />
                    <x-text-input id="name" type="text" class="block w-full mt-1" value="{{ $transaction->student_number->student_latest->name }}" disabled />
                </div>
                
                <div class="flex flex-row w-full mt-5 space-x-3">
                    {{-- Course --}}
                    <div>
                        <x-input-label for="course" :value="__('Course')" />
                        <x-text-input id="course" type="text" class="block w-full mt-1" value="{{ $transaction->student_number->student_latest->course }}"
                            disabled />
                    </div>
    
                    {{-- Year Level --}}
                    <div>
                        <x-input-label for="year_level" :value="__('Year/Level')" />
                        <x-text-input id="year_level" type="text" class="block w-full mt-1" value="{{ $transaction->student_number->student_latest->yearLevel }}"
                            disabled />
                    </div>
    
                    {{-- Status --}}
                    <div>
                        <x-input-label for="status" :value="__('Status')" />
                        <x-text-input id="status" type="text" class="block w-full mt-1" value="{{ $transaction->student_number->student_latest->status }}"
                            disabled />
                    </div>
    
                </div>

                <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                
                {{-- Book Details --}}
                <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                        {{ __('Book Information') }}
                    </h2>
    
                {{-- Title --}}
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                        value="{{ $transaction->book->title }}" disabled />
                </div>
                
                {{-- Description --}}
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" name="description" type="text" class="block w-full mt-1" value="{{ $transaction->book->description }}" disabled />
                </div>
                
                <div class="flex flex-row mt-4 space-x-5">
                    {{-- Edition --}}
                    <div >
                        <x-input-label for="edition" :value="__('Edition')" />
                        <x-text-input id="edition" name="edition" type="number" class="block w-full mt-1"
                            value="{{ $transaction->book->edition }}" disabled />
                    </div>
                    
                    {{-- ISBN --}}
                    <div >
                        <x-input-label for="isbn" :value="__('ISBN')" />
                        <x-text-input id="isbn" name="isbn" type="text" class="block w-full mt-1" value="{{ $transaction->book->isbn }}"
                            disabled />
                    </div>

                    {{-- Copyright Year --}}
                    <div>
                        <x-input-label for="copyright_year" :value="__('Copyright Year')" />
                        <x-text-input id="copyright_year" name="copyright_year" type="number" class="block w-full mt-1"
                            value="{{ $transaction->book->copyright_year }}" disabled />
                    </div>
                </div>
                
                {{-- Number of Pages --}}
              <div class="flex flex-row mt-4 space-x-5">
                <div>
                    <x-input-label for="pages" :value="__('No. of Pages')" />
                    <x-text-input id="pages" name="pages" type="number" class="block w-full mt-1" value="{{ $transaction->book->pages }}" disabled />
                </div>
                
                {{-- Height --}}
                <div>
                    <x-input-label for="height" :value="__('Height')" />
                    <x-text-input id="height" name="height" type="number" class="block w-full mt-1"
                        value="{{ $transaction->book->height }}" disabled/>
                </div>
                
                {{-- Width --}}
                <div>
                    <x-input-label for="width" :value="__('Width')" />
                    <x-text-input id="width" name="width" type="number" class="block w-full mt-1" value="{{ $transaction->book->width }}" disabled/>
                </div>
                
                {{-- Depth --}}
                <div >
                    <x-input-label for="depth" :value="__('Depth')" />
                    <x-text-input id="depth" name="depth" type="number" class="block w-full mt-1" value="{{ $transaction->book->depth }}" disabled/>
                </div>
              </div>

              <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                
                {{-- Transaction Details --}}
                <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                    {{ __('Transaction Details') }}
                </h2>


               <div class="flex flex-row mt-4 space-x-5">
                   {{-- Date --}}
                    <div>
                        <x-input-label for="name" :value="__('Date of Transaction')" />
                        <x-text-input id="name" type="text" class="block w-full mt-1" value="{{ $transaction->created_at }}" disabled />
                    </div>

                    {{-- Date --}}
                    <div>
                        <x-input-label for="name" :value="__('Approved By')" />
                        <x-text-input id="name" type="text" class="block w-full mt-1" value="{{ $transaction->approved_by }}" disabled />
                    </div>
                </div>
                
                <label for="notes" class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Add
                    Note:</label>
                <textarea id="notes" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model='transaction.notes' placeholder="Write your notes here..."></textarea>
                    
            </x-slot>
    
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingReturnCreate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>
    
                <x-danger-button type="submit" class="ml-3" wire:loading.attr="disabled">
                    {{ __('Confirm') }}
                </x-danger-button>
            </x-slot>
    
        </x-dialog-modal>
    </form>
</div>
