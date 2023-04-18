<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use Spatie\Permission\Models\Role;

class RoleTable extends LivewireDatatable
{
    public $model = Role::class; 

    public function columns(){
        return [
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'),
            Column::name('name')
                ->searchable(),
            Column::name('created_at')
                ->label('Date Added')
                ->searchable(),
        ];
    }
}