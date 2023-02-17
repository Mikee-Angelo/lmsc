<?php

namespace App\Http\Livewire\StatCard;

use Livewire\Component;
use App\Models\Book; 

class BookStat extends Component
{
    public $count = 0; 
    public Book $book;

    protected $listeners = ['updateBookCount']; 

    public function render()
    {
        return view('livewire.stat-card.book-stat');
    }

    public function mount(Book $book) { 
        $this->book = $book;

        $this->updateBookCount();
    }

    public function updateBookCount() { 
        $this->count = $this->book->count();
    }
}
