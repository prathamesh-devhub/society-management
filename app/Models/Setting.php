<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['society_name', 'registration_no', 'address', 'email', 'phone', 'logo', 'bank_name', 'account_no', 'ifsc_code', 'repair_rate', 'sinking_rate', 'building_rate', 'electricity_charge', 'water_charge', 'service_charge', 'lift_charge', 'insurance_charge', 'education_charge', 'interest_rate'];
}
