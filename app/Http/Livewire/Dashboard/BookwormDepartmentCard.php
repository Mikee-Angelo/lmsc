<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\StudentId;

class BookwormDepartmentCard extends Component
{
    public StudentId $student_id  ; 

    public function render()
    {
        return view('livewire.dashboard.bookworm-department-card');
    }

    public function mount() {  
        $this->getBookwormDepartment();
    }

    public function getBookwormDepartment() { 
        $this->student_id = StudentId::withCount('transactions')->orderBy('transactions_count', 'DESC')->first() ?? 0;

    }
}