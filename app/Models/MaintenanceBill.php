<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MaintenanceBill extends Model
{
    protected $fillable = [
        'member_id',
        'bill_no',
        'bill_month',
        'bill_year',
        'square_feet',

        'repair_amount',
        'sinking_amount',
        'building_amount',

        'electricity_charge',
        'water_charge',
        'service_charge',
        'lift_charge',
        'insurance_charge',
        'education_charge',

        'current_bill_total',
        'previous_due',
        'interest_amount',
        'advance_amount',
        'grand_total',

        'bill_date',
        'due_date',
        'status'
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function payments(){
        return $this->hasMany(MaintenancePayment::class);
    }

    public function getTotalPaidAttribute(){
        return $this->payments()->sum('amount');
    }

    public function getBalanceAttribute()
    {
        return max(
            0,
            $this->grand_total - $this->total_paid
        );
    }

    public function getAdvanceAttribute()
    {
        return max(
            0,
            $this->total_paid - $this->grand_total
        );
    }
    
    public function getAmountInWordsAttribute()
    {
        // later convert 6166
        // to
        // SIX THOUSAND ONE HUNDRED SIXTY SIX ONLY
    }

    public function getBillPeriodAttribute()
    {
        return "1-JUN-2026 TO 30-JUN-2026";
    }

    public function getBillMonthNameAttribute(){
        return Carbon::createFromFormat('!m',$this->bill_month)->format('F');
    }
}
