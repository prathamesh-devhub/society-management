<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Complaint;
use App\Models\Notice;
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

        return view('dashboard',['members'=> Member::count(), 'complaints' => Complaint::count(),'open_complaints' => Complaint::where('status', 'open')->count(),'closed_complaints' => Complaint::where('status', 'resolved')->count(),'notices' => $notices]);
    }
}
