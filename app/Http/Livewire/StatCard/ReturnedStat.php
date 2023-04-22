<?php

namespace App\Http\Livewire\StatCard;

use Livewire\Component;
use App\Models\Transaction;
class ReturnedStat extends Component
{
    public $count = 0; 
    protected $listeners = ['updateReturnedCount'] ;

    public function render()
    {
        return view('livewire.stat-card.returned-stat');
    }

    public function mount() { 
        
        $this->updateReturnedCount();
    }

    public function updateReturnedCount() { 
        $this->count = Transaction::where('returned_at', '!=', null)->count();
    }
}
