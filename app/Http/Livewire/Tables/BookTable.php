<?php

namespace App\Http\Livewire\Tables;

use App\Models\Book;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;

class BookTable extends LivewireDatatable
{
    public function builder() { 
        return Book::with('transactions');
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            Column::name('accession_number')
                ->searchable()
                ->label('Accession #'),
             Column::name('call_number')
                ->searchable()
                ->label('Call #'),
            Column::name('title')
                ->searchable(),
            Column::name('description')
                ->truncate(60),
            Column::name('edition')
                ->searchable(),
            Column::name('isbn')
                ->label('ISBN')
                ->searchable(),
            Column::name('created_at')
                ->label('Date Added')
                ->searchable(),
            Column::callback(['id', 'title'], function ($id, $title) {
                return view('table-actions.book', ['id' => $id, 'title' => $title]);
            })->unsortable()
        ];
    }
}