<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function transactions() {
        return $this->hasMany(Transaction::class, 'book_id');
    }
}
