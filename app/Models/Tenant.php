<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['member_id','name','phone','email','aadhaar_no','agreement_start','agreement_end','id_proof','agreement_copy','police_verification','occupation','is_active'];

    public function member(){
        return $this->belongsTo(Member::class);
    }
}
