<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book; 
use App\Models\StudentId; 
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    public function book() { 
        return $this->belongsTo(Book::class);
    }

    public function student_number() { 
        return $this->belongsTo(StudentId::class, 'student_id');
    }

    public function approver() { 
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function transaction_penalty() { 
        return $this->hasMany(TransactionPenalty::class, 'transaction_id');
    }
}
