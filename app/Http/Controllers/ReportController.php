<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceBill;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function defaulters(){
        
        $bills = MaintenanceBill::with('member')
        ->get()
        ->filter(function ($bill) {
            return $bill->balance > 0;
        });

        return view('reports.defaulters',compact('bills'));
    }
}
