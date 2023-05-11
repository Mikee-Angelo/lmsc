<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl leading-tight text-gray-800">
            {{ __('Manage Stakeholders') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="flex flex-row space-x-2">

                @if (auth()->user()->hasDirectPermission('import stakeholder'))
                <livewire:student.create />
                @endif
                
                @if (auth()->user()->hasDirectPermission('create faculty'))
                <livewire:student.create-faculty />
                @endif
            </div>
            
            @if (auth()->user()->hasDirectPermission('view stakeholder'))
            <livewire:tables.student-table />
            @endif
        </div>
    </div>


</x-app-layout>