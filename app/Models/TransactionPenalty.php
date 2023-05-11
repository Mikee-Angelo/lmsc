<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionPenalty extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'penalty_id', 
        'transaction_id',
        'amount',
    ];

    public function transaction() { 
        return $this->belongsTo(Transaction::class, 'transaction_id'); 
    }
}
