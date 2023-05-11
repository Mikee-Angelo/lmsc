<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'name',
        'course', 
        'year',
        'level', 
        'school_year', 
        'status', 
        'student_id',  
        'remarks',
    ];

    public function student_id() { 
        return $this->belongsTo(StudentId::class, 'id');
    }
}
