<?php

namespace App\Http\Livewire\Author;

use Livewire\Component;
use App\Models\Author; 

class Delete extends Component
{
    public $author_id; 
    public $name;
    public $confirmingAuthorDelete = false;

    public function render()
    {
        return view('livewire.author.delete');
    }

    public function confirmAuthorDelete() { 
        $this->confirmingAuthorDelete = true;

        //Resets the field of the form 
        $this->book = new Author();
    }

    public function submit() { 
       try { 
            $saved = Author::where('id', $this->author_id)->delete(); 

            if($saved) { 
            //Refreshes the livewire datatable
                $this->emit('refreshLivewireDatatable');
        
                //Closes the modal 
                $this->confirmingAuthorDelete = false;

                $this->dispatchBrowserEvent('success', [
                    'type' => 'success',
                    'title' => 'Success',
                    'text' => 'Author delete successfully'
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
