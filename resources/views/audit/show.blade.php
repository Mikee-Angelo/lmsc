<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl leading-tight text-gray-800">
            {{ __('Audit Trail') }}
        </h2>
    </x-slot>

    <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h2 class="-mb-8 text-3xl leading-tight text-gray-800">
                {{ __('Books') }}
            </h2>
            <livewire:tables.audit.book-table />
            
            <h2 class="mt-5 -mb-8 text-3xl leading-tight text-gray-800">
                {{ __('Users') }}
            </h2>
            <livewire:tables.audit.user-table />

            <h2 class="mt-5 -mb-8 text-3xl leading-tight text-gray-800">
                {{ __('Stakeholders') }}
            </h2>
            <livewire:tables.audit.stakeholder-table />

            <h2 class="mt-5 -mb-8 text-3xl leading-tight text-gray-800">
                {{ __('Penalties') }}
            </h2>
            <livewire:tables.audit.penalties-table />
        </div>
    </div>


</x-app-layout>