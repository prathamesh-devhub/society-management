<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MaintenancePayment extends Model
{   
    protected $fillable = ['payment_date','amount','payment_mode','maintenance_bill_id','remarks','reference_no'];
    public function maintenanceBill(){
        return $this->belongsTo(MaintenanceBill::class);
    }
}
