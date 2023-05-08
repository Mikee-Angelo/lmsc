<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentIds; 
use App\Models\User; 

class LibraryCard extends Model
{
    use HasFactory;

    public function student() { 
        return $this->belongsTo(StudentId::class, 'student_id'); 
    }

    public function created_by() { 
        return $this->belongsTo(User::class, 'created_by');
    }
}
