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
            ->leftJoin('users', 'users.id', 'audits.user_id')
            ->leftJoin('penalties', 'penalties.id', 'audits.auditable_id');
    }

    public function columns()
    {
        return [ 
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'), 
            Column::name('event')
                ->label('EVENT'),  
            Column::name('penalties.name')
                ->label('Penalty Name'), 
            Column::callback(['penalties.fee'], function($fee) { 
                if(!is_null($fee)) { 
                    return '₱ '. number_format($fee / 100, 2);
                }
            })
                ->label('Penalty Fee'), 
            Column::name('users.name')
                ->label('Created By'), 
            Column::name('created_at')
                ->label('Created At')
        ];
    }
}