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

                <x-jet-bar-stat-card title="No. of Borrowed Books" number="0" type="success">
                    <x-jet-bar-icon type="users" fill />
                </x-jet-bar-stat-card>

                <x-jet-bar-stat-card title="No. of Returned Books" number="0" type="warning">
                    <x-jet-bar-icon type="users" fill />
                </x-jet-bar-stat-card>
            </x-jet-bar-container>


            <livewire:book.create />

            <livewire:tables.book-table />
        </div>
    </div>

    
</x-app-layout>