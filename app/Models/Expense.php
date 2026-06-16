<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['expense_date','category','vendor_name','amount','payment_mode','reference_no','status','bill_copy','remarks'];
}
