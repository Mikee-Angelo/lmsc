<?php

namespace App\Http\Livewire\StatCard;

use Livewire\Component;
use App\Models\Book; 
use  App\Models\Transaction; 

class AvailableStat extends Component
{
    public $count = 0; 

    protected $listeners = ['updateAvailableCount'];

    public function render()
    {
        return view('livewire.stat-card.available-stat');
    }

    public function mount() { 
        $this->updateAvailableCount();
    }

    public function updateAvailableCount() { 
        $this->count = Book::count() - Transaction::where('returned_at', null)->count();
    }
    
}
