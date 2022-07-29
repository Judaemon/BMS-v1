<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'incident_type',
        'incident_location',
        'incident_date_time',
        'meeting_schedule_date_time',
        'reported_date_time',
        'incident_narrative',
    ];

    public function residents()
    {
        return $this->belongsToMany(Resident::class)
            ->withPivot(['role', 'narrative'])
            ->withTimestamps();
    }
}
