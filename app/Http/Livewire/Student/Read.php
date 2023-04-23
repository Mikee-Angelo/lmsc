<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\StudentId;

class Read extends Component
{
    public $student_id; 
    public StudentId $student; 
    public $confirmingStudentRead = false;

    public function render()
    {
        return view('livewire.student.read');
    }

    public function mount() { 
        $this->student = StudentId::find($this->student_id);
    }

    public function confirmStudentRead() { 
        $this->confirmingStudentRead = true;
    }

    public function submit() { 

    }
}
