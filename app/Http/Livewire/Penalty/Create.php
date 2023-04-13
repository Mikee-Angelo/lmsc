<?php

namespace App\Http\Livewire\Penalty;

use Livewire\Component;
use App\Models\Penalty; 

class Create extends Component
{   
    public Penalty $penalty;
    public $confirmingPenaltyCreate = false;

    protected $rules = [
        'penalty.name' => 'required|string',
        'penalty.fee' => 'required',
    ];

    public function render()
    {
        return view('livewire.penalty.create');
    }

    public function mount() { 
        $this->penalty = new Penalty();
    }

    public function buildActions() { 
        return [
            Action::value('edit')->label('Edit Selected')->group('Default Options')->callback(function ($mode, $items) {
                // $items contains an array with the primary keys of the selected items
            }),
        ];
    }

    public function confirmPenaltyCreate() { 
        $this->confirmingPenaltyCreate = true;

        //Resets the field of the form 
        $this->book = new Penalty();
    }

    public function submit() { 
        $this->validate();   
        
        $this->penalty->created_by = auth()->user()->id;
        $saved = $this->penalty->save();

        if($saved) { 

            //Refreshes the livewire datatable
            $this->emit('refreshLivewireDatatable');

            //Closes the modal 
            $this->confirmingPenaltyCreate = false;

            $this->dispatchBrowserEvent('success', [
                'type' => 'success',
                'title' => 'Success',
                'text' => 'Penalty added successfully'
            ]);
        } else { 
            $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Something went wrong'
            ]);
        }
    }
}
