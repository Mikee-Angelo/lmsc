<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\User; 

class UsersTable extends LivewireDatatable
{

    public function builder() { 
        return User::with('roles');
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
            Column::name('roles.name')
                ->searchable()
                ->label('Role'),
            Column::name('created_at')
                ->label('Date Added')
                ->searchable(),
        ];
    }
}