<?php

namespace App\Http\Livewire\Penalty;

use Livewire\Component;
use App\Models\Penalty; 

class Create extends Component
{   
    public Penalty $penalty;
    public $confirmingPenaltyCreate = false;
    public $types = ['FIXED', 'VARIABLE']; 

    protected $rules = [
        'penalty.name' => 'required|string',
        'penalty.fee' => 'required',
        'penalty.type' => 'required|string',
        'penalty.excludes_from' => 'nullable|string',
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
        $this->penalty = new Penalty();
    }

    public function submit() { 
        $this->validate();   
        
        $this->penalty->created_by = auth()->user()->id;
        $this->penalty->fee = $this->penalty->fee * 100;    
        $this->penalty->type = $this->types[$this->penalty->type];
            $this->penalty->excludes_from = $this->penalty->excludes_from != 'null' ? $this->remarks[$this->penalty->excludes_from] : NULL;
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
