<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Book; 

class NewlyAddedBookCard extends Component
{
    public Book $book; 

    public function render()
    {
        return view('livewire.dashboard.newly-added-book-card');
    }

    public function mount() { 
        $this->getNewlyAddedBook();
    }

    public function getNewlyAddedBook() {  
        $result = Book::orderBy('created_at', 'DESC')->first();

        if(!is_null($result)) { 
            $this->book = $result;
        }
    }
}
