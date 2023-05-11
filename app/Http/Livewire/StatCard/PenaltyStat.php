<?php

namespace App\Http\Livewire\StatCard;

use Livewire\Component;
use App\Models\TransactionPenalty;

class PenaltyStat extends Component
{
    public $count = 0; 

    protected $listeners = ['updatePenaltyCount'];


    public function render()
    {
        return view('livewire.stat-card.penalty-stat');
    }

    public function mount() { 
        $this->updatePenaltyCount();
    }

    public function updatePenaltyCount() { 
        $this->count = TransactionPenalty::where('status', 'Pending')->count();
    }
}
