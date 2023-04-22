<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentId extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'student_number'
    ];

    public function student() { 
        return $this->hasMany(Student::class, 'student_id');
    }

    public function student_latest() { 
        return $this->hasOne(Student::class, 'student_id');
    }
    

}
