<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use NumberToWords\NumberToWords;

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

    public function getBillPeriodAttribute()
    {
        $startDate = Carbon::create(
            $this->bill_year,
            $this->bill_month,
            1
        );

        $endDate = $startDate->copy()->endOfMonth();

        return
            strtoupper($startDate->format('d-M-Y'))
            .' TO '.
            strtoupper($endDate->format('d-M-Y'));
    }

    public function getAmountInWordsAttribute()
    {
        $numberToWords = new NumberToWords();

        $numberTransformer =
            $numberToWords->getNumberTransformer('en');

        return strtoupper(
            $numberTransformer->toWords(
                round($this->grand_total)
            )
        );
    }

    public function getBillMonthNameAttribute(){
        return Carbon::createFromFormat('!m',$this->bill_month)->format('F');
    }
}
