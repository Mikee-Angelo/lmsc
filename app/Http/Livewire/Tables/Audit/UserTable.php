<?php

namespace App\Http\Livewire\Tables\Audit;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use OwenIt\Auditing\Models\Audit;

class UserTable extends LivewireDatatable
{
    public function builder()
    {
         return Audit::query()->where('auditable_type', 'App\Models\User')
                ->leftJoin('users', 'users.id', 'audits.auditable_id');
    }

    public function columns()
    {
        return [ 
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'), 
            Column::name('event')
                ->label('EVENT'), 
            Column::name('users.name')
                ->label('NAME'), 
            Column::name('created_at')
                ->label('Created At')
        ];
    }
}