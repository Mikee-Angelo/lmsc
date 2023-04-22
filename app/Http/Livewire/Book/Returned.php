<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Transaction;
use Carbon\Carbon; 

class Returned extends Component
{
    public Transaction $transaction;
    public $confirmingReturnCreate = false;
    
    //Holds the value of the selected book
    public $book_id;
    
    protected $rules = [ 

        'book_id' => 'required|exists:books,id',
    ];

    public function render()
    {
        return view('livewire.book.returned');
    }

    public function mount() {
        $this->transaction =  Transaction::with(['student_number', 'student_number.student_latest', 'book'])->where([
            ['book_id', '=', $this->book_id], 
            ['returned_at', '=', null]
        ])->first();  
    }

    public function confirmReturnCreate() { 
        $this->confirmingReturnCreate = true; 
    }

    public function submit() { 
        try { 
            $this->transaction->returned_at = Carbon::now();

         $saved =    $this->transaction->save();

         if($saved) { 
            $this->emit('refreshLivewireDatatable');
            
            //Emit changes on the book count
            $this->emit('updateReturnedCount');
            
            //Emit changes on the available book 
            $this->emit('updateAvailableCount');

            //Closes the modal 
            $this->confirmingReturnCreate = false;

            $this->dispatchBrowserEvent('success', [
                'type' => 'success',
                'title' => 'Success',
                'text' => 'Book returned successfully'
            ]);
         }else {
            throw Exception; 
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
