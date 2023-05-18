<?php

namespace App\Http\Livewire\Tables\Audit;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use OwenIt\Auditing\Models\Audit;

class PenaltiesTable extends LivewireDatatable
{
    public function builder()
    {
        return Audit::query()->where('auditable_type', 'App\Models\Penalty')
            ->leftJoin('penalties', 'penalties.id', 'audits.auditable_id')
            ->leftJoin('users', 'users.id', 'penalties.created_by')
            ->leftJoin('model_has_roles', 'users.id', 'model_has_roles.model_id')
            ->leftJoin('roles', 'roles.id', 'model_has_roles.role_id');
    }

    public function columns()
    {
        return [ 
            Column::name('penalties.name')
                ->label('Penalty Name'), 
            Column::name('event')
                ->label('EVENT'),  
            Column::callback(['penalties.fee'], function($fee) { 
                if(!is_null($fee)) { 
                    return '₱ '. number_format($fee / 100, 2);
                }
            })
                ->label('Penalty Fee'), 
            Column::name('users.name')
                ->label('Created By'), 
            Column::name('roles.name')
                ->label('Role'),
            Column::name('created_at')
                ->defaultSort('desc')
                ->label('Created At')
                ->unsortable()
        ];
    }
}