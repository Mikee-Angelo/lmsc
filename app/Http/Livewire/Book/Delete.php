<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Book;

class Delete extends Component
{
    public $book_id; 
    public $title;
    public $confirmingBookDelete = false;

    public function render()
    {
        return view('livewire.book.delete');
    }

    public function confirmBookDelete() { 
        $this->confirmingBookDelete = true;
    }

    public function submit() { 
       try { 
            $saved = Book::where('id', $this->book_id)->delete(); 

            if($saved) { 
            //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');
        
                //Closes the modal 
                $this->confirmingBookDelete = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Book deleted successfully'
                ]);
            } else { 
                throw new Exception("Something went wrong");
            }
       } catch (Exception $e) { 
            $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Something went wrong'
            ]);
       }
    }
}