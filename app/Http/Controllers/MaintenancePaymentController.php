<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceBill;
use App\Models\MaintenancePayment;

class MaintenancePaymentController extends Controller
{
    public function create(MaintenanceBill $maintenanceBill){
        
        return view('maintenance-payments.create',compact('maintenanceBill'));
    }

    public function store(Request $request, MaintenanceBill $maintenanceBill){
        $data = $request->validate([
            'payment_date' => 'required|date',
            'amount' => 'required',
            'payment_mode' => 'required|string',
            'reference_no' => 'nullable',
            'remarks' => 'nullable'
        ]);

        $data['maintenance_bill_id'] = $maintenanceBill->id;

        $maintenance = MaintenancePayment::create($data);

        $totalPaid = $maintenanceBill->payments()->sum('amount');

        if ($totalPaid >= $maintenanceBill->grand_total) {
            $maintenanceBill->status = 'Paid';
        } elseif ($totalPaid > 0) {
            $maintenanceBill->status = 'Partially Paid';
        } else {
            $maintenanceBill->status = 'Unpaid';
        }

        $maintenanceBill->save();

        return redirect()->route('maintenance-bills.index')->with('success','Payment Added Successfully');
    }
}
