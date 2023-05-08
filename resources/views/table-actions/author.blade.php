<div class="flex space-x-2 ">
    @livewire('author.update', ['name' => $name, 'author_id' => $id], key($id))
    @livewire('author.delete', ['name' => $name, 'author_id' => $id], key($id))
</div>