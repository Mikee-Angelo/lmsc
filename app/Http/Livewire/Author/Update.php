<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use App\Models\Author;

class Update extends Component
{
    public Author $author; 
    public $author_id;
    public $name;
    public $confirmingAuthorUpdate = false;

    protected $rules = [
        'author.name' => 'required|string|unique:authors,name',
    ];

    public function render()
    {
        return view('livewire.author.update');
    }

    public function mount() { 

        $this->author = Author::find($this->author_id);
    }


    public function confirmAuthorUpdate() { 
        $this->confirmingAuthorUpdate = true;
    }

    public function submit() { 
        $this->validate();   
        
        try { 
            $saved = $this->author->save();

            if($saved) { 

                //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');

                //Closes the modal 
                $this->confirmingAuthorCreate = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Author updated successfully'
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
