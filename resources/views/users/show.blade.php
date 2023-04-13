<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl leading-tight text-gray-800">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            
            @if (auth()->user()->hasDirectPermission('create account'))
                <livewire:user.create />
            @endif

            <livewire:tables.users-table />
        </div>
    </div>

</x-app-layout>