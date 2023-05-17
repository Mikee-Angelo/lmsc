<?php

namespace App\Http\Livewire\Tables\Audit;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\Book;
use OwenIt\Auditing\Models\Audit;

class BookTable extends LivewireDatatable
{
    public function builder()
    {
        //
        return Audit::query()->where('auditable_type', 'App\Models\Book')->leftJoin('users', 'users.id', 'audits.user_id');
    }

    public function columns()
    {
        //
        return [ 
            NumberColumn::name('id')
                ->defaultSort('desc')
                ->label('ID'), 
            Column::name('event')
                ->label('EVENT'), 
            Column::callback(['new_values'], function($new_values){ 
                $data = json_decode($new_values);

                return $data->title;
            })  
                ->label('Book Title'), 
            Column::name('users.name')
                ->label('Created By'), 
            Column::name('created_at')
                ->label('Created At')
        ];
    }
}