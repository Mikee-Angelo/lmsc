<?php

namespace App\Http\Livewire\Tables;

use App\Models\Book;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;

class BookTable extends LivewireDatatable
{
    public $model = Book::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
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
        ];
    }
}