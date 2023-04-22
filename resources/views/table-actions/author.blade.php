<div class="flex justify-around space-x-1">
    @livewire('author.update', ['name' => $name, 'author_id' => $id], key($id))
    @livewire('author.delete', ['name' => $name, 'author_id' => $id], key($id))
</div>