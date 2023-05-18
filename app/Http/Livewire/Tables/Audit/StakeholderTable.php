<?php

namespace App\Http\Livewire\Tables\Audit;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use OwenIt\Auditing\Models\Audit;

class StakeholderTable extends LivewireDatatable
{
    public function builder()
    {
        return Audit::query()->where('auditable_type', 'App\Models\Student')
            ->leftJoin('users', 'users.id', 'audits.user_id')
            ->leftJoin('students', 'students.id', 'audits.auditable_id')
            ->leftJoin('model_has_roles', 'users.id', 'model_has_roles.model_id')
            ->leftJoin('roles', 'roles.id', 'model_has_roles.role_id');
    }

    public function columns()
    {
        return [ 
            Column::name('students.name')
                ->label('Stakeholder Name'), 
            Column::name('event')
                ->label('EVENT'),  
            Column::name('students.course')
                ->label('Stakeholder Course/Dept.'), 
            Column::name('users.name')
                ->label('Created By'), 
            Column::name('roles.name')
                ->label('Role'), 
            Column::name('created_at')
                ->label('Created At')
                ->defaultSort('desc')
                ->unsortable()
        ];
    }
}