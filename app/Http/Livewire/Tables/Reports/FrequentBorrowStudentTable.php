<?php

namespace App\Http\Livewire\Tables\Reports;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\Transaction; 
use App\Models\StudentId; 
use Carbon\Carbon; 

class FrequentBorrowStudentTable extends LivewireDatatable
{
    public function builder()
    {
        return StudentId::with('transactions')->distinct();
    }

    public function columns()
    {
        //
        return[
            Column::name('student_latest.name')
                ->label('Student Name'),
            NumberColumn::name('transactions.student_id')
                ->label('Count')->defaultSort('desc')->unsortable(),
            Column::name('created_at')
                ->label('Borrowed At'),
        ];
    }
}