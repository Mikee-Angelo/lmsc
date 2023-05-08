<?php

namespace App\Http\Livewire\Tables\Reports;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\Transaction; 
use App\Models\StudentId; 
use Carbon\Carbon; 

class BorrowStudentTable extends LivewireDatatable
{
    public function builder()
    {
        return Transaction::with(['book', 'student_number.student_latest'])->distinct();
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
            Column::name('created_at')
                ->label('Borrowed At')
                ->defaultSort('desc')->unsortable(),
        ];
    }
}