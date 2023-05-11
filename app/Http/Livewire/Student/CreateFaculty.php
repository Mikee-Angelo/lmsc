<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\Student; 
use App\Models\StudentId; 
use Illuminate\Support\Facades\DB;

class CreateFaculty extends Component
{
    public Student $student;
    public StudentId $studentIds; 
    public $confirmingFacultyCreate = false; 

    protected $rules = [ 
        'studentIds.student_number' => 'required|unique:student_ids,student_number',
        'student.name' =>  'required|string', 
        'student.course' => 'required|string',
        'student.level' => 'required|string', 
        'student.school_year' => 'required|string', 
    ];

    public function mount() { 
        $this->student = new Student(); 
        $this->studentIds = new StudentId();
    }

    public function render()
    {
        return view('livewire.student.create-faculty');
    }

    public function confirmFacultyCreate() { 
        $this->confirmingFacultyCreate = true; 
        $this->student = new Student();
        $this->studentIds = new StudentId();
    }

    public function submit() { 
        
        try { 

            $this->validate(); 

            DB::beginTransaction();

            $this->student->remarks = 'FACULTY'; 

            $student_id = $this->studentIds->save();

            $this->student->student_id = $this->studentIds->id; 

            $this->student->save();

            //Refreshes the livewire datatable
            $this->emit('refreshLivewireDatatable');

            $this->confirmingFacultyCreate = false;

            $this->dispatchBrowserEvent('success', [
                'type' => 'success',
                'title' => 'Success',
                'text' => 'Faculty added successfully'
            ]);
            
            DB::commit();
        } catch (Exception $e) { 
            $this->confirmingFacultyCreate = false;
            $this->removeFile();

             $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Something went wrong'
            ]);

            DB::rollback();

        }
    }
}
