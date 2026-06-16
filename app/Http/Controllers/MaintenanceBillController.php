<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceBill;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Member;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class MaintenanceBillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = MaintenanceBill::with('member')
        ->latest()
        ->paginate(10);
        
        return view('maintenance-bills.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MaintenanceBill $maintenanceBill)
    {
        return view('maintenance-bills.show',compact('maintenanceBill'));
    }

    public function generateForm()
    {
        return view('maintenance-bills.generate');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'bill_month' => 'required|integer|min:1|max:12',
            'bill_year' => 'required|integer'
        ]);

        $settings = Setting::first();
        $members = Member::all();

        foreach($members as $member)
        {
            $exists = MaintenanceBill::where(
                'member_id',
                $member->id
            )
            ->where(
                'bill_month',
                $request->bill_month
            )
            ->where(
                'bill_year',
                $request->bill_year
            )
            ->exists();

            if($exists){
                continue;
            }

            $repair =
            $member->square_feet *
            $settings->repair_rate;

            $sinking =
            $member->square_feet *
            $settings->sinking_rate;

            $building =
            $member->square_feet *
            $settings->building_rate;

            $electricity = $settings->electricity_charge;
            $water       = $settings->water_charge;
            $service     = $settings->service_charge;
            $lift        = $settings->lift_charge;
            $insurance   = $settings->insurance_charge;
            $education   = $settings->education_charge;

            $currentBillTotal =
            $repair +
            $sinking +
            $building +

            $electricity +
            $water +
            $service +
            $lift +
            $insurance +
            $education;

            $lastBill = MaintenanceBill::where(
                'member_id',
                $member->id
            )
            ->orderByDesc('bill_year')
            ->orderByDesc('bill_month')
            ->first();

            $previousDue = $lastBill
            ? $lastBill->balance
            : 0;
            $advanceAmount = $lastBill
            ? $lastBill->advance
            : 0;
            $interestAmount = 0;

            if(
                $lastBill &&
                $lastBill->balance > 0 &&
                now()->gt($lastBill->due_date)
            ){
                $interestAmount = round(
                    ($previousDue * $settings->interest_rate / 100) / 12,
                    2
                );
            }

            $grandTotal =
            $currentBillTotal +
            $previousDue +
            $interestAmount -
            $advanceAmount;

            $billDate = Carbon::create(
                $request->bill_year,
                $request->bill_month,
                1
            );

            $dueDate = $billDate->copy()->endOfMonth();

            if($request->bill_month >= 4){
                $startYear = substr($request->bill_year, -2);

                $endYear = substr(
                    $request->bill_year + 1,
                    -2
                );
            }
            else{
                $startYear = substr(
                    $request->bill_year - 1,
                    -2
                );

                $endYear = substr(
                    $request->bill_year,
                    -2
                );
            }

            $lastBill = MaintenanceBill::latest('id')->first();

            $nextNumber = $lastBill
                ? $lastBill->id + 1
                : 1;

            $billNo =
            'PS/' .
            $startYear .
            '-' .
            $endYear .
            '/' .
            str_pad(
                $nextNumber,
                3,
                '0',
                STR_PAD_LEFT
            );

            MaintenanceBill::create([

                'member_id' => $member->id,
                'bill_no' => $billNo,
                'bill_month' => $request->bill_month,
                'bill_year'  => $request->bill_year,

                'square_feet' => $member->square_feet,

                'repair_amount' => $repair,
                'sinking_amount' => $sinking,
                'building_amount' => $building,

                'electricity_charge' => $electricity,
                'water_charge' => $water,
                'service_charge' => $service,
                'lift_charge' => $lift,
                'insurance_charge' => $insurance,
                'education_charge' => $education,

                'current_bill_total' => $currentBillTotal,

                'previous_due' => $previousDue,

                'interest_amount' => $interestAmount,

                'advance_amount' => $advanceAmount,

                'grand_total' => $grandTotal,

                'bill_date' => $billDate,
                'due_date' => $dueDate,

                'status' => 'Unpaid'

            ]);
        }

        return redirect()
        ->route('maintenance-bills.index')
        ->with(
            'success',
            'Maintenance Bills Generated Successfully'
        );
    }

    public function print(MaintenanceBill $maintenanceBill)
    {
        return view(
            'maintenance-bills.print',
            compact('maintenanceBill')
        );
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaintenanceBill $maintenanceBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaintenanceBill $maintenanceBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaintenanceBill $maintenanceBill)
    {
        //
    }

    public function billpdf(MaintenanceBill $maintenanceBill)
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

        $totalCurrentCharges = 

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

        return $pdf->download(
            $maintenanceBill->bill_no.'.pdf'
        );
    }
}
