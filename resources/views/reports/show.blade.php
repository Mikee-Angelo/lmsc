<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl leading-tight text-gray-800">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    <div>
        
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                            out</a>
                    </li>
                </ul>
            </div>

            <h2 class="-mb-8 text-3xl leading-tight text-gray-800">
                {{ __('Currently Borrowed Books') }}
            </h2>
            <livewire:tables.reports.currently-borrowed-table />

            <h2 class="mt-10 -mb-8 text-3xl leading-tight text-gray-800">
                {{ __('Library Cards') }}
            </h2>
            <livewire:tables.reports.library-card-student-table />

            <h2 class="mt-10 -mb-8 text-3xl leading-tight text-gray-800">
                {{ __('Frequent Borrower') }}
            </h2>
            <livewire:tables.reports.frequent-borrow-student-table />

            <h2 class="mt-10 -mb-8 text-3xl leading-tight text-gray-800">
                {{ __('Borrowed Books') }}
            </h2>
            <livewire:tables.reports.borrow-student-table />
        </div>
    </div>


</x-app-layout>