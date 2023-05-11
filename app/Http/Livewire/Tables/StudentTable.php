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
        return StudentId::query()->leftJoin('students', 'students.student_id', 'student_ids.id');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            Column::name('student_number')
                ->label('ID Number')
                ->searchable(),
            Column::name('students.name')
                ->label('Name')
                ->searchable(),
            Column::name('student.course')
                ->label('Course/Dept.'),
            Column::name('student.year')
                ->label('Year'),
            Column::name('student.level')
                ->label('Semester'),
            Column::name('student.school_year')
                ->label('School Year'),
            Column::name('student.status')
                ->label('Status'),
            Column::name('student.remarks')
                ->label('Remarks'),
            Column::name('created_at')
                ->label('Date Added'),
            Column::callback(['id'], function ($id) {
                return view('table-actions.student', ['id' => $id]);
            })
        ];
    }
}