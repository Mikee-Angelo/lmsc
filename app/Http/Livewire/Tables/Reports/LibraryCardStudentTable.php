<?php

namespace App\Http\Livewire\Tables\Reports;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\LibraryCard; 
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;

class LibraryCardStudentTable extends LivewireDatatable
{

    public $exportable = true;

    public function __construct() { 
        if (auth()->user()->hasDirectPermission('import reports')) { 
            $this->exportable = false;
        }
    }

    public function builder()
    {
        //
        // return LibraryCard::with(['student', 'created_by'])->distinct();
        return LibraryCard::query()->leftJoin('student_ids', 'student_ids.id', 'library_cards.student_id')->leftJoin('students', 'student_ids.id', 'students.student_id')->leftJoin('users', 'users.id', 'library_cards.created_by');
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
            Column::name('student.student_latest.remarks')
                ->label('Remarks'),
            Column::name('created_by.name')
                ->label('Added By'),
            Column::name('created_at')
                ->label('Created At'),
        ];
    }
}