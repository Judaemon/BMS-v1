<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;

    public $fillable = [
        'barangay',
        'barangay_logo',
        'barangay_phone',
        'barangay_email',
        'province',
        'municipality_city',
    ];
}
