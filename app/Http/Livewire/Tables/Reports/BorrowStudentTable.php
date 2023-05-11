<?php

namespace App\Http\Livewire\Tables\Reports;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\Transaction; 
use App\Models\StudentId; 
use Carbon\Carbon; 

class BorrowStudentTable extends LivewireDatatable
{
    public $exportable = true;
    
    public function builder()
    {
        return Transaction::query()->leftJoin('books', 'books.id', 'transactions.book_id')->leftJoin('student_ids', 'student_ids.id', 'transactions.student_id')->leftJoin('students', 'students.student_id', 'student_ids.id');
    }

    public function columns()
    {
        //
        return[
            Column::name('books.accession_number')
                ->label('Accession #'),
            Column::name('book.title'),
            Column::name('student_number.student_latest.name')
                ->label('Borrower'),
            Column::name('student_number.student_latest.remarks')
                ->label('Remarks'),
            Column::name('created_at')
                ->label('Borrowed At')
                ->defaultSort('desc')->unsortable(),
        ];
    }
}