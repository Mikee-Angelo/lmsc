<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\User;
use App\Models\StudentId; 
use App\Models\Student; 
use App\Models\Book; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class Borrow extends Component
{   
    public Transaction $transaction;
    public Student $student;
    public StudentId $student_id;
    public Book $book;
    public $confirmingTransactionCreate = false;
    public $book_id;
    public $hasTransaction = false;

    protected $rules = [ 
        'book_id' => 'required|exists:books,id',
        'student_id.student_number' => 'required|string|exists:student_ids,student_number',
        'transaction.duration' => 'nullable|string',
        'transaction.notes' => 'nullable|string',
        'student.name' => 'string',
        'student.course' => 'string',
        'student.yearLevel' => 'string',
        'student.status' => 'string',
    ];

    public function render()
    {
        return view('livewire.book.borrow');
    }

    public function mount() { 
        $this->student_id = new StudentId();
        $this->student = new Student();
        $this->transaction = new Transaction();
        $this->book = new Book();

        $this->checkBorrow();
        $this->checkSelectedBook();
    }

    private function checkBorrow() { 
        $this->hasTransaction = Transaction::where([
            ['book_id','=', $this->book_id],
            ['returned_at','=', null]
        ])->exists();
    }

    private function checkSelectedBook() { 
        if(!$this->hasTransaction) { 
            $this->book = Book::findOrFail($this->book_id);
        }
    }
 
    public function confirmTransactionCreate() { 
        $this->confirmingTransactionCreate = true;

        //Resets the field of the form 
        $this->resetAll();
    }

    public function onSearch()  { 

        $this->validate([
            'student_id.student_number' => 'required|string|exists:student_ids,student_number',
        ]); 

        $this->onLoadStudent();
    }

    public function onLoadStudent() { 
        try { 
            $s = StudentId::with('student_latest')->where('student_number', $this->student_id->student_number)->first();
                
            $this->student = $s->student_latest;
        } catch (Exception $e) { 
             $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Can\'t find student information'
            ]);
        }
    }

    public function submit() { 
        $this->validate();   

        $duration = $this->trasaction->duration ?? 1;

        $this->transaction->book_id = $this->book_id;
        $this->transaction->student_id = $this->student->student_id;
        $this->transaction->duration = $duration; 
        $this->transaction->approved_by = Auth::id();
        $this->transaction->ends_at = Carbon::now()->addDays($duration);
        
        $saved = $this->transaction->save();

        if($saved) { 

            $this->emit('updateTransactionCount');  
        
            //Closes the modal 
            $this->confirmingTransactionCreate = false;

            $this->checkBorrow();

            //Emit changes on the available book 
            $this->emit('updateAvailableCount');

            $this->dispatchBrowserEvent('success', [
                'type' => 'success',
                'title' => 'Success',
                'text' => 'Book Borrowed successfully'
            ]);
        } else { 
            $this->dispatchBrowserEvent('error', [
                'type' => 'error',
                'title' => 'Error',
                'text' => 'Something went wrong'
            ]);
        }

        $this->resetAll();
    }

    public function resetTransaction() { 
        $this->transaction = new Transaction();
    }

    public function resetStudentID() { 
        $this->student_id = new StudentId();
    }

    public function resetStudent() { 
        $this->student = new Student();
    }

    public function resetAll() { 
        $this->resetTransaction();
        $this->resetStudentID(); 
        $this->resetStudent();
    }

}
