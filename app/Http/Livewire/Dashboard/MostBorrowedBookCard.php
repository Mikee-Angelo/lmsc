<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Book;

class MostBorrowedBookCard extends Component
{
    public Book $book;

    public function render()
    {
        return view('livewire.dashboard.most-borrowed-book-card');
    }

    public function mount() { 
        $this->getMostBorrowedBook();
    }

    public function getMostBorrowedBook() { 
        $this->book = Book::withCount('transactions')->orderBy('transactions_count', 'DESC')->first();
    }
}
