
<div class="flex space-x-2 justify-evenly">
    @if (auth()->user()->hasDirectPermission('update books'))
        @livewire('book.update', ['title' => $title, 'book_id' => $id], key($id))  
    @endif  
    @livewire('book.borrow', ['title' => $title, 'book_id' => $id], key($id))
</div>