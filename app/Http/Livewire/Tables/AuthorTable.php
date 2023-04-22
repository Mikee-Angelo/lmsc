<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\Author; 

class AuthorTable extends LivewireDatatable
{
    public function builder()
    {
        return Author::with('added_by');
    }

    public function columns()
    {
         return [
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            Column::name('name')
                ->searchable(),
            Column::name('added_by.name')
                ->searchable()
                ->label('Added By'),
            Column::name('created_at')
                ->label('Date Added'),
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('table-actions.author', ['id' => $id, 'name' => $name]);
            })->unsortable()       
        ];
    }
}