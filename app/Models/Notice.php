<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = ['title', 'description', 'category', 'attachment', 'publish_date', 'expiry_date', 'is_active', 'created_by'];
}
