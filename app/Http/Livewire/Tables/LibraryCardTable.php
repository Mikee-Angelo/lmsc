<?php

namespace App\Http\Livewire\Tables;

use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use App\Models\LibraryCard;

class LibraryCardTable extends LivewireDatatable
{
    public $student_id; 

    public function builder()
    {
        //
        return LibraryCard::where('student_id', $this->student_id);
    }

    public function columns()
    {
        //
        return [
            Column::name('reason'),
            Column::name('created_at')
                ->label('Date Added')->unsortable()->defaultSort('desc'),
        ];
    }
}