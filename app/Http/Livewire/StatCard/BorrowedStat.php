<?php

namespace App\Http\Livewire\StatCard;

use Livewire\Component;
use App\Models\Transaction; 

class BorrowedStat extends Component
{
    public $count = 0;
    public Transaction $transaction;

    protected $listeners = ['updateTransactionCount'];

    public function render()
    {
        return view('livewire.stat-card.borrowed-stat');
    }

    public function mount(Transaction $transaction) { 
        $this->transaction = $transaction;

        $this->updateTransactionCount();
    }

    public function updateTransactionCount(){ 
        $this->count= $this->transaction->where('returned_at', null)->count();
    }
}
