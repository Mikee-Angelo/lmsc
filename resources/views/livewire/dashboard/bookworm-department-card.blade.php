<a href="#"
    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Bookworm Stakeholder</h5>
    <div class="flex flex-row justify-between">
        <div>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{$student_id->student_latest->name}}</p>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{$student_id->student_latest->course}}</p>
        </div>
        
        <div>
            <p class="text-4xl font-normal text-gray-900 dark:text-white">{{ $student_id->transactions_count}}</p>
        </div>
    </div>
</a>