<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Delete extends Component
{
    public $user_id; 
    public $name;
    public $confirmingUserDelete = false;

    public function render()
    {
        return view('livewire.user.delete');
    }

    public function confirmUserDelete() { 
        $this->confirmingUserDelete = true;
    }

    public function submit() { 
       try { 
            $saved = User::where('id', $this->user_id)->delete(); 

            if($saved) { 
            //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');
        
                //Closes the modal 
                $this->confirmingUserDelete = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'User deactivate successfully'
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
