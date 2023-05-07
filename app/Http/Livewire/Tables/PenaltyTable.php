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
            Column::callback(['id', 'name'], function ($id, $name) {
                $except = collect([1, 2]); 

                if(!$except->contains($id)) { 
                    return view('table-actions.penalty', ['id' => $id, 'name' => $name]);
                } 
            })->unsortable()
        ];
    }
}