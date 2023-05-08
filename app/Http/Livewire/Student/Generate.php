<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Models\LibraryCard;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;
use App\Models\Student;
use App\Models\StudentId;

class Generate extends Component
{
    public LibraryCard $library_card; 
    public $student_id; 
    public $confirmingCardGenerate = false;
    public $reasons = ['NEW', 'RENEWAL', 'LOST CARD'];

    protected $rules = [
        'library_card.reason' => 'required|string',
    ];

    public function render()
    {
        return view('livewire.student.generate');
    }

    public function mount() { 
        $this->library_card = new LibraryCard();
    }

    public function confirmCardGenerate() { 
        $this->confirmingCardGenerate = true;

        //Resets the field of the form 
        $this->library_card = new LibraryCard();
    }

    public function submit() { 
        
        try { 
            $this->validate();   

            //Adds added_by data
            $this->library_card->created_by = Auth::id();
            $this->library_card->student_id = $this->student_id; 
            $this->library_card->reason = $this->reasons[$this->library_card->reason];

            $saved = $this->library_card->save();

            if($saved) { 
                //Closes the modal 
                $this->confirmingCardGenerate = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Library Card Generated'
                ]);

                return redirect()->route('lc.show', ['student_id' => $this->student_id]);
            } else { 
                throw new Exception();
            }
        }  catch (Exception $e) { 
                $this->dispatchBrowserEvent('error', [
                    'type' => 'error',
                    'title' => 'Error',
                    'text' => 'Something went wrong'
                ]);
        }
    }

}
