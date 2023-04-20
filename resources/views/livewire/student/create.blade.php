<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-primary-button type="button" class="mb-4" wire:loading.attr='disabled' wire:click='confirmStudentCreate'>
        {{ __('Import from Excel') }}
    </x-primary-button>

    <form wire:submit.prevent='submit'>
        <x-dialog-modal wire:model='confirmingStudentCreate'>
            <x-slot name="title">
                {{ __('Import Masterlist') }}
            </x-slot>

            <x-slot name="content">

                <h3 class="mt-4 text-lg font-medium text-gray-900">Information</h3>
                
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span>
                                or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">XLSX, XLS, CSV</p>
                        </div>
                        <input wire:model='excel' id="dropzone-file" type="file" class="hidden" accept=".csv,.xlsx,.xls"/>
                    </label>
                </div>

                @if ($excel)
                    <div class="flex mt-5">
                        <div class="h-30 w-30">
                            <img src="{{ asset('/img/spreadsheet.png') }}" class="object-cover w-24 h-24">
                        </div>
                       <div>
                        <p>{{ $excel }}</p>
                        
                        <!-- Using utilities: -->
                        <button class="px-4 py-2 mt-3 font-bold text-white bg-red-500 rounded hover:bg-red-700" wire:click='removeFile'>
                            Remove
                        </button>
                       </div>
                    </div>
                @endif
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('confirmingStudentCreate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3" wire:loading.attr="disabled">
                    {{ __('Import') }}
                </x-primary-button>
            </x-slot>

        </x-dialog-modal>
    </form>
</div>