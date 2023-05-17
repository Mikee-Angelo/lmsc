<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use OwenIt\Auditing\Contracts\Auditable;

class Penalty extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes; 
    use \OwenIt\Auditing\Auditable;

    protected $fillable = [ 
        'name', 
        'fee', 
        'type',
        'created_by'
    ];

    protected $auditInclude = [
        'name', 
        'fee',
    ];

    public function created_by() { 
        return $this->belongsTo(User::class, 'created_by');
    }
}
