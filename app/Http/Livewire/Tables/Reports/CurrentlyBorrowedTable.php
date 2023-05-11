<?php

namespace App\Http\Livewire\Tables\Reports;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Action;
use App\Models\Transaction; 
use Carbon\Carbon; 

class CurrentlyBorrowedTable extends LivewireDatatable
{

    public $exportable = true;
    
    public function builder()
    {
        return Transaction::query()->leftJoin('books', 'books.id', 'transactions.book_id')->leftJoin('student_ids', 'student_ids.id', 'transactions.student_id')->leftJoin('students', 'students.student_id', 'student_ids.id')->where('returned_at', null)->whereDay('transactions.created_at', Carbon::now())->distinct();
    }

    public function columns()
    {
        //
        return[
            Column::name('book.accession_number')
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