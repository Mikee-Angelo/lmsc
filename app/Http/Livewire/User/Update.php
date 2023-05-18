<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use OwenIt\Auditing\Models\Audit;

class Update extends Component
{
    public User $user; 

    public $user_id; 

    public $confirmingUserUpdate = false;

    //Stores the password input value
    public $password;

     //Stores the password input value
    public $password_confirmation;

    //Handles all the list of roles
    public $roles;

    //Stores all the permissions
    public $permissions;

    //Store the selected permission
    public $selectedPermissions = [];

    //Handles the selected role
    public $selectedRole;

    protected $rules = [ 
        'user.email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'user.name' => ['required', 'string', 'max:1', 'alpha_dash'],  
    ];

    public function render()
    {
        return view('livewire.user.update');
        
    }

    public function mount() { 
        $this->user = User::with(['permissions', 'roles'])->find($this->user_id);
        $this->roles = Role::where('name', '!=', 'Super Admin')->get();
        $this->permissions = Permission::all();
        $this->selectedPermissions = $this->user->permissions->pluck('id')->toArray();
        $this->selectedRole = $this->user->roles->pluck('id')->first();
    }

    public function confirmUserUpdate() { 
        $this->confirmingUserUpdate = true;

        $this->password = null;
        $this->password_confirmation = null;
    }
    
    public function submit() { 
        try { 

            DB::beginTransaction();
            
            if(filled($this->password)) { 
                $this->validate([
                    'password' => ['required', 'min:8', 'max:255',  'string', 'confirmed'],
                ]);
                
                $this->user->password = bcrypt($this->password);

            }      
            
            $saved = $this->user->save();

            $this->user->syncRoles();
            $this->user->syncPermissions();
                
            $this->user->givePermissionTo($this->selectedPermissions);

            $this->user->assignRole($this->selectedRole);

            $data = [
                'auditable_id' => $this->user->id,
                'auditable_type' => "App\Models\User",
                'event'      => "updated",
                'url'        => request()->fullUrl(),
                'ip_address' => request()->getClientIp(),
                'user_agent' => request()->userAgent(),
                'created_at' => Carbon::now('Asia/Manila'),
                'updated_at' => Carbon::now('Asia/Manila'),
                'user_id' => auth()->user()->id,
            ];

            //create audit trail data
            Audit::create($data);


            if($saved) { 
                //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');
                
                //Closes the modal 
                $this->confirmingUserUpdate = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'User added successfully'
                ]);
            }
            
            DB::commit();

        } catch(e) { 
            DB::rollback();
        }
 
    }
}
