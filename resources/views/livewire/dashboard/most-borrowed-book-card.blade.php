<a href="#"
    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Most Borrowed Book</h5>
    <div class="flex flex-row justify-between">
        <div>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{$book->title ?? ''}}</p>
        </div>
        
        <div>
            <p class="text-4xl font-normal text-gray-900 dark:text-white">{{ $book->transactions_count ?? 0}}</p>
        </div>
    </div>
</a>