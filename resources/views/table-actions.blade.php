<div class="flex justify-around space-x-1">
    @livewire('book.borrow', ['title' => $title, 'book_id' => $id], key($id))
</div>