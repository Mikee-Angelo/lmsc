<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public Role $role;
    public $confirmingRoleCreate = false;

    protected $rules = [
        'role.name' => 'required|string'
    ];

    public function mount(Role $role) { 
        $this->role = $role;
    }

    public function confirmRoleCreate() { 
        $this->confirmingRoleCreate = true;

        //Resets the field of the form 
        $this->role = new Role();
    }

    public function render()
    {
        return view('livewire.role.create');
    }

    public function submit() { 
        $this->validate();   
        
        $saved = $this->role->save();

        if($saved) { 

            //Refreshes the livewire datatable
            $this->emit('refreshLivewireDatatable');

            //Closes the modal 
            $this->confirmingRoleCreate = false;

            $this->dispatchBrowserEvent('success', [
                'type' => 'success',
                'title' => 'Success',
                'text' => 'Role added successfully'
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
