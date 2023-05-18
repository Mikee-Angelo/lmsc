<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;
use Carbon\Carbon;

class ReportController extends Controller
{
    //
    public function show() { 

        $data = [
            'auditable_id' => auth()->user()->id,
            'auditable_type' => "App\Models\User",
            'event'      => "viewed reports",
            'url'        => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'created_at' => Carbon::now('Asia/Manila'),
            'updated_at' => Carbon::now('Asia/Manila'),
            'user_id' => auth()->user()->id,
        ];

        //create audit trail data
        Audit::create($data);

        return view('reports.show');
    }
}
