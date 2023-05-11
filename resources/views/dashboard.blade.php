<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <x-jet-bar-container>
        <x-jet-bar-stats-container>
            <livewire:stat-card.book-stat />
            
            <livewire:stat-card.penalty-stat />

            <livewire:stat-card.stakeholder-stat />

            <livewire:stat-card.available-stat />
           
        </x-jet-bar-stats-container>
            <div class="flex flex-row space-x-4">
                <livewire:dashboard.most-borrowed-book-card />
                
                <livewire:dashboard.bookworm-department-card />
                
                <livewire:dashboard.newly-added-book-card />
            </div>
    
    </x-jet-bar-container>
</x-app-layout>
