<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Student extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

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
