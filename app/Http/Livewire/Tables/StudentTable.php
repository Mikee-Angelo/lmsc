<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\Student;
use App\Models\StudentId;

class StudentTable extends LivewireDatatable
{
    
    public function builder() { 
        return StudentId::with('student');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            Column::name('student_number')
                ->label('Student Number')
                ->searchable(),
            Column::name('student.name')
                ->label('Name')
                ->searchable(),
            Column::name('student.course')
                ->label('Course'),
            Column::name('student.yearLevel')
                ->label('Year/Level'),
            Column::name('student.status')
                ->label('Status'),
            Column::name('created_at')
                ->label('Date Added'),
            Column::callback(['id'], function ($id) {
                return view('table-actions.student', ['id' => $id]);
            })->unsortable()
        ];
    }
}