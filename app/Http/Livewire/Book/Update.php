<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Book; 
use App\Models\Transaction; 

class Update extends Component
{
    public Book $book; 
    public $book_id; 
    public $title;
    public $confirmingBookUpdate = false;
    public $hasTransaction = false;

    protected $rules = [
        'book.title' => 'required|string',
        'book.description' => 'required|string',
        'book.edition' => 'required|numeric', 
        'book.isbn' => 'required|string',
        'book.copyright_year' => 'required|numeric', 
        'book.pages' => 'required|numeric', 
        'book.height' => 'nullable|numeric',
        'book.width' => 'nullable|numeric',
        'book.depth' => 'nullable|numeric',
    ];

    public function render()
    {
        return view('livewire.book.update');
    }

    public function mount() { 

        $this->book = Book::find($this->book_id);
        
        $this->checkBorrow(); 
    }
    
    public function confirmBookUpdate() { 
        $this->confirmingBookUpdate = true;
    }


    private function checkBorrow() { 
        $this->hasTransaction = Transaction::where([
            ['book_id','=', $this->book_id],
            ['returned_at','=', null]
        ])->exists();
    }

    public function submit() { 
        $this->validate();   
        
        try { 
            $saved = $this->book->save();

            if($saved) { 

                //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');

                //Closes the modal 
                $this->confirmingBookUpdate = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Book updated successfully'
                ]);
            } else { 
                throw new Exception();
            }
        }  catch (Exception $e) { 
                $this->dispatchBrowserEvent('error', [
                    'type' => 'error',
                    'title' => 'Error',
                    'text' => 'Something went wrong'
                ]);
        }
    }
}