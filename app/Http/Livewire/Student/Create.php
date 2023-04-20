<?php

namespace App\Http\Livewire\Student;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Component;
use App\Imports\StudentImport;

class Create extends Component
{   
    use WithFileUploads;
    public $confirmingStudentCreate = false;
    public $excel;
    
    public function render()
    {
        return view('livewire.student.create');
    }

    public function confirmStudentCreate() { 
        $this->confirmingStudentCreate = true;

        //Resets the field of the form 
        $this->removeFile();
    }

    public function removeFile() {
        $this->excel = null; 
    }

    public function submit() { 
        try { 
            $this->validate(['excel' => "required"]); 
        
            $e = Excel::import(new StudentImport, $this->excel);

            if(isset($e)) { 
                //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');

                $this->confirmingStudentCreate = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Imported successfully'
                ]);
            }

            $this->removeFile();

        } catch (Exception $e) { 
            $this->confirmingStudentCreate = false;
            $this->removeFile();

             $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Something went wrong'
            ]);
        }
    }

}
