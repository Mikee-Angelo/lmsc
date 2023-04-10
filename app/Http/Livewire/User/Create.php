<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Create extends Component
{
    public User $user;
    public $confirmingUserCreate = false; 
    public $password;

    protected $rules = [ 
        'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'user.name' => ['required', 'string', 'max:1'],  
    ];

    public function render()
    {
        return view('livewire.user.create');
    }

    public function mount() {
        $this->user = new User(); 
    }

    public function confirmUserCreate() { 
        $this->confirmingUserCreate= true;

        //Resets the field of the form 
        $this->user = new User();
        $this->password = null;

    }

    public function submit() { 
        if(filled($this->password)) { 
            $this->validate([
                'password' => ['required', 'min:8', 'max:255',  'string'],
            ]);
            
            $this->user->password = bcrypt($this->password);
            
            $saved = $this->user->save();

            if($saved) { 
                //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');
                
                //Closes the modal 
                $this->confirmingUserCreate = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'User added successfully'
                ]);
            }
        }
    }
}
