<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'wing', 'flat_number','profile_photo','square_feet'];
    
    public function complaints() {
        return $this->hasMany(Complaint::class);
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }

    public function tenants(){
        return $this->hasMany(Tenant::class);
    }
}
