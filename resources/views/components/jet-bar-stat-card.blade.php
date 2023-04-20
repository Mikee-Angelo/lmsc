@php
    $colors = [
            'info' => 'bg-blue-700',
            'success' => 'bg-emerald-700',
            'warning' => 'bg-yellow-700',
            'danger' => 'bg-rose-700',
    ];
@endphp

<div {{ $attributes->merge(['class' => "flex items-center p-4 rounded-md shadow-xs dark:bg-gray-800 " . $colors[$type ?? 'info']])}}>
    
    <div class="w-full">
        <div class="flex flex-row items-start justify-between mb-1">
            <p class="text-3xl font-semibold text-white">
                {{ $number }}
            </p>

            <div class="p-3 mr-4 text-white">
                {{ $slot }}
            </div>
        </div>
        

        <p class="mb-2 text-sm text-white">
            {{ $title }}
        </p>
    </div>

    
</div>