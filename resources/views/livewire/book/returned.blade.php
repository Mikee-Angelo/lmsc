<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-danger-button type="button" wire:loading.attr='disabled' wire:click='confirmReturnCreate'>
        {{ __('Return') }}
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
                    <x-input-label for="name" :value="__('Student Name:')" />
                    <p class="text-base text-gray-90">{{ $transaction->student_number->student_latest->name }}</p>
                </div>
                
                <div class="grid grid-cols-4 gap-4 mt-5">
                    {{-- Course --}}
                    <div>
                        <x-input-label for="course" :value="__('Course:')" />
                        <p class="text-base text-gray-90">{{ $transaction->student_number->student_latest->course }}</p>
                    </div>
    
                    {{-- Year Level --}}
                    <div>
                        <x-input-label for="year_level" :value="__('Year/Level:')" />
                        <p class="text-base text-gray-90">{{ $transaction->student_number->student_latest->yearLevel }}</p>
                    </div>
    
                    {{-- Status --}}
                    <div>
                        <x-input-label for="status" :value="__('Status:')" />
                        <p class="text-base text-gray-90">{{ $transaction->student_number->student_latest->status }}</p>
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
                    <p class="text-base text-gray-90">{{ $transaction->book->title }}</p>
                </div>
                
                {{-- Description --}}
                <div class="mt-5">
                    <x-input-label for="description" :value="__('Description:')" />
                    <p class="text-base text-gray-90">{{ $transaction->book->description }}</p>
                </div>
                
                <div class="grid grid-cols-4 gap-4 mt-5">
                    {{-- Edition --}}
                    <div>
                        <x-input-label for="edition" :value="__('Edition:')" />
                        <p class="text-base text-gray-90">{{ $transaction->book->edition }}</p>
                    </div>
                    
                    {{-- ISBN --}}
                    <div>
                        <x-input-label for="isbn" :value="__('ISBN:')" />
                        <p class="text-base text-gray-90">{{ $transaction->book->isbn }}</p>
                    </div>

                    {{-- Copyright Year --}}
                    <div>
                        <x-input-label for="copyright_year" :value="__('Copyright Year:')" />
                        <p class="text-base text-gray-90">{{ $transaction->book->copyright_year }}</p>
                            
                    </div>
                </div>
                
                {{-- Number of Pages --}}
              <div class="grid grid-cols-4 gap-4 mt-5">
                <div>
                    <x-input-label for="pages" :value="__('No. of Pages:')" />
                    <p class="text-base text-gray-90">{{ $transaction->book->pages }}</p>
                </div>
                
                {{-- Height --}}
                <div>
                    <x-input-label for="height" :value="__('Height:')" />
                    <p class="text-base text-gray-90">{{ $transaction->book->height }}</p>
                </div>
                
                {{-- Width --}}
                <div>
                    <x-input-label for="width" :value="__('Width:')" />
                    <p class="text-base text-gray-90">{{ $transaction->book->width }}</p>
                </div>
                
                {{-- Depth --}}
                <div>
                    <x-input-label for="depth" :value="__('Depth:')" />
                    <p class="text-base text-gray-90">{{ $transaction->book->depth }}</p>
                </div>
              </div>

              <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                
                {{-- Transaction Details --}}
                <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                    {{ __('Transaction Details') }}
                </h2>


               <div class="grid grid-cols-2 gap-2 mt-5">
                   {{-- Date --}}
                    <div>
                        <x-input-label for="name" :value="__('Date of Transaction')" />
                        <p class="text-base text-gray-90">{{ $transaction->created_at }}</p>
                    </div>

                    {{-- Date --}}
                    <div>
                        <x-input-label for="name" :value="__('Approved By')" />
                        <p class="text-base text-gray-90">{{ $transaction->approver->name }}</p>
                    </div>
                </div>
                
                <label for="notes" class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Add
                    Note:</label>
                <textarea id="notes" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    wire:model='transaction.notes' placeholder="Write your notes here..."></textarea>

                <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">

                {{-- Transaction Details --}}
                <h2 class="mb-5 text-lg font-medium leading-tight text-gray-800">
                    {{ __('Add Penalties') }}
                </h2>
                
                <div class="mt-4">

                    <x-input-label for="penalty " :value="__('Penalty')" />
                    <div class="flex flex-row mt-1 space-x-2">
                        <div class="w-full ">
                            <select id="penalty" name="penalty"
                                class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                wire:model="selected_penalty" wire:change='setAmount'>
                                <option selected>Select Option...</option>
                                @foreach (collect($penalties) as $k => $v)
                                <option value="{{ $k }}">{{ $v['name'] }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full">
                            <div class="flex">
                                <span
                                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    ₱
                                </span>
                                <input type="number" 
                                    wire:model="amount" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                            </div>
                        </div>

                        {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}        
                    </div>

                    <label for="notes" class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Add
                        Note:</label>
                    <textarea id="notes" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        wire:model='notes' placeholder="Write your notes here..."></textarea>

                    @if (isset($selected_penalty))
                    <x-primary-button type="button" class="w-full mt-2" wire:loading.attr='disabled' wire:click='addPenalty'>
                        {{ __('Add') }}
                    </x-primary-button>
                    @endif
                    
                    @if($penalty_lists && $transaction_penalties)
                    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Penalty
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Note
                                    </th>
                                    
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                   
                            </thead>
                            <tbody>

                                @foreach (collect($transaction_penalties) as $k => $v)

                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $penalty_lists[$k]['name']}}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ '₱ ' .number_format($v['amount'] / 100, 2)}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $v['note'] ?? ''}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-danger-button type="button" wire:loading.attr='disabled' wire:click='confirmRemovePenalty({{$k}})'>
                                                {{ __('Remove') }}
                                        </x-danger-button>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                    @endif
                
                </div>
                    
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
