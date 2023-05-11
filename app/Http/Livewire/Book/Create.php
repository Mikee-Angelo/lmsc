<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Book;

class Create extends Component
{   
    public Book $book;
    public $confirmingBookCreate = false;

    protected $rules = [
        'book.accession_number' => 'required|string',
        'book.title' => 'required|string',
        'book.description' => 'required|string',
        'book.edition' => 'required|string', 
        'book.isbn' => 'required|string|unique:books,isbn',
        'book.copyright_year' => 'required|string', 
        'book.year_published' => 'required|string', 
        'book.pages' => 'required|numeric', 
        'book.height' => 'nullable|numeric',
        'book.width' => 'nullable|numeric',
        'book.depth' => 'nullable|numeric',
        'book.price' => 'required|numeric',
    ];

    public function mount(Book $book) { 
        $this->book = $book;
    }

    public function render()
    {
        return view('livewire.book.create');
    }

    public function confirmBookCreate() { 
        $this->confirmingBookCreate = true;

        //Resets the field of the form 
        $this->book = new Book();
    }

    public function submit() { 
        $this->validate();   

        $this->book->price = $this->book->price * 100; 
        
        $saved = $this->book->save();

        if($saved) { 

            //Refreshes the livewire datatable
            $this->emit('refreshLivewireDatatable');
            
            //Emit changes on the book count
            $this->emit('updateBookCount');

            //Emit changes on the available book 
            $this->emit('updateAvailableCount');

            //Closes the modal 
            $this->confirmingBookCreate = false;

            $this->dispatchBrowserEvent('success', [
                'type' => 'success',
                'title' => 'Success',
                'text' => 'Book added successfully'
            ]);
        } else { 
            $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Something went wrong'
            ]);
        }
    }
}
