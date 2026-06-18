<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Complaint;
use App\Models\Expense;
use App\Models\MaintenanceBill;
use App\Models\MaintenancePayment;
use App\Models\Notice;
use App\Models\Tenant;
use App\Models\Vehicle;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $notices = Notice::where('is_active', true)
            ->where('publish_date', '<=', Carbon::today())
            ->where(function ($query) {
                $query->whereNull('expiry_date')
                      ->orWhere('expiry_date', '>=', now());
            })
            ->latest()
            ->take(5)
            ->get();

        $currentMonthExpenses = Expense::whereMonth('expense_date',now()->month)->whereYear('expense_date',now()->year)->sum('amount');

        $currentMonthBilling = MaintenanceBill::whereMonth('bill_month',now()->month)->whereYear('bill_month',now()->year)->sum('grand_total');

        $currentMonthCollection = MaintenancePayment::whereMonth('payment_date',now()->month)->whereYear('payment_date',now()->year)->sum('amount');

        $totalOutstanding = MaintenanceBill::all()->sum('balance');

        $defaultersCount = MaintenanceBill::all()->where('balance','>',0)->count();

        $recentPayments = MaintenancePayment::with(['maintenanceBill.member'])->latest('payment_date')->take(5)->get();

        $recentComplaints = Complaint::latest()->take(5)->get();

        $collectionPercentage = 0;
        if($currentMonthBilling > 0){
            $collectionPercentage = round(($currentMonthCollection/$currentMonthBilling) * 100,2);
        }

        $netPosition = $currentMonthCollection - $currentMonthExpenses;

        return view('dashboard',['members'=> Member::count(), 'complaints' => Complaint::count(),'open_complaints' => Complaint::where('status', 'open')->count(),'closed_complaints' => Complaint::where('status', 'resolved')->count(),'notices' => $notices,'currentMonthExpenses'=> $currentMonthExpenses,'currentMonthBilling'=>$currentMonthBilling,'currentMonthCollection'=>$currentMonthCollection,'totalOutstanding'=>$totalOutstanding,'defaultersCount'=>$defaultersCount,'tenants'=>Tenant::count(),'vehicles'=>Vehicle::count(),'recentPayments'=>$recentPayments,'recentComplaints'=>$recentComplaints,'collectionPercentage'=>$collectionPercentage,'netPosition'=>$netPosition]);
    }
}
