<?php

namespace App\Services;

use App\Models\Setting;
use App\Models\MaintenanceBill;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class BillPdfService
{
    public function generate(MaintenanceBill $maintenanceBill)
    {
        $settings = Setting::first();

        $periodStart = Carbon::create(
            $maintenanceBill->bill_year,
            $maintenanceBill->bill_month,
            1
        );

        $periodEnd = $periodStart->copy()->endOfMonth();

        $billPeriodStart = $periodStart->format('d-M-Y');
        $billPeriodEnd = $periodEnd->format('d-M-Y');


        $particulars = [
            [
                'name' => 'Contribution for Repair & Maintenance Fund',
                'amount' => $maintenanceBill->repair_amount
            ],
            [
                'name' => 'Contribution to Sinking Fund',
                'amount' => $maintenanceBill->sinking_amount
            ],
            [
                'name' => 'Contribution towards Building Fund',
                'amount' => $maintenanceBill->building_amount
            ],
            [
                'name' => 'Electricity Charges',
                'amount' => $maintenanceBill->electricity_charge
            ],
            [
                'name' => 'Water Charges',
                'amount' => $maintenanceBill->water_charge
            ],
            [
                'name' => 'Service Charges',
                'amount' => $maintenanceBill->service_charge
            ],
            [
                'name' => 'Lift Charges',
                'amount' => $maintenanceBill->lift_charge
            ],
            [
                'name' => 'Insurance Charges',
                'amount' => $maintenanceBill->insurance_charge
            ],
            [
                'name' => 'Education Charges',
                'amount' => $maintenanceBill->education_charge
            ]
            
        ];

        $pdf = Pdf::loadView(
            'maintenance-bills.billpdf',
            compact(
                'maintenanceBill',
                'settings',
                'particulars',
                'billPeriodEnd',
                'billPeriodStart'
            )
        );

        return $pdf;
    }
}