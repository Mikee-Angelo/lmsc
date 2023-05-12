<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Penalty;
use App\Models\TransactionPenalty;
use Carbon\Carbon; 
use Illuminate\Support\Facades\DB;

class Returned extends Component
{
    public Transaction $transaction;
    public $confirmingReturnCreate = false;
    public $penalties = [];
    public $penalty_lists = [];
    public $transaction_penalties = [];
    public $selected_penalty;
    public $amount;
    public $notes;
    
    //Holds the value of the selected book
    public $book_id;
    
    protected $rules = [ 
        'book_id' => 'required|exists:books,id',
        'amount' => 'required|string', 
        'notes' => 'string'
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

        $this->loadPenalties();
    }

    public function loadPenalties() { 
        $this->penalties = Penalty::get()->toArray();
    }

    public function addPenalty() { 
        if(isset($this->selected_penalty)) { 
            $this->penalty_lists[] = $this->penalties[$this->selected_penalty];
            $this->transaction_penalties[] = new TransactionPenalty([
                'transaction_id' => $this->transaction->id,
                'penalty_id' => $this->penalties[$this->selected_penalty]['id'], 
                'amount' => $this->penalties[$this->selected_penalty]['type'] == 'VARIABLE' ? $this->transaction->book->price : $this->amount * 100,
                'note' => $this->notes
            ]);
        }

        $this->selected_penalty = null;
        $this->amount = null;
        $this->notes = null;
    }
    
    public function confirmRemovePenalty($key) { 
       unset($this->penalty_lists[$key]);
       unset($this->transaction_penalties[$key]);
    }

    public function setAmount() { 
        if(isset($this->selected_penalty)) { 
            $this->amount = $this->penalties[$this->selected_penalty]['type'] == 'VARIABLE' ? number_format($this->transaction->book->price / 100 , 2) : number_format($this->penalties[$this->selected_penalty]['fee'] / 100, 2);
        }
    }

    public function confirmReturnCreate() { 
        $this->confirmingReturnCreate = true; 
        $this->selected_penalty = null;
        $this->amount = null; 
        $this->penalty_lists = [];
    }

    public function submit() { 
        try { 

            DB::beginTransaction();
           
            if($this->penalty_lists && $this->transaction_penalties) { 
                foreach($this->transaction_penalties as $tp) { 
                    TransactionPenalty::create($tp);
                }
            }

            $this->transaction->returned_at = Carbon::now();

            $saved = $this->transaction->save();

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

                DB::commit();
            }else {
                throw Exception; 
            }
        } catch (Exception $e) {

            DB::rollback();
            $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Something went wrong'
            ]);
        }
    }
}
