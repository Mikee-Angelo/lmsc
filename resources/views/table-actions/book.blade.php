
<div class="flex space-x-2 justify-evenly">
    @livewire('book.update', ['title' => $title, 'book_id' => $id], key($id))    
    @livewire('book.borrow', ['title' => $title, 'book_id' => $id], key($id))
</div>