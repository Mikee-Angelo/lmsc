<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use App\Models\Penalty; 
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
class PenaltyTable extends LivewireDatatable
{
    public function builder() { 
        return Penalty::with('created_by');
    }


    public function columns()
    {
        //
        return [
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            Column::name('name')
                ->searchable(),
            Column::name('fee')
                ->callback(['fee'], function($fee) { 
                    return '₱ '. number_format($fee / 100, 2);
                }),
            Column::name('created_by.name')
                ->label('Created By')
                ->searchable(),
            Column::name('created_at')
                ->label('Date Added')
                ->searchable(),
        ];
    }
}