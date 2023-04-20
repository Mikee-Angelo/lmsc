<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 

class Penalty extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name', 
        'fee', 
        'created_by'
    ];

    public function created_by() { 
        return $this->belongsTo(User::class, 'created_by');
    }
}
