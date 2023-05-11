<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public User $user;
   
    //Handles all the list of roles
    public $roles;

    //Stores all the permissions
    public $permissions;

    //Handles the selected role
    public $selectedRole;
    
    //Store the selected permission
    public $selectedPermissions = [];
    
    //Handles the user creation state
    public $confirmingUserCreate = false;
    
    //Stores the password input value
    public $password;

     //Stores the password input value
    public $password_confirmation;

    protected $listeners = ['loadSelectedRolePermissions' =>  'loadSelectedRolePermissions'];

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
        $this->roles = Role::all();
        $this->selectedRole  = $this->roles->first()->id; 
        
        $this->permissions = Permission::all();

        $this->loadSelectedRolePermissions();
    }

    public function loadSelectedRolePermissions(){ 
        $this->selectedPermissions = Role::findById($this->selectedRole)->permissions->pluck('id')->toArray();
    }

    public function confirmUserCreate() { 
        $this->confirmingUserCreate= true;

        //Resets the field of the form 
        $this->user = new User();
        $this->password = null;
        $this->password_confirmation = null;
        
        $this->loadSelectedRolePermissions();
    }
    
    public function submit() { 

        try { 

            DB::beginTransaction();
            if(filled($this->password)) { 
                $this->validate([
                    'password' => ['required', 'min:8', 'max:255',  'string', 'confirmed'],
                ]);
                
                $this->user->password = bcrypt($this->password);
                
                $saved = $this->user->save();
                $this->user->givePermissionTo($this->selectedPermissions);

                $this->user->assignRole($this->selectedRole);

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
            
            DB::commit();

        } catch(e) { 
            DB::rollback();
        }
 
    }
}
