<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['member_id', 'vehicle_number', 'vehicle_type', 'vehicle_brand', 'vehicle_color', 'parking_slot', 'ownership_document'];
    public function member(){
        return $this->belongsTo(Member::class);
    }
}
