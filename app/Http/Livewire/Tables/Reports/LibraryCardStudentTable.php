<?php

namespace App\Http\Livewire\Tables\Reports;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\LibraryCard; 
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class LibraryCardStudentTable extends LivewireDatatable
{
    public function builder()
    {
        //
        return LibraryCard::with(['student', 'created_by'])->distinct();
    }

    public function columns()
    {
        //
        return [ 
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            Column::name('reason'),
             Column::name('student.student_latest.name')
                ->label('Name'),
            Column::name('created_by.name')
                ->label('Added By'),
            Column::name('created_at')
                ->label('Created At'),
        ];
    }
}