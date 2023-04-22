<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use App\Models\Author; 
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public Author $author; 
    public $confirmingAuthorCreate = false;

    protected $rules = [
        'author.name' => 'required|string|unique:authors,name'
    ];

    public function render()
    {
        return view('livewire.author.create');
    }

    public function mount() { 
        $this->author = new Author();
    }

    public function confirmAuthorCreate() { 
        $this->confirmingAuthorCreate = true;

        //Resets the field of the form 
        $this->author = new Author();
    }

    public function submit() { 
        $this->validate();   
        
        try { 
            //Adds added_by data
            $this->author->added_by = Auth::id();

            $saved = $this->author->save();

            if($saved) { 

                //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');

                //Closes the modal 
                $this->confirmingAuthorCreate = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Author added successfully'
                ]);
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
