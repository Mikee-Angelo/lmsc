<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;
use OwenIt\Auditing\Contracts\Auditable;

class Book extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $auditInclude = [
        'accession_number', 
        'title',
    ];

    public function transactions() {
        return $this->hasMany(Transaction::class, 'book_id');
    }
}
