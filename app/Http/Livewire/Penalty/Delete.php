<?php

namespace App\Http\Livewire\Penalty;

use Livewire\Component;
use App\Models\Penalty; 

class Delete extends Component
{
    
    public $penalty_id; 
    public $name;
    public $confirmingPenaltyDelete = false;

    public function render()
    {
        return view('livewire.penalty.delete');
    }

    public function confirmPenaltyDelete() { 
        $this->confirmingPenaltyDelete = true;
    }

    public function submit() { 
       try { 
            $saved = Penalty::where('id', $this->penalty_id)->delete(); 

            if($saved) { 
            //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');
        
                //Closes the modal 
                $this->confirmingPenaltyDelete = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Penalty deleted successfully'
                ]);
            } else { 
                throw new Exception("Something went wrong");
            }
       } catch (Exception $e) { 
            $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Something went wrong'
            ]);
       }
    }
}
