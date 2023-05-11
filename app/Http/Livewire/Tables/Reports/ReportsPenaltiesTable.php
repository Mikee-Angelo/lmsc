<?php

namespace App\Http\Livewire\Tables\Reports;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use App\Models\TransactionPenalty; 

class ReportsPenaltiesTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        //
        return TransactionPenalty::query()
            ->leftJoin('penalties', 'penalties.id', 'transaction_penalties.penalty_id')
            ->leftJoin('transactions', 'transactions.id', 'transaction_penalties.transaction_id')
            ->leftJoin('student_ids', 'student_ids.id', 'transactions.student_id')
            ->leftJoin('students', 'students.student_id', 'student_ids.id');
    }

    public function columns()
    {
        //
        return [ 
            Column::name('penalties.name')
                ->label('Penalty'),
            Column::name('students.name')
                ->label('Student Name'),
            Column::name('amount')
                ->callback(['amount'], function($amount) { 
                    return '₱ '. number_format($amount / 100, 2); 
                })
                ->label('Amount'),
            Column::name('status')
                ->label('Status')
            //  Column::name('student.student_latest.name')
            //     ->label('Name'),
            // Column::name('student.student_latest.remarks')
            //     ->label('Remarks'),
            // Column::name('created_by.name')
            //     ->label('Added By'),
            // Column::name('created_at')
            //     ->label('Created At'),
        ];
    }
}