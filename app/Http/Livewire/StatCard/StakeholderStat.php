<?php

namespace App\Http\Livewire\StatCard;

use Livewire\Component;
use App\Models\StudentId;

class StakeholderStat extends Component
{
    public $count = 0; 

    public function render()
    {
        return view('livewire.stat-card.stakeholder-stat');
    }

    public function mount()  { 
        $this->updateStakeholderCount();
    }

    public function updateStakeholderCount() { 
        $this->count = StudentId::count();
    }
}
