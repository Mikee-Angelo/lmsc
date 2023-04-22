<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 

class Author extends Model
{
    use HasFactory;
    use SoftDeletes; 

    public function added_by() { 
        return $this->belongsTo(User::class, 'added_by');
    }
}
