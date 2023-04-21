<?php

namespace App\Http\Livewire\StatCard;

use Livewire\Component;
use App\Models\Transaction;
class ReturnedStat extends Component
{
    public $count = 0; 
    private Transaction $transaction;
    protected $listeners = ['updateReturnedCount'] ;

    public function render()
    {
        return view('livewire.stat-card.returned-stat');
    }

    public function mount(Transaction $transaction) { 
        $this->transaction = $transaction; 

        $this->updateReturnedCount();
    }

    public function updateReturnedCount() { 
        $this->count = $this->transaction->where('returned_at', '!=', null)->count();
    }
}
