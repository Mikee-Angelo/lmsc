<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl leading-tight text-gray-800">
            {{ __('Manage Books') }}
        </h2>
    </x-slot>
    
    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            
            <x-jet-bar-stats-container>
                <livewire:stat-card.book-stat />
                
                <livewire:stat-card.available-stat />
                
                <livewire:stat-card.borrowed-stat />
                
                <livewire:stat-card.returned-stat /> 
            </x-jet-bar-container>
            
            @if (auth()->user()->hasDirectPermission('create books'))
                <livewire:book.create />
            @endif
            
            @if (auth()->user()->hasDirectPermission('view books'))
            <livewire:tables.book-table />
            @endif
        </div>
    </div>

    
</x-app-layout>